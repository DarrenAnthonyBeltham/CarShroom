package main

import (
	"database/sql"
	"encoding/json"
	"time"
)

type Product struct {
	ID          string       `json:"id"`
	Name        string       `json:"name"`
	Price       float64      `json:"price"`
	ImageURL    string       `json:"image_url,omitempty"`
	Description string       `json:"description,omitempty"`
	Stock       int          `json:"stock"`
	UpdatedAt   sql.NullTime `json:"-"`
	UpdatedAtStr string `json:"updated_at,omitempty"`
	Brand        string `json:"brand,omitempty"`
	Category     string `json:"category,omitempty"`
	ProductType  string `json:"product_type,omitempty"` 
	Features     string `json:"features,omitempty"`
}

type CartItem struct {
	Product  Product `json:"product"`
	Quantity int     `json:"quantity"`
}

type AddToCartRequest struct {
	UserID    string `json:"user_id"`
	ProductID string `json:"product_id"`
	Quantity  int    `json:"quantity"`
}

type RemoveCartItemRequest struct {
	UserID    string `json:"user_id"`
	ProductID string `json:"product_id"`
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
		Alias:        (Alias)(p),
		UpdatedAtStr: updatedAtStr,
	})
}
