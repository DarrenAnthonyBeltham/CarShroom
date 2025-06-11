package main

import (
	"context"
	"database/sql"
	"fmt"
	"log"
	"net/http"
	"os"
	"os/signal"
	"syscall"
	"time"

	_ "github.com/go-sql-driver/mysql"
)

var db *sql.DB

func main() {
	initDB()
	defer func() {
		if db != nil {
			db.Close()
			log.Println("MySQL Database connection closed.")
		}
	}()

	mux := http.NewServeMux()
	mux.HandleFunc("/products", listProductsHandler)
	mux.HandleFunc("/cart/add", addToCartHandler)
	mux.HandleFunc("/cart/view", viewCartHandler)
	mux.HandleFunc("/cart/item/update", updateCartItemHandler)
	mux.HandleFunc("/cart/item/remove", removeCartItemHandler)

	port := "8080"
	server := &http.Server{
		Addr:    ":" + port,
		Handler: corsMiddleware(mux), 
	}

	go func() {
		log.Printf("Starting Go backend server on port %s...", port)
		log.Printf("Endpoints available:\n")
		log.Printf("GET  /products?category=<CATEGORY_NAME>\n")
		log.Printf("POST /cart/add\n")
		log.Printf("POST /cart/item/update\n")
		log.Printf("POST /cart/item/remove\n")
		log.Printf("GET  /cart/view?user_id=<USER_ID>\n")

		if err := server.ListenAndServe(); err != nil && err != http.ErrServerClosed {
			log.Fatalf("Could not start server: %v\n", err)
		}
	}()

	quit := make(chan os.Signal, 1)
	signal.Notify(quit, syscall.SIGINT, syscall.SIGTERM)
	<-quit
	log.Println("Shutting down server...")

	ctx, cancel := context.WithTimeout(context.Background(), 5*time.Second)
	defer cancel()

	if err := server.Shutdown(ctx); err != nil {
		log.Fatalf("Server forced to shutdown: %v", err)
	}

	log.Println("Server exiting")
}

func corsMiddleware(next http.Handler) http.Handler {
	return http.HandlerFunc(func(w http.ResponseWriter, r *http.Request) {
		w.Header().Set("Access-Control-Allow-Origin", "*")
		w.Header().Set("Access-Control-Allow-Methods", "POST, GET, OPTIONS, PUT, DELETE")
		w.Header().Set("Access-Control-Allow-Headers", "Accept, Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token, Authorization")

		if r.Method == "OPTIONS" {
			w.WriteHeader(http.StatusOK)
			return
		}

		next.ServeHTTP(w, r)
	})
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