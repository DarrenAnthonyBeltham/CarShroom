<style>
    @import url('https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap');

    .site-footer {
        font-family: 'Space Mono', monospace;
        color: #000000; 
        background-color: #ffffff;
        margin-top: 50px;
        margin-bottom: 30px;
        padding: 40px 20px 20px 20px; 
        font-size: 14px; 
        line-height: 1.6;
    }

    .footer-container {
        max-width: 1200px; 
        margin: 0 auto;
    }

    .footer-main-content {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-wrap: wrap;
        gap: 30px; 
        margin-bottom: 30px;
    }

    .footer-logo img {
        max-width: 150px; 
        height: auto;
    }

    .footer-column {
        flex: 1;
        min-width: 180px; 
    }

    .footer-column h3 {
        font-size: 18px;
        font-weight: 700; 
        margin-top: 0;
        margin-bottom: 15px;
        color: #000000;
    }

    .footer-column ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-column ul li {
        margin-bottom: 8px;
    }

    .footer-column ul li a {
        text-decoration: none;
        color: #000000;
        transition: color 0.3s ease;
    }

    .footer-column ul li a:hover {
        color: #555555;
    }

    .footer-bottom-bar {
        border-top: 1px solid #e0e0e0; 
        padding-top: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap; 
        gap: 15px; 
        font-size: 13px; 
    }

    .footer-copyright {
        margin: 0;
    }

    .footer-legal-links a {
        text-decoration: none;
        color: #000000;
        margin-left: 20px;
        transition: color 0.3s ease;
    }

    .footer-legal-links a:first-child {
        margin-left: 0;
    }

    .footer-legal-links a:hover {
        color: #555555;
    }

    @media (max-width: 768px) {
        .footer-main-content {
            flex-direction: column; 
            align-items: center; 
            text-align: center;
        }
        .footer-logo {
            margin-bottom: 30px;
        }
        .footer-column {
            min-width: 100%; 
            margin-bottom: 20px;
        }
        .footer-column:last-child {
            margin-bottom: 0;
        }
        .footer-bottom-bar {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .footer-legal-links {
            margin-top: 10px;
            display: flex;
            flex-direction: column; 
            gap: 5px;
        }
        .footer-legal-links a {
            margin-left: 0;
        }
    }
</style>

<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-main-content">
            <div class="footer-logo">
                <img src="assets/FooterIcon.jpg" alt="The Show Must Go On">
            </div>

            <div class="footer-column">
                <h3>Buy</h3>
                <ul>
                    <li><a href="#">Current vehicle offers</a></li>
                    <li><a href="#">Price list and Brochure</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h3>Shopping Guide</h3>
                <ul>
                    <li><a href="#">Test Drive</a></li>
                    <li><a href="/CarShroom%20FE/dealerlocator.php">Find a Dealer</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h3>Customer Service</h3>
                <ul>
                    <li><a href="#">5-Year star service</a></li>
                    <li><a href="#">24 Hour Roadside Assitance</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h3>Our Brand</h3>
                <ul>
                    <li><a href="/CarShroom%20FE/contact.php">Contact</a></li>
                    <li><a href="/CarShroom%20FE/aboutus.php">About CarShroom</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom-bar">
            <p class="footer-copyright">© 2024. CarShroom</p>
            <div class="footer-legal-links">
                <a href="#">Legal Notices</a>
                <a href="#">Cookie Policy</a>
                <a href="#">Data Protection</a>
            </div>
        </div>
    </div>
</footer>