<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - CarShroom</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
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
            font-family: 'Space Mono', monospace;
            background-color: #ffffff;
            color: #333333;
            line-height: 1.7;
            display: flex;
            flex-direction: column;
            min-height: 100vh; 
        }

        main { 
            flex-grow: 1;
        }
        .banner {
            height: 50vh; 
            min-height: 300px;
            background-image: url('./assets/garage.jpg'); 
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            color: #ffffff;
            text-align: center;
        }

        .banner::before { 
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.4); 
        }

        .banner-title {
            font-size: 3.5em; 
            font-weight: 700;
            position: relative; 
            z-index: 1;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7); 
            padding: 0 20px; 
        }

        .content-wrapper {
            max-width: 800px; 
            margin: 0 auto; 
            padding: 50px 20px;
        }

        .section-subtitle {
            font-size: 1.4em;
            font-weight: 700;
            text-transform: uppercase;
            color: #000000;
            text-align: center;
            margin-bottom: 40px;
            letter-spacing: 1px;
        }

        .about-text p {
            font-size: 1em; 
            color: #444444; 
            margin-bottom: 25px;
            text-align: justify; 
        }

        .about-text p:last-child {
            margin-bottom: 0;
        }

        #content.wrapper h2, p {
            font-family: 'Space mono', monospace;
        }
    </style>
</head>
<body>
    <?php 
        if (file_exists("inc/navbar.php")) {
            include "inc/navbar.php";
        }
    ?>

    <header class="banner">
        <h1 class="banner-title">About Us</h1>
    </header>

    <main class="content-wrapper">
        <h2 class="section-subtitle">SINCE 2024, THE DEALERSHIP WAS FOUNDED</h2>
        <div class="about-text">
            <p>Welcome to CarShroom, where luxury meets innovation to create an automotive experience unlike any other. Founded in 2024 by Darren Anthony Beltham, CarShroom is a premier destination for those who seek more than just a vehicle they seek a lifestyle. Nestled in a state-of-the-art showroom designed to inspire, we specialize in offering the finest selection of luxury automobiles from iconic global brands. At CarShroom, every detail is curated to deliver excellence, from our bespoke inventory to our personalized customer experience, redefining what it means to drive in style.</p>
            <p>CarShroom is more than a dealership, it's a gateway to unparalleled elegance and performance. With a focus on exclusivity, we provide vehicles that embody cutting-edge technology, exceptional craftsmanship, and timeless design. Our dedicated team of experts ensures a seamless journey, offering tailored consultations to match clients with their perfect vehicle and delivering concierge-level service at every step. Whether you're looking for a powerful sports car, an ultra-luxury SUV, or a custom-built masterpiece, CarShroom is your trusted partner in achieving automotive perfection.</p>
            <p>At CarShroom, we are committed to cultivating a community where passion for luxury and innovation thrives. Beyond our showroom, we offer exclusive events, VIP memberships, and a state-of-the-art service center to maintain your investment's peak performance. Darren Anthony Beltham's vision for CarShroom is not just to sell cars but to provide an immersive experience that elevates the art of driving. Step into the world of CarShroom and discover a place where your automotive dreams come to life.</p>
        </div>
    </main>

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
</body>
</html>
