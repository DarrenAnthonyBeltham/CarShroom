package main

import (
	"database/sql"
	"encoding/json"
	"fmt"
	"log"
	"net/http"
	"sync"
)

var (
	carts = make(map[string]map[string]CartItem)
	mu    sync.Mutex
)

func listProductsHandler(w http.ResponseWriter, r *http.Request) {
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
		var imageURL, description, brand, productType, features, category sql.NullString
		err := rows.Scan(
			&p.ID, &p.Name, &p.Price, &p.Stock,
			&imageURL, &description, &p.UpdatedAt,
			&brand, &productType, &features, &category,
		)
		if err != nil {
			log.Printf("Error scanning product row: %v", err)
			continue
		}
		p.ImageURL = imageURL.String
		p.Description = description.String
		p.Brand = brand.String
		p.ProductType = productType.String
		p.Features = features.String
		p.Category = category.String

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
	p.ProductType = productType.String
	p.Features = features.String
	p.Category = category.String

	return p, nil
}

func addToCartHandler(w http.ResponseWriter, r *http.Request) {
	var req AddToCartRequest
	if err := json.NewDecoder(r.Body).Decode(&req); err != nil {
		http.Error(w, "Invalid request body: "+err.Error(), http.StatusBadRequest)
		return
	}

	product, err := getProductFromDB(req.ProductID)
	if err != nil {
		http.Error(w, err.Error(), http.StatusNotFound)
		return
	}

	mu.Lock()
	defer mu.Unlock()

	if _, ok := carts[req.UserID]; !ok {
		carts[req.UserID] = make(map[string]CartItem)
	}

	if item, ok := carts[req.UserID][req.ProductID]; ok {
		if product.Stock < (item.Quantity + req.Quantity) {
			http.Error(w, "Not enough stock", http.StatusConflict)
			return
		}
		item.Quantity += req.Quantity
		carts[req.UserID][req.ProductID] = item
	} else {
		if product.Stock < req.Quantity {
			http.Error(w, "Not enough stock", http.StatusConflict)
			return
		}
		carts[req.UserID][req.ProductID] = CartItem{Product: product, Quantity: req.Quantity}
	}

	w.Header().Set("Content-Type", "application/json")
	w.WriteHeader(http.StatusOK)
	json.NewEncoder(w).Encode(map[string]string{"message": "Item added to cart"})
}

func updateCartItemHandler(w http.ResponseWriter, r *http.Request) {
	var req AddToCartRequest
	if err := json.NewDecoder(r.Body).Decode(&req); err != nil {
		http.Error(w, "Invalid request body", http.StatusBadRequest)
		return
	}

	if req.Quantity < 0 {
		http.Error(w, "Quantity cannot be negative", http.StatusBadRequest)
		return
	}

	mu.Lock()
	defer mu.Unlock()

	userCart, userExists := carts[req.UserID]
	if !userExists || len(userCart) == 0 {
		http.Error(w, "Cart not found for user", http.StatusNotFound)
		return
	}

	item, itemExists := userCart[req.ProductID]
	if !itemExists {
		http.Error(w, "Item not found in cart", http.StatusNotFound)
		return
	}
	
	if req.Quantity == 0 {
		delete(userCart, req.ProductID)
		w.WriteHeader(http.StatusOK)
		json.NewEncoder(w).Encode(map[string]string{"message": "Item removed from cart"})
		return
	}
	
	if item.Product.Stock < req.Quantity {
		http.Error(w, "Not enough stock", http.StatusConflict)
		return
	}
	
	item.Quantity = req.Quantity
	userCart[req.ProductID] = item
	w.WriteHeader(http.StatusOK)
	json.NewEncoder(w).Encode(map[string]string{"message": "Cart updated"})
}

func removeCartItemHandler(w http.ResponseWriter, r *http.Request) {
	var req RemoveCartItemRequest
	if err := json.NewDecoder(r.Body).Decode(&req); err != nil {
		http.Error(w, "Invalid request body", http.StatusBadRequest)
		return
	}

	mu.Lock()
	defer mu.Unlock()

	if userCart, ok := carts[req.UserID]; ok {
		delete(userCart, req.ProductID)
	}
	
	w.WriteHeader(http.StatusOK)
	json.NewEncoder(w).Encode(map[string]string{"message": "Item removed"})
}

func viewCartHandler(w http.ResponseWriter, r *http.Request) {
	userID := r.URL.Query().Get("user_id")
	if userID == "" {
		http.Error(w, "User ID query parameter is required", http.StatusBadRequest)
		return
	}

	mu.Lock()
	defer mu.Unlock()

	userCart, exists := carts[userID]
	if !exists || len(userCart) == 0 {
		json.NewEncoder(w).Encode(map[string]interface{}{"cart": []CartItem{}})
		return
	}

	cartItemsSlice := make([]CartItem, 0, len(userCart))
	for _, item := range userCart {
		cartItemsSlice = append(cartItemsSlice, item)
	}

	w.Header().Set("Content-Type", "application/json")
	w.WriteHeader(http.StatusOK)
	json.NewEncoder(w).Encode(map[string]interface{}{"cart": cartItemsSlice})
}