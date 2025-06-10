<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Test Drive - CarShroom</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">
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
            background-color: #f4f6f8;
            color: #212529;
            line-height: 1.7;
        }
        
        main {
            padding-bottom: 80px;
        }
        
        .hero {
            position: relative;
            height: 75vh;
            min-height: 550px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            overflow: hidden;
        }
        #heroVideo {
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -1;
            transform: translateX(-50%) translateY(-50%);
        }
        .hero::before {
            content: '';
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.6);
        }
        .hero-content {
            position: relative;
            z-index: 1;
            padding: 20px;
            animation: fadeIn 1.5s ease-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hero-content h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(3rem, 7vw, 5.5rem);
            font-weight: 800;
            line-height: 1.1;
            margin: 0 0 15px 0;
            text-shadow: 0 4px 20px rgba(0,0,0,0.5);
        }
        .hero-content p {
            font-size: clamp(1rem, 2.5vw, 1.25rem);
            font-weight: 300;
            max-width: 600px;
            margin: 0 auto;
        }

        .booking-container {
            max-width: 900px;
            margin: -100px auto 0 auto;
            position: relative;
            z-index: 2;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 15px 50px rgba(0,0,0,0.15);
            padding: 40px;
        }
        
        .form-step {
            display: none;
        }
        .form-step.active {
            display: block;
            animation: fadeInStep 0.5s ease-in-out;
        }
        
        @keyframes fadeInStep {
             from { opacity: 0; }
             to { opacity: 1; }
        }

        .step-title {
            font-family: 'Playfair Display', serif;
            font-size: 2em;
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
        }

        .car-selection-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .car-card {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 15px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .car-card.selected {
            border-color: #3498db;
            box-shadow: 0 0 0 4px rgba(52, 152, 219, 0.2);
            transform: translateY(-5px);
        }
        .car-card img {
            width: 100%;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 10px;
        }
        .car-card h3 {
            font-size: 1.1em;
            color: #34495e;
            margin: 0;
        }
        
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }
        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: #495057;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid #ced4da;
            border-radius: 8px;
            font-size: 1em;
            font-family: 'Inter', sans-serif;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
            -webkit-appearance: none; 
            -moz-appearance: none;
            appearance: none;
        }
        .form-group select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 16px 12px;
        }
        .form-group input:focus, .form-group select:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        }

        .form-navigation {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 50px;
            gap: 20px;
        }
        
        .form-btn {
            position: relative;
            padding: 18px 40px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            font-size: 1.1em;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            min-width: 140px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            overflow: hidden;
        }
        
        .form-btn:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .form-btn:hover:before {
            left: 100%;
        }
        
        .btn-prev {
            background: linear-gradient(135deg, #ecf0f1 0%, #d5dbdb 100%);
            color: #2c3e50;
            border: 2px solid #bdc3c7;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        
        .btn-next, .btn-submit {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            color: white;
            border: 2px solid #3498db;
            box-shadow: 0 4px 20px rgba(52, 152, 219, 0.3);
        }
        
        .btn-prev:hover { 
            background: linear-gradient(135deg, #d5dbdb 0%, #bdc3c7 100%);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            border-color: #95a5a6;
        }
        
        .btn-next:hover, .btn-submit:hover { 
            background: linear-gradient(135deg, #2980b9 0%, #1f618d 100%);
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(52, 152, 219, 0.4);
            border-color: #2980b9;
        }
        
        .btn-prev:active, .btn-next:active, .btn-submit:active {
            transform: translateY(-1px);
            transition: all 0.1s ease;
        }
        
        /* Special styling for single button navigation */
        .form-navigation.single-button {
            justify-content: center;
        }
        
        .form-navigation.single-button .form-btn {
            min-width: 200px;
            padding: 20px 50px;
            font-size: 1.2em;
        }
        
        #confirmationMessage {
            text-align: center;
            padding: 30px;
        }
        #confirmationMessage h2 {
            font-family: 'Playfair Display', serif;
            color: #27ae60;
        }

        .validation-popup-overlay {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
            z-index: 3000;
            display: none;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .validation-popup-overlay.visible {
            display: flex;
            opacity: 1;
        }
        .validation-popup {
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            text-align: center;
            max-width: 400px;
            width: 90%;
            transform: scale(0.9);
            opacity: 0;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        .validation-popup-overlay.visible .validation-popup {
            transform: scale(1);
            opacity: 1;
        }
        .validation-popup .icon {
            font-size: 40px;
            color: #e74c3c;
            margin-bottom: 15px;
        }
        .validation-popup p {
            font-size: 1.1em;
            color: #333;
            margin-bottom: 25px;
        }
        .validation-popup .btn-ok {
            width: 100%;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            background-color: #e74c3c;
            color: white;
            font-size: 1em;
            font-weight: 600;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .booking-container {
                margin-top: -80px;
                padding: 30px;
            }
            
            .form-btn {
                padding: 16px 30px;
                font-size: 1em;
                min-width: 120px;
            }
        }
        
        @media (max-width: 480px) {
            .form-navigation { 
                flex-direction: column;
                gap: 15px;
                align-items: stretch; 
            }
            
            .form-btn {
                width: 100%;
                padding: 18px 25px;
                font-size: 1.1em;
                min-width: unset;
            }
            
            .form-navigation.single-button .form-btn {
                width: 100%;
                padding: 20px 25px;
            }
            
            .btn-prev {
                order: 2;
                background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
                color: #6c757d;
                border: 2px solid #dee2e6;
                box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            }
            
            .btn-prev:hover {
                background: linear-gradient(135deg, #e9ecef 0%, #dee2e6 100%);
                color: #495057;
            }
            
            .btn-next, .btn-submit {
                order: 1;
            }
        }

    </style>
</head>
<body>

    <header class="hero">
        <video autoplay muted loop playsinline id="heroVideo">
            <source src="assets/testdrivevid.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="hero-content">
            <h1>Experience Excellence</h1>
            <p>Your journey behind the wheel of the extraordinary begins here. Schedule your private test drive today.</p>
        </div>
    </header>

    <main>
        <div class="booking-container">
            <form id="testDriveForm" novalidate>
                <div id="step1" class="form-step active">
                    <h2 class="step-title">1. Select Your Vehicle</h2>
                    <div class="car-selection-grid">
                        <div class="car-card" data-car-name="Hennessey Venom F5">
                            <img src="assets/venomf5.jpg" alt="Hennessey Venom F5">
                            <h3>Hennessey Venom F5</h3>
                        </div>
                        <div class="car-card" data-car-name="Ferrari LaFerrari">
                            <img src="assets/laferrari.jpg" alt="Ferrari LaFerrari">
                            <h3>Ferrari LaFerrari</h3>
                        </div>
                        <div class="car-card" data-car-name="Aston Martin Valkyrie">
                            <img src="assets/Aston Martin Valkyrie.webp" alt="Aston Martin Valkyrie">
                            <h3>Aston Martin Valkyrie</h3>
                        </div>
                        <div class="car-card" data-car-name="Mercedes-AMG G 63">
                            <img src="assets/AMG GT 63 Pro.jpeg" alt="Mercedes-AMG G 63">
                            <h3>Mercedes-AMG G 63</h3>
                        </div>
                    </div>
                    <div class="form-navigation single-button">
                        <button type="button" class="form-btn btn-next" onclick="nextStep(2)">Next Step</button>
                    </div>
                </div>

                <div id="step2" class="form-step">
                    <h2 class="step-title">2. Choose Location & Time</h2>
                    <div class="form-group">
                        <label for="dealer">Dealership Location</label>
                        <select id="dealer" name="dealer" required>
                            <option value="">Select a Dealer</option>
                            <option value="CarShroom Jakarta Central">CarShroom Jakarta Central</option>
                            <option value="CarShroom Surabaya Prestige">CarShroom Surabaya Prestige</option>
                            <option value="CarShroom Bali Showroom">CarShroom Bali Showroom</option>
                            <option value="CarShroom Bandung Heights">CarShroom Bandung Heights</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date">Preferred Date</label>
                        <input type="date" id="date" name="date" required>
                    </div>
                     <div class="form-group">
                        <label for="time">Preferred Time</label>
                        <select id="time" name="time" required>
                             <option value="">Select a Time Slot</option>
                             <option value="10:00">10:00 AM</option>
                             <option value="11:00">11:00 AM</option>
                             <option value="13:00">01:00 PM</option>
                             <option value="14:00">02:00 PM</option>
                             <option value="15:00">03:00 PM</option>
                        </select>
                    </div>
                    <div class="form-navigation">
                        <button type="button" class="form-btn btn-prev" onclick="prevStep(1)">Previous</button>
                        <button type="button" class="form-btn btn-next" onclick="nextStep(3)">Next Step</button>
                    </div>
                </div>

                <div id="step3" class="form-step">
                    <h2 class="step-title">3. Your Information</h2>
                    <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <input type="text" id="fullName" name="fullName" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                     <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>
                    <div class="form-navigation">
                        <button type="button" class="form-btn btn-prev" onclick="prevStep(2)">Previous</button>
                        <button type="submit" class="form-btn btn-submit">Request Test Drive</button>
                    </div>
                </div>

                <div id="step4" class="form-step">
                    <div id="confirmationMessage"></div>
                </div>
            </form>
        </div>
    </main>

    <div id="validationPopupOverlay" class="validation-popup-overlay">
        <div class="validation-popup">
            <div class="icon">&#9888;</div>
            <p id="validationPopupMessage"></p>
            <button id="validationPopupCloseBtn" class="btn-submit btn-ok">OK</button>
        </div>
    </div>

    <script>
        let currentStep = 1;
        let selectedCar = '';
        const form = document.getElementById('testDriveForm');
        const validationPopupOverlay = document.getElementById('validationPopupOverlay');
        const validationPopupMessageEl = document.getElementById('validationPopupMessage');
        const validationPopupCloseBtn = document.getElementById('validationPopupCloseBtn');

        const today = new Date().toISOString().split('T')[0];
        document.getElementById('date').setAttribute('min', today);

        function showValidationPopup(message) {
            validationPopupMessageEl.textContent = message;
            validationPopupOverlay.classList.add('visible');
        }

        function hideValidationPopup() {
            validationPopupOverlay.classList.remove('visible');
        }
        
        validationPopupCloseBtn.addEventListener('click', hideValidationPopup);
        validationPopupOverlay.addEventListener('click', function(e) {
            if (e.target === this) {
                hideValidationPopup();
            }
        });

        document.querySelectorAll('.car-card').forEach(card => {
            card.addEventListener('click', () => {
                document.querySelectorAll('.car-card').forEach(c => c.classList.remove('selected'));
                card.classList.add('selected');
                selectedCar = card.dataset.carName;
            });
        });

        function showStep(step) {
            document.querySelectorAll('.form-step').forEach(el => el.classList.remove('active'));
            document.getElementById(`step${step}`).classList.add('active');
        }
        
        function validateStep(stepNumber) {
            if (stepNumber === 1) {
                if (!selectedCar) {
                    showValidationPopup('Please select a vehicle to continue.');
                    return false;
                }
            }
            if (stepNumber === 2) {
                const dealer = document.getElementById('dealer').value;
                const date = document.getElementById('date').value;
                const time = document.getElementById('time').value;
                if (!dealer || !date || !time) {
                     showValidationPopup('Please select a location, date, and time.');
                     return false;
                }
            }
            return true;
        }

        function nextStep(step) {
            if (!validateStep(currentStep)) return;
            currentStep = step;
            showStep(currentStep);
        }

        function prevStep(step) {
            currentStep = step;
            showStep(currentStep);
        }

        form.addEventListener('submit', function(e) {
            e.preventDefault();
            if (this.checkValidity()) {
                const formData = new FormData(this);
                const confirmationMessageEl = document.getElementById('confirmationMessage');

                confirmationMessageEl.innerHTML = `
                    <h2>Booking Confirmed!</h2>
                    <p>Thank you, <strong>${formData.get('fullName')}</strong>.</p>
                    <p>Your test drive for the <strong>${selectedCar}</strong> has been requested for <strong>${formData.get('date')} at ${formData.get('time')}</strong> at our <strong>${formData.get('dealer')}</strong> location.</p>
                    <p>Our team will contact you shortly via email or phone to confirm the final details.</p>
                `;
                nextStep(4);
            } else {
                 showValidationPopup('Please fill out all required personal information.');
                 this.querySelector(':invalid').focus();
            }
        });
    </script>

    <?php 
        if (file_exists("./inc/news.php")) { 
            include "./inc/news.php";
        }
    ?>
    <?php 
        if (file_exists("./inc/footer.php")) { 
            include "./inc/footer.php";
        }
    ?>
    
</body>
</html>