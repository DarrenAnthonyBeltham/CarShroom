<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarShroom Menu - Animated Burger</title>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&family=Space+Mono:wght@400&family=Pacifico&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 30px;
            position: relative;
            box-sizing: border-box;
            background-color: #333;
            color: white;
        }

        .navbar .title {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            font-family: 'Pacifico', cursive;
            font-size: 24px;
            margin: 0;
            color: white;
        }

        .animated-burger-button {
            width: 30px;
            height: 22px; 
            position: relative;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin-left: auto; 
            z-index: 1002; 
            background: transparent;
            border: none;
            padding: 0;
        }

        .animated-burger-button span {
            display: block;
            width: 100%;
            height: 3px; 
            background-color: white;
            border-radius: 3px;
            transition: all 0.3s cubic-bezier(0.645, 0.045, 0.355, 1); 
            transform-origin: center;
        }

        .animated-burger-button.active span:nth-child(1) {
            transform: translateY(9.5px) rotate(45deg); 
        }

        .animated-burger-button.active span:nth-child(2) {
            opacity: 0;
            transform: translateX(-20px); 
        }

        .animated-burger-button.active span:nth-child(3) {
            transform: translateY(-9.5px) rotate(-45deg); 
        }


        .overlay-menu {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #3a3a3a;
            color: white;
            display: none;
            flex-direction: column;
            padding: 20px 30px;
            box-sizing: border-box;
            z-index: 1000;
            overflow-y: auto;
        }

        .overlay-menu.open {
            display: flex;
        }

        .overlay-header {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            margin-bottom: 30px;
            width: 100%;
            padding-top: 5px;
        }

        .overlay-logo {
            font-family: 'Pacifico', cursive;
            font-size: 24px;
            margin: 0;
        }

        .overlay-content-area {
            display: flex;
            flex-grow: 1;
            width: 100%;
        }

        .overlay-main-nav {
            flex-basis: 60%;
            padding-right: 20px;
        }

        .overlay-main-nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .overlay-main-nav li a {
            font-family: 'Oswald', Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            font-size: clamp(40px, 7vw, 80px);
            line-height: 1.1;
            font-weight: 700;
            text-decoration: none;
            color: white;
            display: block;
            margin-bottom: 5px;
            transition: color 0.2s ease-in-out;
        }
        .overlay-main-nav li a:hover {
            color: #aaa;
        }

        .overlay-secondary-links {
            flex-basis: 40%;
            padding-left: 20px;
            padding-top: calc(clamp(40px, 7vw, 80px) * 1.8);
            display: flex;
            gap: 40px;
        }

        .overlay-secondary-links .column a {
            font-family: 'Space Mono', 'Courier New', monospace;
            font-size: clamp(14px, 1.5vw, 18px);
            text-decoration: none;
            color: white;
            display: block;
            margin-bottom: 15px;
            transition: color 0.2s ease-in-out;
        }
        .overlay-secondary-links .column a:hover {
            color: #aaa;
        }

        .no-scroll {
            overflow: hidden;
        }

    </style>
</head>
<body>

    <div class="navbar">
        <p class="title">CarShroom</p>
        <button class="animated-burger-button" id="animatedBurgerBtn" aria-label="Toggle menu" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>

    <div id="overlayMenu" class="overlay-menu">
        <div class="overlay-header">
            <p class="overlay-logo">CarShroom</p>
            
        </div>

        <div class="overlay-content-area">
            <nav class="overlay-main-nav">
                <ul>
                    <li><a href="/CarShroom%20FE/index.php">HOMEPAGE</a></li>
                    <li><a href="/CarShroom%20FE/cars.php">CARS</a></li>
                    <li><a href="/CarShroom%20FE/technology.php">TECHNOLOGY</a></li>
                    <li><a href="/CarShroom%20FE/aboutus.php">ABOUT</a></li>
                    <li><a href="/CarShroom%20FE/contact.php">CONTACT</a></li>
                </ul>
            </nav>
            <div class="overlay-secondary-links">
                <div class="column">
                    <a href="#">Dealer Locator</a>
                    <a href="/CarShroom%20FE/cart.php">Cart</a>
                    <a href="#">Lifestyle</a>
                </div>
                <div class="column">
                    <a href="#">Careers</a>
                    <a href="#">Press</a>
                    <a href="#">News</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        const animatedBurgerBtn = document.getElementById('animatedBurgerBtn');
        const overlayMenu = document.getElementById('overlayMenu');
        const navLinks = overlayMenu.querySelectorAll('a');

        function toggleMenu() {
            const isOpened = animatedBurgerBtn.classList.toggle('active');
            animatedBurgerBtn.setAttribute('aria-expanded', isOpened);
            overlayMenu.classList.toggle('open');
            document.body.classList.toggle('no-scroll');
        }

        if (animatedBurgerBtn) {
            animatedBurgerBtn.addEventListener('click', toggleMenu);
        }

        if (navLinks) {
            navLinks.forEach(link => {
                link.addEventListener('click', () => {
                    if (link.getAttribute('href').startsWith('#') && overlayMenu.classList.contains('open')) {
                        toggleMenu();
                    }
                    // For non-anchor links, the page will navigate, so the menu will close automatically.
                });
            });
        }

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && overlayMenu.classList.contains('open')) {
                toggleMenu();
            }
        });
    </script>

</body>
</html>
