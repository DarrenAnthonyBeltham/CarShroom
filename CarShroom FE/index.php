<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarShroom - The Pinnacle of Automotive Luxury</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Oswald:wght@700&display=swap" rel="stylesheet">
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
            background-color: #0a0a0a;
            color: #fff;
            overflow-x: hidden;
        }
        main {
            width: 100%;
        }
        .hero-section {
            height: 100vh;
            position: relative;
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
        .hero-section::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.6);
        }
        .hero-content {
            z-index: 1;
            padding: 20px;
            animation: fadeInHero 2s ease-out;
        }
        .hero-content h1 {
            font-family: 'Oswald', sans-serif;
            font-size: clamp(3rem, 10vw, 7rem);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin: 0;
            line-height: 1.1;
            text-shadow: 0 5px 20px rgba(0,0,0,0.5);
        }
        .hero-content p {
            font-size: clamp(1rem, 3vw, 1.3rem);
            max-width: 600px;
            margin: 20px auto 30px;
            font-weight: 300;
        }
        .hero-button {
            display: inline-block;
            padding: 14px 32px;
            border: 2px solid #fff;
            border-radius: 50px;
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .hero-button:hover {
            background-color: #fff;
            color: #000;
        }
        
        .section {
            padding: 80px 20px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }
        .section-title h2 {
            font-family: 'Oswald', sans-serif;
            font-size: clamp(2rem, 5vw, 3rem);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }
        .section-title p {
            font-size: 1.1rem;
            color: #a0a0a0;
            max-width: 700px;
            margin: 0 auto;
        }
        
        .category-grid {
            max-width: 1300px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }
        .category-card {
            position: relative;
            height: 350px;
            border-radius: 12px;
            overflow: hidden;
            display: flex;
            align-items: flex-end;
            padding: 20px;
            text-decoration: none;
            color: white;
            transition: transform 0.3s ease;
        }
        .category-card:hover {
            transform: translateY(-10px);
        }
        .category-card-bg {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background-size: cover;
            background-position: center;
            transition: transform 0.5s ease;
        }
        .category-card:hover .category-card-bg {
            transform: scale(1.05);
        }
        .category-card::after {
            content: '';
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, transparent 60%);
        }
        .category-card-content {
            position: relative;
            z-index: 2;
        }
        .category-card-content h3 {
            font-family: 'Oswald', sans-serif;
            font-size: 1.8rem;
            text-transform: uppercase;
        }
        .category-card-content p {
            font-size: 0.9rem;
            font-weight: 300;
        }

        .cta-section {
            background-color: #111;
        }

        @keyframes fadeInHero {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

    </style>
</head>
<body>
    <?php 
        if (file_exists("./inc/navbar.php")) { 
            include "./inc/navbar.php";
        }
    ?>

    <main>
        <section class="hero-section">
            <video autoplay muted loop playsinline id="heroVideo">
                <source src="assets/carsvideo.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="hero-content">
                <h1>The Apex of Automotive</h1>
                <p>Curated collections of the world's most desired vehicles, from iconic muscle cars to boundary-pushing hypercars.</p>
                <a href="#featured-cars-section" class="hero-button">Explore Collections</a>
            </div>
        </section>

        <section class="section" id="featured-cars-section">
            <div class="section-title">
                <h2>Our Collections</h2>
                <p>Four distinct categories, each representing the pinnacle of its class. Discover the vehicle that defines you.</p>
            </div>
            <div class="category-grid">
                <a href="category/hypercars.php" class="category-card">
                    <div class="category-card-bg" style="background-image: url('assets/venomf5.jpg');"></div>
                    <div class="category-card-content">
                        <h3>Hypercars</h3>
                        <p>Where ultimate performance meets automotive art.</p>
                    </div>
                </a>
                <a href="category/supercars.php" class="category-card">
                    <div class="category-card-bg" style="background-image: url('assets/Chevrolet Corvette.jpg');"></div>
                    <div class="category-card-content">
                        <h3>Supercars</h3>
                        <p>Exhilarating speed and breathtaking aesthetics.</p>
                    </div>
                </a>
                <a href="category/suv.php" class="category-card">
                     <div class="category-card-bg" style="background-image: url('assets/1-Mercedes-G-Class-review.jpg');"></div>
                    <div class="category-card-content">
                        <h3>SUVs</h3>
                        <p>Uncompromised luxury and commanding presence.</p>
                    </div>
                </a>
                <a href="category/musclecars.php" class="category-card">
                     <div class="category-card-bg" style="background-image: url('assets/Dodge-Challenger-Srt.jpg');"></div>
                    <div class="category-card-content">
                        <h3>Muscle Cars</h3>
                        <p>Iconic American power and timeless design.</p>
                    </div>
                </a>
            </div>
        </section>

        <section class="section cta-section">
             <div class="section-title">
                <h2>In-House Technology</h2>
                <p>Beyond the chassis. Explore our bespoke performance parts and aesthetic enhancements to create a vehicle that is truly yours.</p>
                 <a href="technology.php" class="hero-button" style="margin-top:30px;">Discover Our Solutions</a>
            </div>
        </section>

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
