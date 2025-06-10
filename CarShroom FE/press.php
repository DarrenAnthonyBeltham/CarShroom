<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Press & Media - CarShroom</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
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
            line-height: 1.6;
        }

        main {
            padding-bottom: 60px;
        }

        .press-header {
            background-color: #1a1a1a;
            color: #ffffff;
            padding: 80px 20px 60px;
            text-align: center;
        }

        .press-header h1 {
            font-family: 'Space Mono', monospace;
            font-size: clamp(2.5rem, 6vw, 4rem);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin: 0 0 10px 0;
        }

        .press-header p {
            font-size: 1.15em;
            color: #ced4da;
            max-width: 700px;
            margin: 0 auto;
        }

        .press-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 20px;
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 50px;
        }

        .press-releases-section h2,
        .media-kit-section h2 {
            font-size: 2em;
            font-weight: 700;
            color: #343a40;
            margin-bottom: 30px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e9ecef;
        }

        .release-item {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.07);
            margin-bottom: 30px;
            overflow: hidden;
            display: flex;
            transition: box-shadow 0.3s ease;
        }
        .release-item:hover {
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .release-item-image {
            width: 200px;
            flex-shrink: 0;
            background-size: cover;
            background-position: center;
        }

        .release-item-content {
            padding: 25px;
        }

        .release-item-date {
            font-size: 0.85em;
            font-weight: 600;
            color: #6c757d;
            text-transform: uppercase;
            margin-bottom: 10px;
            letter-spacing: 0.5px;
        }

        .release-item-content h3 {
            font-size: 1.3em;
            font-weight: 600;
            margin: 0 0 10px 0;
        }
        .release-item-content h3 a {
            color: #212529;
            text-decoration: none;
            transition: color 0.2s ease;
        }
        .release-item-content h3 a:hover {
            color: #e74c3c;
        }

        .release-item-excerpt {
            font-size: 0.95em;
            color: #495057;
        }
        
        .media-kit-section .media-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.07);
            padding: 25px;
            margin-bottom: 30px;
        }

        .media-card h3 {
            font-size: 1.2em;
            margin-top: 0;
            margin-bottom: 15px;
            color: #343a40;
        }
        
        .media-card p, .media-card a {
            font-size: 1em;
            color: #495057;
            text-decoration: none;
        }

        .download-links-list {
            list-style: none;
            padding: 0;
        }
        .download-links-list li {
            margin-bottom: 12px;
        }
        .download-links-list a {
            color: #3498db;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s ease;
        }
        .download-links-list a:hover {
            color: #2980b9;
            text-decoration: underline;
        }

        @media (max-width: 992px) {
            .press-container {
                grid-template-columns: 1fr;
                gap: 60px;
            }
        }
        
        @media (max-width: 576px) {
            .release-item {
                flex-direction: column;
            }
            .release-item-image {
                width: 100%;
                height: 180px;
            }
        }

    </style>
</head>
<body>

    <?php 
        if (file_exists("./inc/navbar.php")) { 
            include "./inc/navbar.php";
        }

        $press_releases = [
            [
                'title' => 'CarShroom Unveils State-of-the-Art Hypercar Showroom in Jakarta',
                'date' => 'June 10, 2025',
                'excerpt' => 'CarShroom celebrates the grand opening of its flagship location, setting a new standard for luxury automotive retail in Southeast Asia...',
                'image_url' => 'assets/hypercarevent.jpg',
                'link' => '#'
            ],
            [
                'title' => 'The Visionary Collection: A Curated Selection of Bespoke Supercars Arrives at CarShroom',
                'date' => 'May 22, 2025',
                'excerpt' => 'An exclusive look at the limited-edition models and one-of-a-kind configurations now available for discerning collectors and enthusiasts...',
                'image_url' => 'assets/supercarshowroom.jpg',
                'link' => '#'
            ],
            [
                'title' => 'CarShroom Technology Announces Partnership with Apex Braking for Exclusive Performance Parts',
                'date' => 'April 15, 2025',
                'excerpt' => 'The new partnership will bring track-proven brake technology directly to CarShroom customers, available for a wide range of performance vehicles...',
                'image_url' => 'assets/ApexBrakes.webp',
                'link' => '#'
            ],
        ];
    ?>

    <header class="press-header">
        <h1>Press & Media</h1>
        <p>Welcome to the official CarShroom newsroom. Find our latest press releases, media assets, and contact information here.</p>
    </header>

    <main>
        <div class="press-container">
            <div class="press-releases-section">
                <h2>Latest Releases</h2>
                <?php foreach ($press_releases as $release): ?>
                    <div class="release-item">
                        <div class="release-item-image" style="background-image: url('<?php echo htmlspecialchars($release['image_url']); ?>');"></div>
                        <div class="release-item-content">
                            <p class="release-item-date"><?php echo htmlspecialchars($release['date']); ?></p>
                            <h3><a href="<?php echo htmlspecialchars($release['link']); ?>"><?php echo htmlspecialchars($release['title']); ?></a></h3>
                            <p class="release-item-excerpt"><?php echo htmlspecialchars($release['excerpt']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <aside class="media-kit-section">
                <div class="media-card">
                    <h3>Media Contact</h3>
                    <p>
                        <strong>Central Cee</strong><br>
                        Head of Communications<br>
                        <a href="mailto:press@carshroom.com">press@carshroom.com</a><br>
                        <a href="tel:+62215550100">+62 21 555 0100</a>
                    </p>
                </div>
                <div class="media-card">
                    <h3>Downloads</h3>
                    <ul class="download-links-list">
                        <li><a href="#" download>Press Kit (.zip)</a></li>
                        <li><a href="#" download>CarShroom Logos (.zip)</a></li>
                        <li><a href="#" download>Leadership Headshots (.zip)</a></li>
                    </ul>
                </div>
            </aside>
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
