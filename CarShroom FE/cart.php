<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Shopping Cart - CarShroom</title>
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
        
        .cart-container {
            padding: 30px 20px;
            max-width: 1200px; 
            margin: 0 auto;
        }

        .cart-main-title-container { 
            text-align: center; 
            margin-bottom: 40px; 
        }
        
        .cart-main-title { 
            font-family: 'Space Mono', monospace;
            font-size: 2.5em; 
            font-weight: 700;
            text-transform: uppercase;
            color: #1a1a1a; 
            letter-spacing: 1.5px;
            padding-bottom: 10px;
            border-bottom: 3px solid #e74c3c; 
            display: inline-block;
        }

        .cart-layout {
            display: grid;
            grid-template-columns: 2fr 1fr; 
            gap: 40px;
        }

        .cart-items-list {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.07);
        }

        .cart-item {
            display: grid;
            grid-template-columns: 100px 1fr auto auto; 
            gap: 20px;
            align-items: center;
            padding-bottom: 20px;
            margin-bottom: 20px;
            border-bottom: 1px solid #e0e0e0;
        }
        .cart-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .cart-item-image img {
            width: 100%;
            height: auto;
            max-height: 80px;
            object-fit: contain;
            border-radius: 4px;
            background-color: #f8f8f8; 
        }

        .cart-item-info h3 {
            font-family: 'Space Mono', monospace;
            font-size: 1.1em;
            color: #2c3e50;
            margin-bottom: 5px;
        }
        .cart-item-info .item-meta {
            font-size: 0.85em;
            color: #7f8c8d;
        }

        .cart-item-quantity input[type="number"] {
            width: 60px;
            padding: 8px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 0.9em;
            margin-right: 10px;
        }
        
        .cart-item-quantity input[type=number]::-webkit-inner-spin-button, 
        .cart-item-quantity input[type=number]::-webkit-outer-spin-button { 
          -webkit-appearance: none; 
          margin: 0; 
        }
        .cart-item-quantity input[type=number] {
          -moz-appearance: textfield; 
        }
        
        .cart-item-actions .item-price {
            font-size: 1.1em;
            font-weight: 600;
            color: #333;
            display: block;
            text-align: right;
            margin-bottom: 8px;
        }
        .cart-item-actions .remove-item-btn {
            background: none;
            border: none;
            color: #e74c3c;
            font-size: 0.85em;
            text-decoration: underline;
            cursor: pointer;
            padding: 0;
            float: right;
        }
        .cart-item-actions .remove-item-btn:hover {
            color: #c0392b;
        }

        .cart-summary {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.07);
            height: fit-content; 
        }
        .cart-summary h2 {
            font-family: 'Space Mono', monospace;
            font-size: 1.5em;
            color: #1a1a1a;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 1em;
        }
        .summary-row.total {
            font-weight: 700;
            font-size: 1.2em;
            color: #e74c3c;
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }
        .summary-row span:first-child {
            color: #555;
        }

        .cart-actions button {
            display: block;
            width: 100%;
            padding: 12px 20px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
            font-size: 1em;
            transition: background-color 0.3s ease;
            border: none;
            cursor: pointer;
            margin-bottom: 10px;
        }
        .cart-actions .checkout-btn {
            background-color: #e74c3c;
            color: #ffffff;
        }
        .cart-actions .checkout-btn:hover {
            background-color: #c0392b;
        }
        .cart-actions .continue-shopping-btn {
            background-color: #3498db;
            color: #ffffff;
        }
        .cart-actions .continue-shopping-btn:hover {
            background-color: #2980b9;
        }
        
        .empty-cart-message {
            text-align: center;
            padding: 40px;
            font-size: 1.2em;
            color: #777;
        }
        .empty-cart-message a {
            color: #3498db;
            text-decoration: none;
        }
        .empty-cart-message a:hover {
            text-decoration: underline;
        }

        #loadingMessage, #cartActionStatus {
            text-align: center;
            font-size: 1.1em;
            padding: 20px;
            color: #555;
        }
        #cartActionStatus.success {
            color: green;
        }
        #cartActionStatus.error {
            color: red;
        }


        @media (max-width: 992px) {
            .cart-layout {
                grid-template-columns: 1fr; 
            }
             .cart-summary {
                margin-top: 30px;
            }
        }
        @media (max-width: 576px) {
            .cart-main-title {
                font-size: 2em;
            }
            .cart-item {
                grid-template-columns: 80px 1fr; 
                grid-template-areas: 
                    "img info"
                    "img qty"
                    "img actions";
                align-items: flex-start;
            }
            .cart-item-image { grid-area: img; align-self: center;}
            .cart-item-info { grid-area: info; }
            .cart-item-quantity { grid-area: qty; margin-top: 10px; }
            .cart-item-actions { grid-area: actions; text-align: left; margin-top:10px;}
            .cart-item-actions .item-price { text-align: left; }
            .cart-item-actions .remove-item-btn { float: none; display:inline-block; margin-top: 5px;}

            .cart-items-list, .cart-summary {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <?php 
        if (file_exists("inc/navbar.php")) { 
            include "inc/navbar.php";
        }
    ?>

    <main>
        <section class="cart-container">
            <div class="cart-main-title-container">
                <h1 class="cart-main-title">Your Shopping Cart</h1>
            </div>

            <div id="loadingMessage">Loading cart...</div>
            <div id="cartActionStatus" style="display:none;"></div>
            
            <div class="cart-layout" style="display: none;"> 
                <div class="cart-items-list" id="cartItemsContainer">
                </div>

                <div class="cart-summary">
                    <h2>Order Summary</h2>
                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span id="cartSubtotal">$0.00</span>
                    </div>
                    <div class="summary-row">
                        <span>Shipping</span>
                        <span id="cartShipping">Calculated at checkout</span>
                    </div>
                    <div class="summary-row total">
                        <span>Total</span>
                        <span id="cartTotal">$0.00</span>
                    </div>
                    <div class="cart-actions">
                        <button type="button" class="checkout-btn" onclick="alert('Proceeding to Checkout! (Backend integration needed)')">Proceed to Checkout</button>
                        <button type="button" class="continue-shopping-btn" onclick="window.location.href='technology.php'">Continue Shopping</button>
                    </div>
                </div>
            </div>
            <div id="emptyCartMessageContainer" style="display: none;">
                 <p class="empty-cart-message">Your cart is currently empty. <a href="technology.php">Start shopping!</a></p>
            </div>
        </section>
    </main>

    <?php 
        if (file_exists("inc/footer.php")) { 
            include "inc/footer.php";
        }
    ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cartItemsContainer = document.getElementById('cartItemsContainer');
            const cartSubtotalEl = document.getElementById('cartSubtotal');
            const cartTotalEl = document.getElementById('cartTotal');
            const cartLayoutEl = document.querySelector('.cart-layout');
            const loadingMessageEl = document.getElementById('loadingMessage');
            const emptyCartMessageContainerEl = document.getElementById('emptyCartMessageContainer');
            const cartActionStatusEl = document.getElementById('cartActionStatus');
            
            const USER_ID = "user123"; 
            const GO_BACKEND_URL = 'http://localhost:8080'; 

            function displayActionStatus(message, isError = false) {
                cartActionStatusEl.textContent = message;
                cartActionStatusEl.className = isError ? 'error' : 'success';
                cartActionStatusEl.style.display = 'block';
                setTimeout(() => {
                    cartActionStatusEl.style.display = 'none';
                }, 3000); 
            }

            async function fetchCartData() {
                loadingMessageEl.style.display = 'block';
                cartLayoutEl.style.display = 'none';
                emptyCartMessageContainerEl.style.display = 'none';
                cartActionStatusEl.style.display = 'none';


                try {
                    const response = await fetch(`${GO_BACKEND_URL}/cart/view?user_id=${USER_ID}`);
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    const data = await response.json();
                    renderCart(data.cart);
                } catch (error) {
                    console.error("Error fetching cart data:", error);
                    cartItemsContainer.innerHTML = '<p style="color:red;">Error loading cart. Please try again later.</p>';
                    loadingMessageEl.style.display = 'none';
                    cartLayoutEl.style.display = 'grid'; 
                }
            }

            function renderCart(items) {
                cartItemsContainer.innerHTML = ''; 
                let subtotal = 0;

                if (!items || items.length === 0) {
                    emptyCartMessageContainerEl.style.display = 'block';
                    cartLayoutEl.style.display = 'none';
                    loadingMessageEl.style.display = 'none';
                    updateCartSummary(0); 
                    return;
                }
                
                emptyCartMessageContainerEl.style.display = 'none';
                cartLayoutEl.style.display = 'grid'; 
                loadingMessageEl.style.display = 'none';

                items.forEach(item => {
                    if (!item.product) {
                        console.warn("Skipping cart item with missing product data:", item);
                        return; 
                    }
                    const itemElement = document.createElement('div');
                    itemElement.classList.add('cart-item');
                    
                    const productPrice = parseFloat(item.product.price);
                    const lineTotal = productPrice * item.quantity;
                    subtotal += lineTotal;

                    // FIX: Construct the correct relative path based on file structure
                    let imagePath = `technologys/${item.product.image_url || ''}`;

                    itemElement.innerHTML = `
                        <div class="cart-item-image">
                            <img src="${htmlspecialchars(imagePath)}" alt="${htmlspecialchars(item.product.name || 'Product Image')}">
                        </div>
                        <div class="cart-item-info">
                            <h3>${htmlspecialchars(item.product.name || 'Unknown Product')}</h3>
                            <p class="item-meta">ID: ${htmlspecialchars(item.product.id || 'N/A')}</p>
                        </div>
                        <div class="cart-item-quantity">
                            <input type="number" value="${item.quantity}" min="1" data-product-id="${item.product.id}" class="item-quantity-input">
                        </div>
                        <div class="cart-item-actions">
                            <span class="item-price">$${lineTotal.toFixed(2)}</span>
                            <button class="remove-item-btn" data-product-id="${item.product.id}">Remove</button>
                        </div>
                    `;
                    cartItemsContainer.appendChild(itemElement);
                });
                updateCartSummary(subtotal);
                attachCartItemEventListeners();
            }
            
            function attachCartItemEventListeners() {
                document.querySelectorAll('.item-quantity-input').forEach(input => {
                    input.addEventListener('change', function() {
                        const productId = this.dataset.productId;
                        const quantity = parseInt(this.value, 10);
                        if (quantity >= 0) { 
                            updateCartItemQuantity(productId, quantity);
                        } else {
                            this.value = 1; 
                        }
                    });
                });

                document.querySelectorAll('.remove-item-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        const productId = this.dataset.productId;
                        removeCartItem(productId);
                    });
                });
            }


            async function updateCartItemQuantity(productId, quantity) {
                const payload = {
                    user_id: USER_ID,
                    product_id: productId,
                    quantity: quantity
                };
                try {
                    const response = await fetch(`${GO_BACKEND_URL}/cart/item/update`, {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify(payload)
                    });
                    const result = await response.json();
                    if (response.ok) {
                        displayActionStatus(result.message || 'Cart updated successfully!');
                        fetchCartData(); 
                    } else {
                        displayActionStatus(result.message || 'Error updating cart.', true);
                    }
                } catch (error) {
                    console.error('Error updating cart item:', error);
                    displayActionStatus('Failed to update cart item. Please check connection.', true);
                }
            }

            async function removeCartItem(productId) {
                const payload = {
                    user_id: USER_ID,
                    product_id: productId
                };
                try {
                    const response = await fetch(`${GO_BACKEND_URL}/cart/item/remove`, {
                        method: 'POST', 
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify(payload)
                    });
                    const result = await response.json();
                    if (response.ok) {
                        displayActionStatus(result.message || 'Item removed successfully!');
                        fetchCartData(); 
                    } else {
                        displayActionStatus(result.message || 'Error removing item.', true);
                    }
                } catch (error) {
                    console.error('Error removing cart item:', error);
                    displayActionStatus('Failed to remove item. Please check connection.', true);
                }
            }


            function updateCartSummary(subtotal) {
                cartSubtotalEl.textContent = `$${subtotal.toFixed(2)}`;
                cartTotalEl.textContent = `$${subtotal.toFixed(2)}`;
            }
            
            function htmlspecialchars(str) {
                if (typeof str !== 'string') return '';
                const map = { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' };
                return str.replace(/[&<>"']/g, function(m) { return map[m]; });
            }

            fetchCartData();
        });
    </script>
</body>
</html>
