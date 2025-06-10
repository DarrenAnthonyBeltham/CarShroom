<style>

    .cart-popup-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        z-index: 2000;
        display: none;
        align-items: center;
        justify-content: center;
        padding: 20px;
        opacity: 0;
        transition: all 0.3s ease-in-out;
    }

    .cart-popup-overlay.visible {
        display: flex;
        opacity: 1;
    }

    .cart-popup-content {
        background: white;
        padding: 35px 35px; 
        border-radius: 24px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 420px;
        text-align: center;
        position: relative;
        transform: scale(0.9) translateY(20px);
        opacity: 0;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    
    .cart-popup-overlay.visible .cart-popup-content {
        transform: scale(1) translateY(0);
        opacity: 1;
    }

    .cart-popup-close {
        position: absolute;
        top: 15px;
        right: 15px;
        background: #f1f2f6;
        border: none;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        color: #6c757d;
        transition: all 0.2s ease;
    }

    .cart-popup-close:hover {
        background: #dfe4ea;
        color: #2f3542;
        transform: rotate(90deg);
    }

    .cart-popup-icon {
        width: 75px;
        height: 75px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 24px auto;
        position: relative;
        overflow: hidden;
    }
    
    .cart-popup-icon.success {
        background: #2ecc71; 
    }

    .cart-popup-icon.error {
        background: #e74c3c; 
    }

    .cart-popup-icon svg {
        width: 34px;
        height: 34px;
        z-index: 1;
        animation: checkmark 0.6s ease-in-out 0.2s both;
    }

    .cart-popup-message {
        font-size: 1.2em;
        font-weight: 500;
        color: #34495e;
        margin-bottom: 40px;
        line-height: 1.5;
    }
    
    .cart-popup-message span {
        font-weight: 700;
        color: #2c3e50;
    }

    .cart-popup-actions {
        display: grid;
        grid-template-columns: 1fr;
        gap: 12px;
    }

    .cart-popup-actions .btn {
        padding: 14px 24px;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        font-size: 16px;
        font-weight: 600;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        width: 100%;
        position: relative;
        overflow: hidden;
    }

    .cart-popup-actions .btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }

    .cart-popup-actions .btn:active {
        transform: translateY(0);
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }

    .cart-popup-actions .btn-primary {
        background: #3498db;
        color: white;
    }

    .cart-popup-actions .btn-primary:hover {
        background: #2980b9;
        box-shadow: 0 8px 25px rgba(52, 152, 219, 0.3);
    }
    
    .cart-popup-actions .btn-secondary {
        background: #f0f0f0;
        color: #333;
        border: 2px solid #e0e0e0;
        padding: 12px 22px;
    }

    .cart-popup-actions .btn-secondary:hover {
        background: #e5e5e5;
        border-color: #d5d5d5;
        color: #000;
    }

    @media (min-width: 480px) {
        .cart-popup-actions {
            grid-template-columns: 1fr 1fr;
        }
    }

    @keyframes checkmark {
        0% { transform: scale(0); opacity: 0; }
        50% { transform: scale(1.2); opacity: 1; }
        100% { transform: scale(1); opacity: 1; }
    }
</style>

<div id="cartPopupOverlay" class="cart-popup-overlay">
    <div class="cart-popup-content">
        <button id="cartPopupCloseBtn" class="cart-popup-close">&times;</button>
        <div id="cartPopupIcon" class="cart-popup-icon success">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 6L9 17L4 12" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <p id="cartPopupMessage" style="margin-bottom: 20px;"></p>
        <div class="cart-popup-actions">
            <button id="cartPopupContinueBtn" class="btn btn-secondary">Continue Shopping</button>
            <button id="cartPopupViewCartBtn" class="btn btn-primary">View Cart</button>
        </div>
    </div>
</div>

<script>
    const cartPopupOverlay = document.getElementById('cartPopupOverlay');
    const cartPopupContinueBtn = document.getElementById('cartPopupContinueBtn');
    const cartPopupCloseBtn = document.getElementById('cartPopupCloseBtn');
    const cartPopupViewCartBtn = document.getElementById('cartPopupViewCartBtn');
    const cartPopupMessageEl = document.getElementById('cartPopupMessage');
    const cartPopupIconEl = document.getElementById('cartPopupIcon');

    const successIconSVG = `<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17L4 12" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>`;
    const errorIconSVG = `<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18 6L6 18M6 6L18 18" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>`;

    function showCartPopup(message, isError = false) {
        if (cartPopupOverlay) {
            cartPopupMessageEl.innerHTML = message; 
            
            if (isError) {
                cartPopupIconEl.innerHTML = errorIconSVG;
                cartPopupIconEl.classList.remove('success');
                cartPopupIconEl.classList.add('error');
                cartPopupViewCartBtn.style.display = 'none'; 
            } else {
                cartPopupIconEl.innerHTML = successIconSVG;
                cartPopupIconEl.classList.remove('error');
                cartPopupIconEl.classList.add('success');
                cartPopupViewCartBtn.style.display = 'block'; 
            }

            cartPopupOverlay.classList.add('visible');
        }
    }

    function hideCartPopup() {
        if (cartPopupOverlay) {
            cartPopupOverlay.classList.remove('visible');
        }
    }

    if(cartPopupContinueBtn) {
        cartPopupContinueBtn.addEventListener('click', hideCartPopup);
    }
    if(cartPopupCloseBtn) {
        cartPopupCloseBtn.addEventListener('click', hideCartPopup);
    }
    
    if(cartPopupViewCartBtn) {
        cartPopupViewCartBtn.addEventListener('click', () => {
            if(window.location.pathname.includes('/technologys/')) {
                window.location.href = '../cart.php'; 
            } else {
                window.location.href = 'cart.php'; 
            }
        });
    }

    if(cartPopupOverlay) {
         cartPopupOverlay.addEventListener('click', function(event) {
            if (event.target === this) {
                hideCartPopup();
            }
        });
    }
     document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && cartPopupOverlay.classList.contains('visible')) {
            hideCartPopup();
        }
    });
</script>
