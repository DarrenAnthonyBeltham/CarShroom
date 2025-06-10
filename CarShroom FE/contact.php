<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - CarShroom</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        html {
            box-sizing: border-box;
            scroll-behavior: smooth;
        }
        *, *:before, *:after {
            box-sizing: inherit;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            background-color: #f8f9fa;
            color: #212529;
            line-height: 1.7;
            overflow-x: hidden;
        }

        main {
            padding-bottom: 80px;
        }
        
        .contact-hero {
            height: 65vh;
            min-height: 500px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
            background: url('./assets/Contact Us.jpg') no-repeat center center/cover;
        }
        .contact-hero::before {
            content: '';
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6));
        }
        .hero-content {
            position: relative;
            z-index: 1;
        }
        .hero-content h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(3rem, 7vw, 5rem);
            font-weight: 700;
            margin: 0;
            text-shadow: 0 4px 15px rgba(0,0,0,0.5);
        }

        .contact-wrapper {
            max-width: 1200px;
            margin: -80px auto 0 auto;
            position: relative;
            z-index: 2;
            padding: 0 20px;
        }
        
        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .contact-card {
            background: #fff;
            border-radius: 12px;
            padding: 35px 40px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            text-align: center;
        }
        .contact-card .icon {
            width: 50px;
            height: 50px;
            margin: 0 auto 20px auto;
            background-color: #e74c3c;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .contact-card .icon svg {
            width: 24px;
            height: 24px;
        }
        .contact-card h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.8em;
            color: #2c3e50;
            margin-bottom: 15px;
        }
        .contact-card p {
            color: #6c757d;
            font-size: 1em;
            margin-bottom: 20px;
        }
        .contact-card a.contact-link {
            font-size: 1.1em;
            font-weight: 500;
            color: #3498db;
            text-decoration: none;
            display: block;
            transition: color 0.2s ease;
        }
        .contact-card a.contact-link:hover {
            color: #2980b9;
        }
        
        .contact-button {
            padding: 12px 28px;
            background: #34495e;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1em;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .contact-button:hover {
            background: #2c3e50;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        }
        
        .sidebar-form-overlay {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background-color: rgba(0,0,0,0.5);
            z-index: 1999; 
            display: none; 
        }
        .sidebar-form {
            height: 100%; width: 0; position: fixed; z-index: 2000;
            top: 0; right: 0; background-color: #ffffff; overflow-x: hidden;
            transition: 0.5s; padding-top: 60px; box-shadow: -5px 0 15px rgba(0,0,0,0.2);
        }
        .sidebar-form.open { width: 400px; }
        .sidebar-form-content { padding: 20px 30px; height: 100%; overflow-y: auto; }
        .sidebar-form .close-btn { position: absolute; top: 15px; right: 25px; font-size: 36px; text-decoration: none; color: #888; }
        .sidebar-form h3 { font-family: 'Space Mono', monospace; font-size: 1.6em; margin-bottom: 25px; }
        .sidebar-form .form-group { margin-bottom: 20px; position: relative; } 
        .sidebar-form label { display: block; margin-bottom: 6px; font-size: 0.9em; color: #555; }
        .sidebar-form input, .sidebar-form select, .sidebar-form textarea { width: 100%; padding: 10px 12px; border: 1px solid #ddd; border-radius: 4px; font-family: 'Inter', sans-serif; font-size: 0.95em; }
        .sidebar-form select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 16px 12px;
        }
        .sidebar-form textarea { min-height: 120px; resize: vertical; }
        .sidebar-form input.invalid, .sidebar-form textarea.invalid { border-color: #e74c3c; } 
        
        .validation-message {
            position: absolute;
            bottom: 100%;
            left: 0;
            background-color: #e74c3c;
            color: white;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 0.85em;
            font-weight: 500;
            margin-bottom: 5px;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all 0.3s ease;
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        }
        .validation-message::after { 
            content: '';
            position: absolute;
            top: 100%;
            left: 15px;
            border-width: 5px;
            border-style: solid;
            border-color: #e74c3c transparent transparent transparent;
        }
        .validation-message.visible {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .sidebar-form .checkbox-group { 
            display: flex; 
            align-items: center; 
            margin-top: 5px; 
        }
        .sidebar-form .checkbox-group input { 
            width: auto; 
            margin-right: 10px; 
            flex-shrink: 0; 
        }
        .sidebar-form .checkbox-group label {
            margin-bottom: 0; 
            line-height: 1.2; 
        }

        .sidebar-form .submit-button { background-color: #34495e; color: white; padding: 12px 20px; border: none; border-radius: 5px; cursor: pointer; width: 100%; font-size: 1em; }
        .sidebar-form .submit-button:hover { background-color: #2c3e50; }

        @media (max-width: 992px) {
            .contact-grid {
                grid-template-columns: 1fr;
            }
        }
        @media (max-width: 480px) {
            .sidebar-form.open { width: 100%; }
        }

    </style>
</head>
<body>
    <?php 
        if (file_exists("inc/navbar.php")) {
            include "inc/navbar.php";
        }
    ?>

    <header class="contact-hero">
        <div class="hero-content">
            <h1>Get in Touch</h1>
            <p>Our team is ready to provide you with a world-class experience.</p>
        </div>
    </header>

    <main>
        <div class="contact-wrapper">
            <div class="contact-grid">
                <div class="contact-card">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    </div>
                    <h2>Make a Call</h2>
                    <p>Our dedicated sales and support team is available during business hours to answer any questions.</p>
                    <a href="tel:+62215550101" class="contact-link">+62 21 555 0101</a>
                </div>
                <div class="contact-card">
                     <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                    </div>
                    <h2>Send a Message</h2>
                    <p>For inquiries, press, or customer care, please click below to send us a detailed message.</p>
                    <button type="button" class="contact-button" id="openSidebarForm">Send A Message</button>
                </div>
            </div>
        </section>
    </main>

    <div class="sidebar-form-overlay" id="sidebarFormOverlay"></div>
    <div id="messageSidebar" class="sidebar-form">
        <div class="sidebar-form-content">
            <a href="javascript:void(0)" class="close-btn" id="closeSidebarForm">&times;</a>
            <h3>Send Us A Message</h3>
            <form id="contactForm" action="#" method="POST" novalidate>
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
                    <label for="formService">Service Type</label>
                    <select id="formService" name="service">
                        <option value="">Select a service (optional)</option>
                        <option value="Annual Maintenance">Annual Maintenance</option>
                        <option value="Performance Tuning">Performance Tuning</option>
                        <option value="Detailing & Restoration">Detailing & Restoration</option>
                        <option value="Other">Other Inquiry</option>
                    </select>
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
            const contactForm = document.getElementById('contactForm');

            if (openButton && sidebar && overlay) {
                openButton.addEventListener('click', function (event) {
                    event.preventDefault(); 
                    sidebar.classList.add('open');
                    overlay.style.display = 'block';
                    document.body.style.overflow = 'hidden'; 
                });
            }

            function closeSidebar() {
                sidebar.classList.remove('open');
                overlay.style.display = 'none';
                document.body.style.overflow = 'auto';
            }

            if (closeButton && sidebar && overlay) {
                closeButton.addEventListener('click', closeSidebar);
            }
            
            if (overlay) {
                overlay.addEventListener('click', closeSidebar);
            }
            
            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape' && sidebar.classList.contains('open')) {
                    closeSidebar();
                }
            });

            if (contactForm) {
                contactForm.querySelectorAll('[required]').forEach(input => {
                    const validationMessage = document.createElement('div');
                    validationMessage.className = 'validation-message';
                    input.parentElement.appendChild(validationMessage);
                    
                    input.addEventListener('invalid', function(event) {
                        event.preventDefault(); 
                        this.classList.add('invalid');
                        validationMessage.textContent = this.validationMessage;
                        validationMessage.classList.add('visible');
                    });
                    
                    input.addEventListener('input', function(event) {
                        if (this.validity.valid) {
                            this.classList.remove('invalid');
                            validationMessage.classList.remove('visible');
                        }
                    });
                });

                contactForm.addEventListener('submit', function(event) {
                    if (!this.checkValidity()) {
                        event.preventDefault();
                        this.querySelector('.invalid, :invalid').focus();
                    } else {
                        alert('Form submitted successfully!');
                    }
                });
            }
        });
    </script>

</body>
</html>
