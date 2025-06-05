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
	ID           string       `json:"id"`
	Name         string       `json:"name"`
	Price        float64      `json:"price"`
	ImageURL     string       `json:"image_url,omitempty"`
	Description  string       `json:"description,omitempty"`
	Stock        int          `json:"stock"`
	UpdatedAt    sql.NullTime `json:"-"`
	UpdatedAtStr string       `json:"updated_at,omitempty"`
	Brand        string       `json:"brand,omitempty"`
	Size         string       `json:"size,omitempty"`
	Finish       string       `json:"finish,omitempty"`
	Material     string       `json:"material,omitempty"`
	Features     string       `json:"features,omitempty"`
	Type         string       `json:"type,omitempty"`
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

type RemoveCartItemRequest struct {
	UserID    string `json:"user_id"`
	ProductID string `json:"product_id"`
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
	var imageURL, description, brand, productType, features, category sql.NullString

	query := `SELECT product_id, product_name, price, stock_quantity, 
					 COALESCE(image_url, ''), COALESCE(description, ''), updated_at,
					 COALESCE(brand, ''), COALESCE(product_type, ''), COALESCE(features, ''), COALESCE(category, '') 
			  FROM products WHERE product_id = ?`
	row := db.QueryRow(query, productID)
	err := row.Scan(
		&p.ID, &p.Name, &p.Price, &p.Stock,
		&imageURL, &description, &p.UpdatedAt,
		&brand, &productType, &features, &category,
	)

	if err != nil {
		if err == sql.ErrNoRows {
			return Product{}, fmt.Errorf("product with ID %s not found", productID)
		}
		return Product{}, fmt.Errorf("error scanning product: %w", err)
	}

	p.ImageURL = imageURL.String
	p.Description = description.String
	p.Brand = brand.String
	p.Size = productType.String
	p.Material = productType.String 
	p.Finish = productType.String 
	p.Features = features.String
	p.Type = category.String

	if p.UpdatedAt.Valid {
		p.UpdatedAtStr = p.UpdatedAt.Time.Format(time.RFC3339)
	}
	return p, nil
}

func listProductsHandler(w http.ResponseWriter, r *http.Request) {
	w.Header().Set("Access-Control-Allow-Origin", "*")
	if r.Method != http.MethodGet {
		http.Error(w, "Only GET method is allowed", http.StatusMethodNotAllowed)
		return
	}
	categoryParam := r.URL.Query().Get("category")
	var rows *sql.Rows
	var err error

	query := `SELECT product_id, product_name, price, stock_quantity, 
					 COALESCE(image_url, ''), COALESCE(description, ''), updated_at,
					 COALESCE(brand, ''), COALESCE(product_type, ''), COALESCE(features, ''), COALESCE(category, '')
			  FROM products`

	if categoryParam != "" {
		query += " WHERE category = ?"
		rows, err = db.Query(query, categoryParam)
	} else {
		rows, err = db.Query(query)
	}

	if err != nil {
		log.Printf("Error querying products: %v", err)
		http.Error(w, "Failed to retrieve products", http.StatusInternalServerError)
		return
	}
	defer rows.Close()

	products := []Product{}
	for rows.Next() {
		var p Product
		var imageURL, description, brand, productType, features, actualCategory sql.NullString

		err := rows.Scan(
			&p.ID, &p.Name, &p.Price, &p.Stock,
			&imageURL, &description, &p.UpdatedAt,
			&brand, &productType, &features, &actualCategory,
		)
		if err != nil {
			log.Printf("Error scanning product row: %v", err)
			continue
		}
		p.ImageURL = imageURL.String
		p.Description = description.String
		p.Brand = brand.String
		p.Size = productType.String   
		p.Material = productType.String 
		p.Finish = productType.String 
		p.Features = features.String
		p.Type = actualCategory.String 

		if p.UpdatedAt.Valid {
			p.UpdatedAtStr = p.UpdatedAt.Time.Format(time.RFC3339)
		}
		products = append(products, p)
	}

	if err = rows.Err(); err != nil {
		log.Printf("Error after iterating product rows: %v", err)
		http.Error(w, "Error processing products", http.StatusInternalServerError)
		return
	}

	w.Header().Set("Content-Type", "application/json")
	w.WriteHeader(http.StatusOK)
	if err := json.NewEncoder(w).Encode(products); err != nil {
		log.Printf("Error encoding products to JSON: %v", err)
	}
}

func setCORSHeaders(w http.ResponseWriter) {
	w.Header().Set("Access-Control-Allow-Origin", "*")
	w.Header().Set("Access-Control-Allow-Methods", "POST, GET, OPTIONS, PUT, DELETE")
	w.Header().Set("Access-Control-Allow-Headers", "Accept, Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token, Authorization")
}

func addToCartHandler(w http.ResponseWriter, r *http.Request) {
	setCORSHeaders(w)
	if r.Method == http.MethodOptions {
		w.WriteHeader(http.StatusOK)
		return
	}
	if r.Method != http.MethodPost {
		http.Error(w, "Only POST method is allowed", http.StatusMethodNotAllowed)
		return
	}

	var req AddToCartRequest
	if err := json.NewDecoder(r.Body).Decode(&req); err != nil {
		http.Error(w, "Invalid request body: "+err.Error(), http.StatusBadRequest)
		return
	}

	if req.UserID == "" || req.ProductID == "" || req.Quantity <= 0 {
		http.Error(w, "Missing required fields (user_id, product_id) or invalid quantity", http.StatusBadRequest)
		return
	}

	product, err := getProductFromDB(req.ProductID)
	if err != nil {
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
		log.Printf("Updated quantity (added) for product %s for user %s. New quantity: %d\n", req.ProductID, req.UserID, item.Quantity)
	} else {
		carts[req.UserID][req.ProductID] = CartItem{Product: product, Quantity: req.Quantity}
		log.Printf("Added product %s (qty: %d) to cart for user %s\n", req.ProductID, req.Quantity, req.UserID)
	}

	w.Header().Set("Content-Type", "application/json")
	w.WriteHeader(http.StatusOK)
	json.NewEncoder(w).Encode(map[string]string{"message": "Item added/updated in cart successfully"})
}

func updateCartItemHandler(w http.ResponseWriter, r *http.Request) {
	setCORSHeaders(w)
	if r.Method == http.MethodOptions {
		w.WriteHeader(http.StatusOK)
		return
	}
	if r.Method != http.MethodPost {
		http.Error(w, "Only POST method is allowed for updating cart item", http.StatusMethodNotAllowed)
		return
	}

	var req AddToCartRequest 
	if err := json.NewDecoder(r.Body).Decode(&req); err != nil {
		http.Error(w, "Invalid request body: "+err.Error(), http.StatusBadRequest)
		return
	}

	if req.UserID == "" || req.ProductID == "" {
		http.Error(w, "Missing required fields (user_id, product_id)", http.StatusBadRequest)
		return
	}
	if req.Quantity < 0 { 
		http.Error(w, "Quantity cannot be negative", http.StatusBadRequest)
		return
	}
	
	mu.Lock()
	defer mu.Unlock()

	userCart, userExists := carts[req.UserID]
	if !userExists {
		http.Error(w, "Cart not found for user", http.StatusNotFound)
		return
	}

	_, itemExists := userCart[req.ProductID]
	if !itemExists {
		http.Error(w, "Item not found in cart", http.StatusNotFound)
		return
	}

	if req.Quantity == 0 {
		delete(userCart, req.ProductID)
		log.Printf("Removed product %s from cart for user %s due to quantity 0\n", req.ProductID, req.UserID)
		w.Header().Set("Content-Type", "application/json")
		w.WriteHeader(http.StatusOK)
		json.NewEncoder(w).Encode(map[string]string{"message": "Item removed from cart"})
		return
	}

	product, err := getProductFromDB(req.ProductID)
	if err != nil {
		http.Error(w, "Product details not found, cannot update quantity", http.StatusInternalServerError)
		return
	}
	if product.Stock < req.Quantity {
		http.Error(w, fmt.Sprintf("Not enough stock for product %s. Available: %d, Requested: %d", product.Name, product.Stock, req.Quantity), http.StatusConflict)
		return
	}

	updatedItem := userCart[req.ProductID]
	updatedItem.Quantity = req.Quantity
	userCart[req.ProductID] = updatedItem
	log.Printf("Updated quantity for product %s for user %s to %d\n", req.ProductID, req.UserID, req.Quantity)
	
	w.Header().Set("Content-Type", "application/json")
	w.WriteHeader(http.StatusOK)
	json.NewEncoder(w).Encode(map[string]string{"message": "Cart item quantity updated successfully"})
}

func removeCartItemHandler(w http.ResponseWriter, r *http.Request) {
	setCORSHeaders(w)
	if r.Method == http.MethodOptions {
		w.WriteHeader(http.StatusOK)
		return
	}
	if r.Method != http.MethodPost { 
		http.Error(w, "Only POST method is allowed for removing cart item", http.StatusMethodNotAllowed)
		return
	}

	var req RemoveCartItemRequest
	if err := json.NewDecoder(r.Body).Decode(&req); err != nil {
		http.Error(w, "Invalid request body: "+err.Error(), http.StatusBadRequest)
		return
	}

	if req.UserID == "" || req.ProductID == "" {
		http.Error(w, "Missing required fields (user_id, product_id)", http.StatusBadRequest)
		return
	}

	mu.Lock()
	defer mu.Unlock()

	userCart, userExists := carts[req.UserID]
	if !userExists {
		http.Error(w, "Cart not found for user", http.StatusNotFound)
		return
	}

	if _, itemExists := userCart[req.ProductID]; !itemExists {
		http.Error(w, "Item not found in cart to remove", http.StatusNotFound)
		return
	}

	delete(userCart, req.ProductID)
	log.Printf("Removed product %s from cart for user %s\n", req.ProductID, req.UserID)

	w.Header().Set("Content-Type", "application/json")
	w.WriteHeader(http.StatusOK)
	json.NewEncoder(w).Encode(map[string]string{"message": "Item removed from cart successfully"})
}


func viewCartHandler(w http.ResponseWriter, r *http.Request) {
    setCORSHeaders(w) 
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
	
	var updatedAtStr string

	if p.UpdatedAt.Valid {
		updatedAtStr = p.UpdatedAt.Time.Format(time.RFC3339)
	}

	return json.Marshal(&struct {
		Alias
		UpdatedAtStr string `json:"updated_at,omitempty"`
	}{
		Alias:     (Alias)(p),
		UpdatedAtStr: updatedAtStr,
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

	http.HandleFunc("/products", listProductsHandler) 
	http.HandleFunc("/cart/add", addToCartHandler)
	http.HandleFunc("/cart/view", viewCartHandler)
	http.HandleFunc("/cart/item/update", updateCartItemHandler)
	http.HandleFunc("/cart/item/remove", removeCartItemHandler) 


	port := 8080
	fmt.Printf("Starting Go backend server with MySQL on port %d...\n", port)
	log.Printf("Endpoints available:\nPOST /cart/add\nPOST /cart/item/update\nPOST /cart/item/remove\nGET  /cart/view?user_id=<USER_ID>\nGET /products?category=<CATEGORY_NAME>\n")
	if err := http.ListenAndServe(":"+strconv.Itoa(port), nil); err != nil {
		log.Fatalf("Could not start server: %s\n", err.Error())
	}
}