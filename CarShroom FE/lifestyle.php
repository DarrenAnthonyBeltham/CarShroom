<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarShroom Lifestyle</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">
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
            padding-bottom: 60px;
        }

        .lifestyle-hero {
            position: relative;
            height: 70vh;
            min-height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            background: url('assets/monacolifestyle.jpg') no-repeat center center/cover;
        }

        .lifestyle-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        .hero-content {
            position: relative;
            z-index: 1;
            padding: 20px;
        }

        .hero-content h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(3rem, 7vw, 5.5rem);
            font-weight: 900;
            line-height: 1.1;
            margin: 0 0 10px 0;
            text-shadow: 0 3px 10px rgba(0,0,0,0.5);
        }

        .hero-content p {
            font-size: 1.25rem;
            font-weight: 300;
            max-width: 600px;
            margin: 0 auto;
            text-shadow: 0 2px 8px rgba(0,0,0,0.6);
        }

        .lifestyle-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 20px;
        }

        .lifestyle-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 40px;
        }
        
        .article-card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            text-decoration: none;
            color: #212529;
            transition: all 0.3s ease;
        }
        .article-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 35px rgba(0,0,0,0.12);
        }
        
        .article-image {
            height: 220px;
            overflow: hidden;
        }
        .article-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }
        .article-card:hover .article-image img {
            transform: scale(1.05);
        }

        .article-content {
            padding: 25px;
            flex-grow: 1;
        }

        .article-category {
            color: #e74c3c;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.8em;
            margin-bottom: 10px;
        }
        
        .article-content h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.5em;
            font-weight: 700;
            margin: 0 0 10px 0;
        }

        .article-excerpt {
            font-size: 0.95em;
            color: #6c757d;
        }
        
        .article-meta {
            padding: 20px 25px;
            border-top: 1px solid #f1f2f6;
            font-size: 0.85em;
            color: #adb5bd;
            font-weight: 500;
        }
    </style>
</head>
<body>

    <?php 
        if (file_exists("./inc/navbar.php")) { 
            include "./inc/navbar.php";
        }
        
        $lifestyle_articles = [
            [
                'title' => 'The Ultimate Supercar Road Trip Through the Swiss Alps',
                'category' => 'Travel',
                'excerpt' => 'Discover the most breathtaking roads, luxurious stops, and unforgettable moments behind the wheel of a modern marvel.',
                'image' => 'assets/AlpineRoadtrip.webp',
                'author' => 'Alex Rennsport',
                'date' => 'June 08, 2025'
            ],
            [
                'title' => 'Concours d\'Elegance: A Celebration of Automotive History and Design',
                'category' => 'Events',
                'excerpt' => 'A behind-the-scenes look at the world\'s most prestigious automotive event, where timeless classics meet modern hypercars.',
                'image' => 'assets/ClassicCarEvent.jpg',
                'author' => 'Julia Sterling',
                'date' => 'May 30, 2025'
            ],
            [
                'title' => 'Owner Stories: My First Year with the Hennessey Venom F5',
                'category' => 'Owner Spotlight',
                'excerpt' => 'An exclusive interview with a CarShroom client on the exhilarating experience of owning and driving one of the fastest cars on the planet.',
                'image' => 'assets/VenomF5Owner.webp',
                'author' => 'Darren Anthony Beltham',
                'date' => 'May 15, 2025'
            ],
            [
                'title' => 'The Art of Detailing: Protecting Your Investment',
                'category' => 'Car Care',
                'excerpt' => 'Our master detailers share their professional secrets on how to maintain a flawless, showroom finish on your prized vehicle.',
                'image' => 'assets/CarDetailling.jpg',
                'author' => 'CarShroom Experts',
                'date' => 'May 02, 2025'
            ],
            [
                'title' => 'From Track to Street: How Racing Technology Shapes Our Road Cars',
                'category' => 'Technology',
                'excerpt' => 'Explore the fascinating journey of innovations like carbon-ceramic brakes and active aerodynamics from Formula 1 to your garage.',
                'image' => 'assets/f1engine.jpg',
                'author' => 'Chris Harris',
                'date' => 'April 25, 2025'
            ],
            [
                'title' => 'The CarShroom Gala: A Night of Luxury and Philanthropy',
                'category' => 'Events',
                'excerpt' => 'A recap of our annual charity gala, celebrating our community and giving back to local causes. See who was there and what made the night special.',
                'image' => 'assets/CharityGala.webp',
                'author' => 'CarShroom Team',
                'date' => 'April 18, 2025'
            ],
        ];
    ?>

    <header class="lifestyle-hero">
        <div class="hero-content">
            <h1>The Art of Driving</h1>
            <p>Explore the world of luxury, performance, and automotive passion that extends beyond the driver's seat.</p>
        </div>
    </header>

    <main>
        <div class="lifestyle-container">
            <div class="lifestyle-grid">
                <?php foreach ($lifestyle_articles as $article): ?>
                    <a href="#" class="article-card">
                        <div class="article-image">
                            <img src="<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>">
                        </div>
                        <div class="article-content">
                            <span class="article-category"><?php echo htmlspecialchars($article['category']); ?></span>
                            <h2><?php echo htmlspecialchars($article['title']); ?></h2>
                            <p class="article-excerpt"><?php echo htmlspecialchars($article['excerpt']); ?></p>
                        </div>
                        <div class="article-meta">
                            By <?php echo htmlspecialchars($article['author']); ?> on <?php echo htmlspecialchars($article['date']); ?>
                        </div>
                    </a>
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
