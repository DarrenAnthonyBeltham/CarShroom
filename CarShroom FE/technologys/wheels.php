<?php
// Product data is now fetched from the Go backend via JavaScript.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>High-Tech Wheels - CarShroom Technology</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        html {
            box-sizing: border-box;
        }
        *, *:before, *:after {
            box-sizing: inherit;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            background-color: #f4f6f8; 
            color: #333333;
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex-grow: 1;
            padding-top: 40px; 
            padding-bottom: 60px;
        }
        
        .wheels-showcase-section {
            padding: 40px 20px;
            max-width: 1200px; 
            margin: 0 auto;
        }

        .wheels-main-title-container {
            text-align: center; 
            margin-bottom: 50px; 
        }
        
        .wheels-main-title {
            font-family: 'Space Mono', monospace;
            font-size: 2.5em; 
            font-weight: 700;
            text-transform: uppercase;
            color: #1a1a1a; 
            letter-spacing: 1.5px;
            line-height: 1.3;
            padding-bottom: 10px;
            border-bottom: 3px solid #e74c3c; 
            display: inline-block;
        }

        .wheel-products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); 
            gap: 35px; 
        }

        .wheel-product-card {
            background-color: #ffffff;
            border-radius: 8px; 
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .wheel-product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.12);
        }

        .wheel-product-card .image-container {
            width: 100%;
            height: 280px; 
            background-color: #f0f0f0; 
            display: flex; 
            align-items: center;
            justify-content: center;
            border-bottom: 1px solid #eee;
        }

        .wheel-product-card img {
            width: 100%;
            height: 100%; 
            object-fit: cover; 
            display: block;
        }
        
        .wheel-product-info {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex-grow: 1; 
        }

        .wheel-product-info h3 {
            font-family: 'Space Mono', monospace;
            font-size: 1.3em; 
            font-weight: 700;
            color: #2c3e50; 
            margin-bottom: 8px;
        }
        .wheel-product-info .brand {
            font-size: 0.85em;
            color: #7f8c8d; 
            margin-bottom: 10px;
            font-weight: 500;
            text-transform: uppercase;
        }
        .wheel-product-info .details {
            font-size: 0.9em;
            color: #555;
            margin-bottom: 15px;
            flex-grow: 1; 
        }
         .wheel-product-info .details strong {
            color: #333;
         }

        .wheel-product-price {
            font-size: 1.5em;
            font-weight: 700;
            color: #e74c3c; 
            margin-bottom: 15px;
            text-align: right;
        }

        .add-to-cart-button {
            display: block;
            width: 100%;
            background-color: #34495e; 
            color: #ffffff;
            padding: 12px 20px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
            font-size: 1em;
            transition: background-color 0.3s ease;
            border: none;
            cursor: pointer;
            margin-top: auto; 
        }
        .add-to-cart-button:hover {
            background-color: #2c3e50; 
        }
        
        #productLoadingMessage, #productErrorMessage {
            text-align: center;
            font-size: 1.1em;
            padding: 20px;
            color: #555;
        }
        #productErrorMessage {
            color: red;
        }

        @media (max-width: 768px) { 
            .wheels-main-title {
                font-size: 2em;
            }
             .wheel-products-grid {
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 25px;
            }
            .wheel-product-card .image-container { 
                height: 250px; 
            }
        }

        @media (max-width: 480px) { 
            .wheels-main-title {
                font-size: 1.7em;
            }
            .wheel-product-card .image-container { 
                height: 220px;
            }
            .wheel-product-info h3 {
                font-size: 1.15em;
            }
            .wheel-product-price {
                font-size: 1.3em;
            }
             .wheels-showcase-section {
                padding: 30px 15px;
            }
             main {
                padding-top: 20px;
                padding-bottom: 40px;
            }
        }
    </style>
</head>
<body>
    <?php 
        if (file_exists("../inc/navbar.php")) { 
            include "../inc/navbar.php";
        }
    ?>

    <main>
        <section class="wheels-showcase-section">
            <div class="wheels-main-title-container">
                <h1 class="wheels-main-title">High-Tech Wheels</h1>
            </div>
            <div id="productLoadingMessage">Loading wheels...</div>
            <div id="productErrorMessage" style="display:none;"></div>
            <div class="wheel-products-grid" id="wheelProductsGrid">
            </div>
        </section>
    </main>

    <?php 
        if (file_exists("../inc/news.php")) { 
            include "../inc/news.php";
        }
    ?>

    <?php 
        if (file_exists("../inc/footer.php")) { 
            include "../inc/footer.php";
        }
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const productsGrid = document.getElementById('wheelProductsGrid');
            const loadingMessageEl = document.getElementById('productLoadingMessage');
            const errorMessageEl = document.getElementById('productErrorMessage');
            const USER_ID = "user123"; 

            async function fetchProducts() {
                loadingMessageEl.style.display = 'block';
                errorMessageEl.style.display = 'none';
                productsGrid.innerHTML = ''; 

                try {
                    const response = await fetch(`http://localhost:8080/products?category=wheels`);
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    const products = await response.json();
                    renderProducts(products);
                } catch (error) {
                    console.error("Error fetching wheel products:", error);
                    errorMessageEl.textContent = 'Error loading wheels. Please try again later.';
                    errorMessageEl.style.display = 'block';
                } finally {
                    loadingMessageEl.style.display = 'none';
                }
            }

            function renderProducts(products) {
                if (!products || products.length === 0) {
                    productsGrid.innerHTML = '<p>No wheels found in this category.</p>';
                    return;
                }

                products.forEach(product => {
                    const productCard = document.createElement('div');
                    productCard.classList.add('wheel-product-card');

                    // The path from the database (e.g., 'assets/wheels/image.jpg') is treated
                    // as relative to the current file (wheels.php), which is correct.
                    const imagePath = product.image_url || 'https://placehold.co/400x400/cccccc/333333?text=No+Image';

                    productCard.innerHTML = `
                        <div class="image-container">
                            <img src="${htmlspecialchars(imagePath)}" alt="${htmlspecialchars(product.name)}" onerror="this.onerror=null;this.src='https://placehold.co/400x400/cccccc/333333?text=Image+Error';">
                        </div>
                        <div class="wheel-product-info">
                            <span class="brand">${htmlspecialchars(product.brand || 'N/A')}</span>
                            <h3>${htmlspecialchars(product.name)}</h3>
                            <p class="details">
                                <strong>Size:</strong> ${htmlspecialchars(product.size || 'N/A')}<br>
                                <strong>Finish:</strong> ${htmlspecialchars(product.finish || 'N/A')}<br>
                                ${htmlspecialchars(product.description || 'No description available.')}
                            </p>
                            <div class="wheel-product-price">$${parseFloat(product.price).toFixed(2)}</div>
                            <button type="button" class="add-to-cart-button" data-product-id="${product.id}" data-product-name="${htmlspecialchars(product.name)}">Add to Cart</button>
                        </div>
                    `;
                    productsGrid.appendChild(productCard);
                });

                document.querySelectorAll('.add-to-cart-button').forEach(button => {
                    button.addEventListener('click', function() {
                        const productId = this.dataset.productId;
                        const productName = this.dataset.productName;
                        addToCart(productId, productName, 1); 
                    });
                });
            }

            async function addToCart(productId, productName, quantity) {
                const payload = {
                    user_id: USER_ID,
                    product_id: productId,
                    quantity: quantity
                };
                try {
                    const response = await fetch('http://localhost:8080/cart/add', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json', },
                        body: JSON.stringify(payload),
                    });
                    const result = await response.json();
                    if (response.ok) {
                        alert(`"${htmlspecialchars(productName)}" added to cart successfully!`);
                    } else {
                        alert(`Error adding to cart: ${result.message || 'Unknown error'}`);
                    }
                } catch (error) {
                    console.error('Error adding to cart:', error);
                    alert('Failed to add item to cart. Please check the connection or try again later.');
                }
            }
            
            function htmlspecialchars(str) {
                if (typeof str !== 'string') return '';
                const map = { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' };
                return str.replace(/[&<>"']/g, function(m) { return map[m]; });
            }

            fetchProducts();
        });
    </script>
</body>
</html>
