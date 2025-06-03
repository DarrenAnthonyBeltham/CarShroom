package main

import (
	"database/sql"
	"encoding/json"
	"fmt"
	"log"
	"net/http"
	"os" 
	"strconv"
	"sync"
	"time" 

	_ "github.com/go-sql-driver/mysql" 
)

var db *sql.DB

type Product struct {
	ID          string       `json:"id"`       
	Name        string       `json:"name"`  
	Price       float64      `json:"price"`        
	ImageURL    string       `json:"image_url"`    
	Description string       `json:"description"`  
	Stock       int          `json:"stock"`        
	CreatedAt   sql.NullTime `json:"created_at"`   
	UpdatedAt   sql.NullTime `json:"updated_at"`   
}

type CartItem struct {
	Product  Product `json:"product"`
	Quantity int     `json:"quantity"`
}

var (
	carts = make(map[string]map[string]CartItem)
	mu    sync.Mutex
)

type AddToCartRequest struct {
	UserID    string `json:"user_id"`
	ProductID string `json:"product_id"`
	Quantity  int    `json:"quantity"`
}

func initDB() {
	dbHost := os.Getenv("DB_HOST")
	dbPort := os.Getenv("DB_PORT")
	dbUser := os.Getenv("DB_USER")
	dbPassword := os.Getenv("DB_PASSWORD")
	dbName := os.Getenv("DB_NAME")

	if dbHost == "" {
		dbHost = "127.0.0.1" 
	}
	if dbPort == "" {
		dbPort = "3306"
	}
	if dbUser == "" {
		dbUser = "root" 
	}
	if dbPassword == "" {
		log.Println("Warning: DB_PASSWORD environment variable not set.")
	}
	if dbName == "" {
		dbName = "carshroom"
	}

	dsn := fmt.Sprintf("%s:%s@tcp(%s:%s)/%s?parseTime=true",
		dbUser, dbPassword, dbHost, dbPort, dbName)

	var err error
	maxRetries := 5
	for i := 0; i < maxRetries; i++ {
		db, err = sql.Open("mysql", dsn)
		if err != nil {
			log.Printf("Failed to open database connection (attempt %d/%d): %v", i+1, maxRetries, err)
			time.Sleep(5 * time.Second)
			continue
		}

		err = db.Ping()
		if err != nil {
			log.Printf("Failed to ping database (attempt %d/%d): %v", i+1, maxRetries, err)
			db.Close()
			time.Sleep(5 * time.Second)
			continue
		}
		break
	}

	if err != nil {
		log.Fatalf("Could not connect to the database after %d attempts: %v", maxRetries, err)
	}

	log.Println("Successfully connected to the MySQL database!")

	db.SetMaxOpenConns(25)
	db.SetMaxIdleConns(25)
	db.SetConnMaxLifetime(5 * time.Minute)
}

func getProductFromDB(productID string) (Product, error) {
	var p Product
	var imageURL sql.NullString    
	var description sql.NullString 

	query := `SELECT product_id, product_name, price, stock_quantity, image_url, description, created_at, updated_at
			  FROM products WHERE product_id = ?`
	row := db.QueryRow(query, productID)
	err := row.Scan(&p.ID, &p.Name, &p.Price, &p.Stock, &imageURL, &description, &p.CreatedAt, &p.UpdatedAt)

	if err != nil {
		if err == sql.ErrNoRows {
			return Product{}, fmt.Errorf("product with ID %s not found", productID)
		}
		return Product{}, fmt.Errorf("error scanning product: %w", err)
	}

	if imageURL.Valid {
		p.ImageURL = imageURL.String
	}
	if description.Valid {
		p.Description = description.String
	}
	return p, nil
}

func addToCartHandler(w http.ResponseWriter, r *http.Request) {
	if r.Method != http.MethodPost {
		http.Error(w, "Only POST method is allowed", http.StatusMethodNotAllowed)
		return
	}

	var req AddToCartRequest
	decoder := json.NewDecoder(r.Body)
	if err := decoder.Decode(&req); err != nil {
		http.Error(w, "Invalid request body: "+err.Error(), http.StatusBadRequest)
		return
	}

	if req.UserID == "" || req.ProductID == "" || req.Quantity <= 0 {
		http.Error(w, "Missing required fields (user_id, product_id) or invalid quantity", http.StatusBadRequest)
		return
	}

	product, err := getProductFromDB(req.ProductID)
	if err != nil {
		log.Printf("Error fetching product %s from DB: %v", req.ProductID, err)
		http.Error(w, err.Error(), http.StatusNotFound)
		return
	}

	if product.Stock < req.Quantity {
		http.Error(w, fmt.Sprintf("Not enough stock for product %s. Available: %d, Requested: %d", product.Name, product.Stock, req.Quantity), http.StatusConflict)
		return
	}

	mu.Lock()
	defer mu.Unlock()

	if _, ok := carts[req.UserID]; !ok {
		carts[req.UserID] = make(map[string]CartItem)
	}

	if item, ok := carts[req.UserID][req.ProductID]; ok {
		if product.Stock < (item.Quantity + req.Quantity) {
			http.Error(w, fmt.Sprintf("Not enough stock for product %s. Available: %d, Requested total: %d", product.Name, product.Stock, item.Quantity+req.Quantity), http.StatusConflict)
			return
		}
		item.Quantity += req.Quantity
		carts[req.UserID][req.ProductID] = item
		log.Printf("Updated quantity for product %s for user %s. New quantity: %d\n", req.ProductID, req.UserID, item.Quantity)
	} else {
		carts[req.UserID][req.ProductID] = CartItem{
			Product:  product,
			Quantity: req.Quantity,
		}
		log.Printf("Added product %s (qty: %d) to cart for user %s\n", req.ProductID, req.Quantity, req.UserID)
	}

	w.Header().Set("Content-Type", "application/json")
	w.WriteHeader(http.StatusOK)
	json.NewEncoder(w).Encode(map[string]string{"message": "Item added to cart successfully"})
	log.Printf("Current cart for user %s: %+v\n", req.UserID, carts[req.UserID])
}

func viewCartHandler(w http.ResponseWriter, r *http.Request) {
	if r.Method != http.MethodGet {
		http.Error(w, "Only GET method is allowed", http.StatusMethodNotAllowed)
		return
	}

	userID := r.URL.Query().Get("user_id")
	if userID == "" {
		http.Error(w, "User ID query parameter is required", http.StatusBadRequest)
		return
	}

	mu.Lock()
	defer mu.Unlock()

	userCartData, exists := carts[userID]
	if !exists || len(userCartData) == 0 {
		w.Header().Set("Content-Type", "application/json")
		w.WriteHeader(http.StatusOK)
		json.NewEncoder(w).Encode(map[string]interface{}{
			"message": "Cart is empty for user " + userID,
			"cart":    []CartItem{},
		})
		log.Printf("Cart is empty for user %s\n", userID)
		return
	}

	var cartItemsSlice []CartItem
	for _, item := range userCartData {
		cartItemsSlice = append(cartItemsSlice, item)
	}

	w.Header().Set("Content-Type", "application/json")
	w.WriteHeader(http.StatusOK)
	json.NewEncoder(w).Encode(map[string]interface{}{
		"user_id": userID,
		"cart":    cartItemsSlice,
	})
	log.Printf("Viewed cart for user %s: %+v\n", userID, cartItemsSlice)
}

func (p Product) MarshalJSON() ([]byte, error) {
	type Alias Product 
	var createdAtStr, updatedAtStr string
	if p.CreatedAt.Valid {
		createdAtStr = p.CreatedAt.Time.Format(time.RFC3339)
	}
	if p.UpdatedAt.Valid {
		updatedAtStr = p.UpdatedAt.Time.Format(time.RFC3339)
	}

	return json.Marshal(&struct {
		Alias
		CreatedAt string `json:"created_at,omitempty"`
		UpdatedAt string `json:"updated_at,omitempty"`
	}{
		Alias:     (Alias)(p),
		CreatedAt: createdAtStr,
		UpdatedAt: updatedAtStr,
	})
}

func main() {
	initDB() 
	defer func() {
		if db != nil {
			db.Close()
			log.Println("MySQL Database connection closed.")
		}
	}()

	http.HandleFunc("/cart/add", addToCartHandler)
	http.HandleFunc("/cart/view", viewCartHandler)

	port := 8080
	fmt.Printf("Starting Go backend server with MySQL on port %d...\n", port)
	log.Printf("Endpoints available:\nPOST /cart/add\nGET  /cart/view?user_id=<USER_ID>\n")
	if err := http.ListenAndServe(":"+strconv.Itoa(port), nil); err != nil {
		log.Fatalf("Could not start server: %s\n", err.Error())
	}
}