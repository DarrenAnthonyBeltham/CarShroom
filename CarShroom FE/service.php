<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Service - CarShroom</title>
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
            background-color: #ffffff;
            color: #212529;
            line-height: 1.7;
        }
        
        main {
            padding-bottom: 80px;
        }

        .service-hero {
            position: relative;
            height: 70vh;
            min-height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            background: url('assets/servicecar.jpg') no-repeat center center/cover;
        }

        .service-hero::before {
            content: '';
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: linear-gradient(to top, rgba(10,10,10,0.8) 0%, transparent 100%);
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

        .service-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 80px 20px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }
        .section-title h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.8em;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 10px;
        }
        .section-title p {
            font-size: 1.15em;
            color: #6c757d;
            max-width: 750px;
            margin: 0 auto;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .service-card {
            background: #fff;
            border: 1px solid #e9ecef;
            border-radius: 16px;
            padding: 35px;
            text-align: center;
            transition: all 0.3s ease;
        }
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
            border-color: transparent;
        }

        .service-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 25px auto;
            background: #2c3e50;
            color: #fff;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .service-icon svg {
            width: 30px;
            height: 30px;
        }
        
        .service-card h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.5em;
            color: #2c3e50;
            margin-bottom: 15px;
        }

        .service-card p {
            color: #6c757d;
            margin-bottom: 25px;
        }
        
        .service-card .cta-button {
            display: inline-block;
            padding: 12px 28px;
            background-color: #34495e;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.2s ease;
        }
        .service-card .cta-button:hover {
            background-color: #2c3e50;
            box-shadow: 0 5px 15px rgba(52, 73, 94, 0.2);
        }
    </style>
</head>
<body>

    <?php 
        if (file_exists("./inc/navbar.php")) { 
            include "./inc/navbar.php";
        }

        $services = [
            [
                'title' => 'Annual Maintenance',
                'description' => 'Comprehensive check-ups, fluid replacements, and diagnostics to keep your vehicle in peak condition.',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>'
            ],
            [
                'title' => 'Performance Tuning',
                'description' => 'Unlock your vehicle\'s true potential with our expert ECU tuning and performance part installation.',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>'
            ],
            [
                'title' => 'Detailing & Restoration',
                'description' => 'Meticulous interior and exterior detailing, paint correction, and restoration services to restore showroom shine.',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path></svg>'
            ]
        ];
    ?>

    <header class="service-hero">
        <div class="hero-content">
            <h1>Unmatched Service</h1>
            <p>Trust your masterpiece to the certified technicians who know it best. Precision care for performance vehicles.</p>
        </div>
    </header>

    <main>
        <div class="service-container">
            <div class="section-title">
                <h2>Our Services</h2>
                <p>We provide a comprehensive range of services designed to maintain and enhance the performance, aesthetics, and value of your luxury vehicle. From routine maintenance to complete restorations, our state-of-the-art facility is equipped to handle all your needs.</p>
            </div>

            <div class="services-grid">
                <?php foreach ($services as $service): ?>
                    <div class="service-card">
                        <div class="service-icon"><?php echo $service['icon']; ?></div>
                        <h3><?php echo htmlspecialchars($service['title']); ?></h3>
                        <p><?php echo htmlspecialchars($service['description']); ?></p>
                        <a href="contact.php" class="cta-button">Book Now</a>
                    </div>
                <?php endforeach; ?>
            </div>
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
