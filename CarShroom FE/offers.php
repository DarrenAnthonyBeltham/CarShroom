<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Current Vehicle Offers - CarShroom</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">
    <style>
        html {
            box-sizing: border-box;
        }
        *, *:before, *:after {
            box-sizing: inherit;
        }

        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            background-color: #0a0a0a;
            color: #fff;
            line-height: 1.7;
        }

        .offers-hero {
            position: relative;
            height: 60vh;
            min-height: 450px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 20px;
            background: url('category/assets/hypercars/mclarenspeedtail.webp') no-repeat center center/cover;
        }

        .offers-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.7));
        }

        .hero-content {
            position: relative;
            z-index: 1;
            animation: fadeIn 1.5s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hero-content h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.8rem, 7vw, 5rem);
            font-weight: 800;
            margin: 0 0 10px 0;
            text-shadow: 0 4px 15px rgba(0,0,0,0.5);
        }

        .hero-content p {
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto;
            font-weight: 300;
            color: rgba(255,255,255,0.9);
        }

        .offers-container {
            max-width: 1300px;
            margin: 0 auto;
            padding: 80px 20px;
        }

        .offer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
            gap: 30px;
        }
        
        .offer-card {
            background: #1a1a1a;
            border-radius: 16px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            text-decoration: none;
            color: #fff;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            transition: all 0.3s ease;
        }
        .offer-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.4);
        }

        .offer-image {
            height: 240px;
            overflow: hidden;
        }
        .offer-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }
        .offer-card:hover .offer-image img {
            transform: scale(1.05);
        }

        .offer-content {
            padding: 25px 30px 30px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        
        .offer-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.6em;
            font-weight: 700;
            color: #e74c3c;
            margin: 0 0 10px 0;
        }
        
        .offer-car-name {
            font-size: 1.25em;
            font-weight: 600;
            margin: 0 0 15px 0;
        }

        .offer-details {
            font-size: 1em;
            color: #b0b0b0;
            margin-bottom: 25px;
            flex-grow: 1;
        }

        .offer-cta {
            margin-top: auto;
        }
        
        .cta-button {
            display: inline-block;
            padding: 12px 28px;
            background-color: #e74c3c;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.2s ease;
            cursor: pointer;
        }
        .cta-button:hover {
            background-color: #c0392b;
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.2);
            transform: translateY(-2px);
        }

        .offer-modal-overlay {
            position: fixed;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(8px);
            z-index: 1000;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .offer-modal-overlay.visible {
            display: flex;
            opacity: 1;
        }
        .offer-modal-content {
            background: #1f1f1f; 
            color: #fff;
            border-radius: 16px;
            padding: 35px;
            width: 100%;
            max-width: 500px;
            position: relative;
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
            transform: scale(0.9);
            transition: transform 0.3s ease;
        }
        .offer-modal-overlay.visible .offer-modal-content {
            transform: scale(1);
        }
        .offer-modal-close {
            position: absolute;
            top: 15px;
            right: 15px;
            background: none;
            border: none;
            font-size: 30px;
            color: #aaa;
            cursor: pointer;
            transition: color 0.2s ease;
        }
        .offer-modal-close:hover {
            color: #fff;
        }
        #modalOfferTitle {
            font-family: 'Playfair Display', serif;
            color: #e74c3c;
            font-size: 2em;
            margin-bottom: 10px;
        }
        #modalOfferCarName {
            font-size: 1.4em;
            font-weight: 600;
            margin-bottom: 20px;
        }
        #modalOfferDetails {
            color: #b0b0b0;
            margin-bottom: 30px;
        }
        .modal-cta-button {
            padding: 14px 30px;
            font-size: 1.1em;
            width: 100%;
        }

        #inquiryForm {
            margin-top: 20px;
        }
        .modal-form-group {
            margin-bottom: 15px;
        }
        .modal-form-group input {
            width: 100%;
            padding: 12px;
            background-color: #333;
            border: 1px solid #555;
            border-radius: 8px;
            color: #fff;
            font-size: 1em;
        }
        .modal-form-group input::placeholder {
            color: #888;
        }
        .modal-form-group input:focus {
            outline: none;
            border-color: #e74c3c;
        }

        #inquiryConfirmation {
            display: none;
            text-align: center;
            animation: fadeInUp 0.5s ease-out;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        #inquiryConfirmation h3 {
            color: #2ecc71;
            font-size: 1.8em;
            margin-bottom: 15px;
            font-family: 'Playfair Display', serif;
        }
        #inquiryConfirmation p {
            color: #b0b0b0;
            font-size: 1.1em;
            line-height: 1.6;
        }

        .success-checkmark {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: #2ecc71;
            margin: 0 auto 20px;
            position: relative;
            animation: scaleIn 0.5s ease-out 0.2s both;
        }
        
        .success-checkmark::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 24px;
            font-weight: bold;
        }
        
        @keyframes scaleIn {
            from {
                transform: scale(0);
            }
            to {
                transform: scale(1);
            }
        }

        @media (max-width: 480px) {
            .offer-grid {
                grid-template-columns: 1fr;
            }
            .offer-modal-content {
                padding: 25px;
            }
        }
    </style>
</head>
<body>

    <?php 
        if (file_exists("./inc/navbar.php")) { 
            include "./inc/navbar.php";
        }
        
        $vehicle_offers = [
            [
                'title' => 'Special Financing Offer',
                'car_name' => 'Ferrari F8 Tributo',
                'details' => 'Experience the thrill of Italian engineering with an exclusive 1.9% APR financing rate for 36 months for qualified buyers.',
                'image' => 'category/assets/supercars/FerrariF8Tributo.webp',
                'link' => 'contact.php'
            ],
            [
                'title' => 'Complimentary Performance Package',
                'car_name' => 'Mercedes-AMG G 63',
                'details' => 'For a limited time, receive a complimentary Performance Package, including sport exhaust and carbon fiber trim, with your purchase.',
                'image' => 'assets/AMG GT 63 Pro.jpeg',
                'link' => '#'
            ],
            [
                'title' => 'Exclusive Nardo Gray Edition',
                'car_name' => 'Porsche 911 Turbo S',
                'details' => 'Secure one of only fifty units available worldwide in this stunning, limited-run Nardo Gray paint-to-sample color.',
                'image' => 'category/assets/supercars/Porsche911TurboS.webp',
                'link' => '#'
            ],
        ];
    ?>

    <header class="offers-hero">
        <div class="hero-content">
            <h1>Current Vehicle Offers</h1>
            <p>Exclusive opportunities to own the vehicle you've always dreamed of. Explore our limited-time offers today.</p>
        </div>
    </header>

    <main>
        <div class="offers-container">
            <div class="offer-grid">
                <?php foreach ($vehicle_offers as $offer): ?>
                    <div class="offer-card">
                        <div class="offer-image">
                            <img src="<?php echo htmlspecialchars($offer['image']); ?>" alt="<?php echo htmlspecialchars($offer['car_name']); ?>" onerror="this.onerror=null;this.src='https://placehold.co/600x400/cccccc/333333?text=Image+Not+Found';">
                        </div>
                        <div class="offer-content">
                            <h3 class="offer-title"><?php echo htmlspecialchars($offer['title']); ?></h3>
                            <p class="offer-car-name"><?php echo htmlspecialchars($offer['car_name']); ?></p>
                            <p class="offer-details"><?php echo htmlspecialchars($offer['details']); ?></p>
                            <div class="offer-cta">
                                <span class="cta-button" data-link="<?php echo htmlspecialchars($offer['link']); ?>">View Details</span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

    <div id="offerModal" class="offer-modal-overlay">
        <div class="offer-modal-content">
            <button id="offerModalClose" class="offer-modal-close">&times;</button>
            <div id="inquiryContent">
                <h2 id="modalOfferTitle"></h2>
                <p id="modalOfferCarName"></p>
                <p id="modalOfferDetails"></p>
                <form id="inquiryForm">
                    <div class="modal-form-group">
                        <input type="text" name="name" placeholder="Your Name*" required>
                    </div>
                    <div class="modal-form-group">
                        <input type="email" name="email" placeholder="Your Email*" required>
                    </div>
                    <button type="submit" class="cta-button modal-cta-button">Submit Inquiry</button>
                </form>
            </div>
            <div id="inquiryConfirmation">
                <div class="success-checkmark"></div>
                <h3>Thank You!</h3>
                <p>Your inquiry has been sent. Our team will be in touch with you shortly.</p>
            </div>
        </div>
    </div>

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

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('offerModal');
        const modalCloseBtn = document.getElementById('offerModalClose');
        const modalTitle = document.getElementById('modalOfferTitle');
        const modalCarName = document.getElementById('modalOfferCarName');
        const modalDetails = document.getElementById('modalOfferDetails');
        const offerButtons = document.querySelectorAll('.offer-card .cta-button');
        
        const inquiryContent = document.getElementById('inquiryContent');
        const inquiryConfirmation = document.getElementById('inquiryConfirmation');
        const inquiryForm = document.getElementById('inquiryForm');
        
        function showModal(title, carName, details, link) {
            inquiryContent.style.display = 'block';
            inquiryConfirmation.style.display = 'none';
            inquiryForm.reset();

            modalTitle.textContent = title;
            modalCarName.textContent = carName;
            modalDetails.textContent = details;
            
            modal.classList.add('visible');
        }

        function hideModal() {
            modal.classList.remove('visible');
        }

        offerButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const card = this.closest('.offer-card');
                const title = card.querySelector('.offer-title').textContent;
                const carName = card.querySelector('.offer-car-name').textContent;
                const details = card.querySelector('.offer-details').textContent;
                const link = this.dataset.link;
                showModal(title, carName, details, link);
            });
        });

        inquiryForm.addEventListener('submit', function(e) {
            e.preventDefault();
            inquiryContent.style.display = 'none';
            inquiryConfirmation.style.display = 'block';

            setTimeout(() => {
                hideModal();
            }, 3000); 
        });

        modalCloseBtn.addEventListener('click', hideModal);
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                hideModal();
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && modal.classList.contains('visible')) {
                hideModal();
            }
        });
    });
    </script>
</body>
</html>
