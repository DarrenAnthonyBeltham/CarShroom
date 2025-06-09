<?php
// Static $interior_products array is removed. Data will now be fetched via JavaScript.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxury Interiors - CarShroom Technology</title>
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
        
        .interiors-showcase-section { 
            padding: 40px 20px;
            max-width: 1200px; 
            margin: 0 auto;
        }

        .interiors-main-title-container { 
            text-align: center; 
            margin-bottom: 50px; 
        }
        
        .interiors-main-title { 
            font-family: 'Space Mono', monospace;
            font-size: 2.5em; 
            font-weight: 700;
            text-transform: uppercase;
            color: #1a1a1a; 
            letter-spacing: 1.5px;
            line-height: 1.3;
            padding-bottom: 10px;
            border-bottom: 3px solid #b8860b; 
            display: inline-block;
        }

        .interior-products-grid { 
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); 
            gap: 35px; 
        }

        .interior-product-card { 
            background-color: #ffffff;
            border-radius: 8px; 
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .interior-product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.12);
        }

        .interior-product-card .image-container {
            width: 100%;
            height: 280px; 
            background-color: #faf0e6; 
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom: 1px solid #ddd;
        }

        .interior-product-card img {
            width: 100%;
            height: 100%; 
            object-fit: cover; 
            display: block;
        }
        
        .interior-product-info { 
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex-grow: 1; 
        }

        .interior-product-info h3 {
            font-family: 'Space Mono', monospace;
            font-size: 1.3em; 
            font-weight: 700;
            color: #8B4513; 
            margin-bottom: 8px;
        }
        .interior-product-info .brand {
            font-size: 0.85em;
            color: #7f8c8d; 
            margin-bottom: 5px;
            font-weight: 500;
            text-transform: uppercase;
        }
         .interior-product-info .material { 
            font-size: 0.9em;
            color: #555;
            margin-bottom: 10px;
            font-style: italic;
        }
        .interior-product-info .details {
            font-size: 0.9em;
            color: #555;
            margin-bottom: 15px;
            flex-grow: 1; 
        }
         .interior-product-info .details strong {
            color: #333;
         }

        .interior-product-price { 
            font-size: 1.5em;
            font-weight: 700;
            color: #b8860b; 
            margin-bottom: 15px;
            text-align: right;
        }

        .add-to-cart-button {
            display: block;
            width: 100%;
            background-color: #8B4513; 
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
            background-color: #7A3D0F; 
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
            .interiors-main-title {
                font-size: 2em;
            }
             .interior-products-grid {
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 25px;
            }
            .interior-product-card .image-container {
                height: 250px; 
            }
        }

        @media (max-width: 480px) { 
            .interiors-main-title {
                font-size: 1.7em;
            }
            .interior-product-card .image-container {
                height: 220px;
            }
            .interior-product-info h3 {
                font-size: 1.15em;
            }
            .interior-product-price {
                font-size: 1.3em;
            }
             .interiors-showcase-section {
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
        <section class="interiors-showcase-section">
            <div class="interiors-main-title-container">
                <h1 class="interiors-main-title">Luxury Interiors</h1>
            </div>
            <div id="productLoadingMessage">Loading interiors...</div>
            <div id="productErrorMessage" style="display:none;"></div>
            <div class="interior-products-grid" id="interiorProductsGrid">
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
            const productsGrid = document.getElementById('interiorProductsGrid');
            const loadingMessageEl = document.getElementById('productLoadingMessage');
            const errorMessageEl = document.getElementById('productErrorMessage');
            const USER_ID = "user123"; 

            async function fetchProducts() {
                loadingMessageEl.style.display = 'block';
                errorMessageEl.style.display = 'none';
                productsGrid.innerHTML = ''; 

                try {
                    const response = await fetch(`http://localhost:8080/products?category=interior`);
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    const products = await response.json();
                    renderProducts(products);
                } catch (error) {
                    console.error("Error fetching interior products:", error);
                    errorMessageEl.textContent = 'Error loading interiors. Please try again later.';
                    errorMessageEl.style.display = 'block';
                } finally {
                    loadingMessageEl.style.display = 'none';
                }
            }

            function renderProducts(products) {
                if (!products || products.length === 0) {
                    productsGrid.innerHTML = '<p>No interior components found in this category.</p>';
                    return;
                }

                products.forEach(product => {
                    const productCard = document.createElement('div');
                    productCard.classList.add('interior-product-card');

                    // The path from the database (e.g., 'assets/interior/image.jpg') is treated
                    // as relative to the current file (interior.php). Since both are in 'technologys',
                    // this path is now correct.
                    const imagePath = product.image_url || 'https://placehold.co/400x400/cccccc/333333?text=No+Image';

                    productCard.innerHTML = `
                        <div class="image-container">
                            <img src="${htmlspecialchars(imagePath)}" alt="${htmlspecialchars(product.name)}" onerror="this.onerror=null;this.src='https://placehold.co/400x400/cccccc/333333?text=Image+Error';">
                        </div>
                        <div class="interior-product-info">
                            <span class="brand">${htmlspecialchars(product.brand || 'N/A')}</span>
                            <h3>${htmlspecialchars(product.name)}</h3>
                            <p class="material">Material: ${htmlspecialchars(product.material || product.type || 'N/A')}</p>
                            <p class="details">
                                <strong>Features:</strong> ${htmlspecialchars(product.features || 'N/A')}<br>
                                ${htmlspecialchars(product.description || 'No description available.')}
                            </p>
                            <div class="interior-product-price">$${parseFloat(product.price).toFixed(2)}</div>
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
