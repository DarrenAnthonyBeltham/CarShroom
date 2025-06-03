<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - CarShroom</title>
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
            background-color: #ffffff;
            color: #333333;
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            overflow-x: hidden; 
        }

        main {
            flex-grow: 1;
        }
        
        .contact-banner {
            height: 60vh;
            min-height: 400px;
            background-image: url('./assets/Contact Us.jpg'); 
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            align-items: flex-start; 
            justify-content: center;
            position: relative;
            color: #ffffff;
            padding: 0 5%; 
        }

        .contact-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.3); 
        }

        .contact-banner-title-main {
            font-family: 'Space Mono', monospace;
            font-size: 1.8em; 
            font-weight: 400;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            z-index: 1;
            margin-bottom: 5px;
            color: #dddddd;
        }
        
        .contact-banner-title-sub {
            font-family: 'Space Mono', monospace; 
            font-size: 3.5em;
            font-weight: 700;
            position: relative;
            z-index: 1;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.5);
            line-height: 1.1;
        }

        .contact-content-section {
            padding: 60px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            align-items: flex-start; 
        }
        
        .contact-grid-item {
            background-color: #f9f9f9; 
            padding: 0; 
            border-radius: 8px;
            overflow: hidden; 
        }
        
        .contact-grid-item.text-only {
             background-color: transparent;
             padding: 0;
        }

        .contact-grid-item img {
            width: 100%;
            height: auto;
            display: block;
            max-height: 300px; 
            object-fit: cover;
        }
        
        .contact-item-content {
            padding: 25px;
        }

        .contact-grid-item h2 {
            font-family: 'Space Mono', monospace;
            font-size: 1.5em;
            font-weight: 700;
            color: #000000;
            margin-bottom: 15px;
        }

        .contact-grid-item p {
            font-size: 0.95em;
            color: #555555;
            margin-bottom: 15px;
            text-align: left; 
        }
         .contact-grid-item p.phone-details {
            font-size: 1.1em;
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 5px;
        }
        .contact-grid-item p.hours-details {
            font-size: 0.9em;
            color: #7f8c8d;
        }

        .contact-button {
            display: inline-block;
            background-color: #34495e; 
            color: #ffffff;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 500;
            font-size: 1em;
            transition: background-color 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .contact-button:hover {
            background-color: #2c3e50; 
        }
        
        .customer-care-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: center;
            margin-bottom: 60px;
        }
        .customer-care-section .text-content {
             padding-right: 20px;
        }
         .customer-care-section img {
            border-radius: 8px;
            width: 100%;
            height: auto;
            max-height: 400px;
            object-fit: cover;
        }

        .sidebar-form-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            z-index: 1999; 
            display: none; 
        }

        .sidebar-form {
            height: 100%;
            width: 0; 
            position: fixed;
            z-index: 2000;
            top: 0;
            right: 0;
            background-color: #ffffff;
            overflow-x: hidden;
            transition: 0.5s cubic-bezier(0.25, 0.8, 0.25, 1);
            padding-top: 20px; 
            box-shadow: -5px 0 15px rgba(0,0,0,0.2);
        }

        .sidebar-form.open {
            width: 400px; 
        }
        
        .sidebar-form-content {
            padding: 20px 30px;
        }

        .sidebar-form .close-btn {
            position: absolute;
            top: 15px;
            right: 25px;
            font-size: 30px;
            margin-left: 50px;
            color: #888;
            text-decoration: none;
            transition: color 0.2s;
        }
        .sidebar-form .close-btn:hover {
            color: #000;
        }

        .sidebar-form h3 {
            font-family: 'Space Mono', monospace;
            font-size: 1.6em;
            color: #333;
            margin-bottom: 25px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        .sidebar-form .form-group {
            margin-bottom: 20px;
        }

        .sidebar-form label {
            display: block;
            margin-bottom: 6px;
            font-size: 0.9em;
            color: #555;
            font-weight: 500;
        }

        .sidebar-form input[type="text"],
        .sidebar-form input[type="email"],
        .sidebar-form input[type="tel"],
        .sidebar-form textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 0.95em;
            font-family: 'Inter', sans-serif;
        }
         .sidebar-form textarea {
            min-height: 120px;
            resize: vertical;
        }

        .sidebar-form .checkbox-group {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }
        .sidebar-form .checkbox-group input[type="checkbox"] {
            margin-right: 10px;
            width: 16px;
            height: 16px;
            accent-color: #34495e;
        }
         .sidebar-form .checkbox-group label {
            margin-bottom: 0;
            font-size: 0.85em;
            color: #666;
         }

        .sidebar-form .submit-button {
            background-color: #34495e;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            font-weight: 500;
            width: 100%;
            transition: background-color 0.3s ease;
        }
        .sidebar-form .submit-button:hover {
            background-color: #2c3e50;
        }


        @media (max-width: 992px) {
            .customer-care-section {
                grid-template-columns: 1fr;
            }
             .customer-care-section .text-content {
                 padding-right: 0;
                 margin-bottom: 30px;
            }
        }

        @media (max-width: 768px) {
            .contact-banner {
                height: 50vh;
                min-height: 350px;
                padding: 0 5%;
            }
            .contact-banner-title-main {
                font-size: 1.5em;
            }
            .contact-banner-title-sub {
                font-size: 2.8em;
            }
            .contact-grid-item h2 {
                font-size: 1.3em;
            }
             .contact-grid {
                gap: 25px;
            }
            .sidebar-form.open {
                width: 320px; 
            }
        }

        @media (max-width: 480px) {
            .contact-banner-title-main {
                font-size: 1.2em;
            }
            .contact-banner-title-sub {
                font-size: 2.2em;
            }
            .contact-item-content {
                padding: 20px;
            }
            .sidebar-form.open {
                width: 100%; 
                padding-top: 10px;
            }
            .sidebar-form-content {
                padding: 15px 20px;
            }
            .sidebar-form h3 {
                font-size: 1.4em;
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

    <header class="contact-banner">
        <span class="contact-banner-title-main">CONTACT US</span>
        <h1 class="contact-banner-title-sub">CUSTOMER CARE</h1>
    </header>

    <main>
        <section class="contact-content-section">
            <div class="customer-care-section">
                <div class="text-content">
                    <h2>CARSHROOM CUSTOMER CARE</h2>
                    <p>CarShroom is committed to providing you with an exceptional customer experience across multiple channels. Whether you're exploring our wide selection of premium vehicles or need assistance with purchase or service, we're here to help. At CarShroom, we're passionate about driving your satisfaction and ensuring every interaction is as smooth as the ride in your dream car. Let us know how we can assist you today!</p>
                </div>
                <img src="./assets/Dealer 2.jpeg" alt="CarShroom Customer Care Area">
            </div>

            <div class="contact-grid">
                <div class="contact-grid-item text-only">
                    <div class="contact-item-content">
                        <h2>MAKE A CALL</h2>
                        <p class="phone-details">phone: 0812-3456-7890</p>
                        <p class="hours-details">Monday to Friday</p>
                        <p class="hours-details" style="margin-bottom:0;">8:00am to 7:00pm</p>
                    </div>
                </div>
                
                <div class="contact-grid-item">
                     <img src="./assets/Car Dealership Contact Us 1.jpg" alt="Send a Message Visual">
                    <div class="contact-item-content">
                        <h2>SEND A MESSAGE</h2>
                        <p>CarShroom is committed to providing you with an exceptional customer experience across multiple channels. Whether you're exploring our wide selection of premium vehicles or need assistance with purchase or service, we're here to help. At CarShroom, we're passionate about driving your satisfaction and ensuring every interaction is as smooth as the ride in your dream car. Let us know how we can assist you today!</p>
                        <button type="button" class="contact-button" id="openSidebarForm">Send A Message</button>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <div class="sidebar-form-overlay" id="sidebarFormOverlay"></div>
    <div id="messageSidebar" class="sidebar-form">
        <div class="sidebar-form-content">
            <a href="javascript:void(0)" class="close-btn" id="closeSidebarForm">&times;</a>
            <h3>Send Us A Message</h3>
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="formName">Name*</label>
                    <input type="text" id="formName" name="name" required>
                </div>
                <div class="form-group">
                    <label for="formSurname">Surname*</label>
                    <input type="text" id="formSurname" name="surname" required>
                </div>
                <div class="form-group">
                    <label for="formPhone">Phone Number*</label>
                    <input type="tel" id="formPhone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="formEmail">Email*</label>
                    <input type="email" id="formEmail" name="email" required>
                </div>
                <div class="form-group">
                    <label for="formAddress">Address</label>
                    <input type="text" id="formAddress" name="address">
                </div>
                <div class="form-group">
                    <label for="formMessage">Message*</label>
                    <textarea id="formMessage" name="message" required></textarea>
                </div>
                <div class="form-group checkbox-group">
                    <input type="checkbox" id="formPrivacy" name="privacy" required>
                    <label for="formPrivacy">Read and accepted the Privacy Policy*</label>
                </div>
                <button type="submit" class="submit-button">Submit</button>
            </form>
        </div>
    </div>


    <?php 
        if (file_exists("inc/news.php")) {
            include "inc/news.php";
        }
    ?>

    <?php 
        if (file_exists("inc/footer.php")) {
            include "inc/footer.php";
        }
    ?>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const openButton = document.getElementById('openSidebarForm');
            const closeButton = document.getElementById('closeSidebarForm');
            const sidebar = document.getElementById('messageSidebar');
            const overlay = document.getElementById('sidebarFormOverlay');

            if (openButton && sidebar && overlay) {
                openButton.addEventListener('click', function (event) {
                    event.preventDefault(); 
                    sidebar.classList.add('open');
                    overlay.style.display = 'block';
                    document.body.style.overflowX = 'hidden'; 
                });
            }

            if (closeButton && sidebar && overlay) {
                closeButton.addEventListener('click', function () {
                    sidebar.classList.remove('open');
                    overlay.style.display = 'none';
                    document.body.style.overflowX = 'auto';
                });
            }
            
            if (overlay) {
                overlay.addEventListener('click', function () {
                    sidebar.classList.remove('open');
                    overlay.style.display = 'none';
                    document.body.style.overflowX = 'auto';
                });
            }
        });
    </script>

</body>
</html>
