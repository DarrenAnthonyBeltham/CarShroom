<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>24-Hour Roadside Assistance - CarShroom</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">
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
            background-color: #f8f9fa;
            color: #212529;
            line-height: 1.7;
        }

        .assistance-hero {
            position: relative;
            height: 60vh;
            min-height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            background: url('assets/roadsideassistance.jpg') no-repeat center center/cover;
        }

        .assistance-hero::before {
            content: '';
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: linear-gradient(to top, rgba(10,10,10,0.8) 0%, rgba(10,10,10,0.4) 100%);
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

        .hero-content .subtitle {
            font-family: 'Oswald', sans-serif;
            font-size: 1.2rem;
            font-weight: 400;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: rgba(255,255,255,0.8);
        }
        
        .hero-content h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(3rem, 8vw, 5.5rem);
            font-weight: 800;
            line-height: 1.1;
            margin: 10px 0 15px 0;
            text-shadow: 0 4px 20px rgba(0,0,0,0.5);
        }

        .hero-content p {
            font-size: clamp(1.1rem, 2.5vw, 1.25rem);
            font-weight: 300;
            max-width: 650px;
            margin: 0 auto;
        }
        
        .assistance-wrapper {
            background-color: #fff;
        }

        .assistance-container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 80px 20px;
        }
        
        .section {
            margin-bottom: 80px;
        }
        .section:last-child {
            margin-bottom: 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }
        .section-title h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.8em;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 15px;
        }
        .section-title p {
            font-size: 1.15em;
            color: #6c757d;
            max-width: 750px;
            margin: 0 auto;
        }
        
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 40px;
            text-align: center;
        }
        
        .service-item {
            padding: 10px;
        }

        .service-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 25px auto;
            background: #2c3e50;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        .service-item:hover .service-icon {
            background: #e74c3c;
            transform: scale(1.1);
        }

        .service-icon svg {
            width: 32px;
            height: 32px;
            stroke: #fff;
        }

        .service-item h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.6em;
            font-weight: 700;
            margin-bottom: 15px;
            color: #343a40;
        }
        
        .service-item p {
            font-size: 1em;
            color: #6c757d;
        }

        .cta-section {
            background: #1a1a1a;
            color: #fff;
            padding: 80px 40px;
            text-align: center;
        }
        .cta-section h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.8em;
            margin-bottom: 15px;
        }
        .cta-section p {
            font-size: 1.15em;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 30px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        .cta-button {
            display: inline-block;
            padding: 16px 40px;
            background-color: #e74c3c;
            color: #fff;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1.1em;
            transition: all 0.3s ease;
        }
        .cta-button:hover {
            background-color: #c0392b;
            transform: scale(1.05);
            box-shadow: 0 8px 25px rgba(231, 76, 60, 0.3);
        }

    </style>
</head>
<body>

    <?php 
        if (file_exists("./inc/navbar.php")) { 
            include "./inc/navbar.php";
        }
    ?>

    <header class="assistance-hero">
        <div class="hero-content">
            <p class="subtitle">24 HOURS A DAY, 7 DAYS A WEEK</p>
            <h1>Roadside Assistance</h1>
            <p>Peace of mind for every journey. Our dedicated team is on standby to provide expert support whenever you need it.</p>
        </div>
    </header>

    <main>
        <div class="assistance-wrapper">
            <div class="assistance-container">
                <section class="commitment-section section">
                    <div class="section-title">
                        <h2>Our Commitment to You</h2>
                        <p>Owning a world-class vehicle should be a world-class experience. That's why our 24-Hour Roadside Assistance program is designed to provide immediate, expert support, ensuring that help is just a phone call away, no matter where your journey takes you.</p>
                    </div>
                </section>

                <section class="services-offered-section section">
                    <div class="section-title">
                        <h2>Covered Services</h2>
                    </div>
                    <div class="services-grid">
                        <div class="service-item">
                            <div class="service-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 22H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v5.5"></path><path d="M16 19h6"></path><path d="M19 16v6"></path><circle cx="8" cy="14" r="1"></circle><path d="M10.44 14.25a.5.5 0 0 0 0 .5h.12a.5.5 0 0 0 .5-.5.5.5 0 0 0-.5-.5h-.12a.5.5 0 0 0 0 .5z"></path><path d="M15 5h2"></path><path d="M19 5h2"></path></svg>
                            </div>
                            <h3>Towing Service</h3>
                            <p>Specialized flatbed towing to the nearest authorized CarShroom service center to ensure your vehicle is handled with the utmost care.</p>
                        </div>
                         <div class="service-item">
                            <div class="service-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 18H3c-1.1 0-2-.9-2-2V8c0-1.1.9-2 2-2h3.19M15 6h2c1.1 0 2 .9 2 2v8c0 1.1-.9 2-2 2h-3.19"></path><path d="M23 13v-2"></path><path d="M1 11v2"></path><path d="M12 6V4"></path><path d="M12 20v-2"></path><path d="M12 12v0"></path></svg>
                            </div>
                            <h3>Battery Assistance</h3>
                            <p>If your vehicle won't start due to a depleted battery, we will arrange for a jump-start to get you back on the road.</p>
                        </div>
                         <div class="service-item">
                            <div class="service-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M12 6v6l4 2"></path></svg>
                            </div>
                            <h3>Flat Tire Change</h3>
                            <p>Our technicians will replace a flat tire with your vehicle's spare, or arrange for a tow if a spare is unavailable.</p>
                        </div>
                    </div>
                </section>
            </div>
            
            <section class="cta-section section">
                <h2>Need Immediate Assistance?</h2>
                <p>Our hotline is available 24/7. Please have your vehicle's VIN and your current location ready.</p>
                <a href="tel:+62215550112" class="cta-button">Call Our Hotline Now</a>
            </section>
        </div>
    </main>

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
