<?php
// Sample data for brake systems - replace with your actual data source
$brake_products = [
    [
        'id' => 1,
        'name' => 'Carbon Ceramic Pro-Series',
        'brand' => 'Apex Braking',
        'type' => 'Full Kit (Front & Rear)',
        'features' => 'Carbon ceramic rotors, 8-piston calipers, high-temp pads',
        'price' => '8,500.00',
        'image' => './assets/brake/Carbon Ceramic Pro Series.jpg', 
        'description' => 'Ultimate stopping power for track and high-performance street use. Exceptional fade resistance and reduced unsprung weight.'
    ],
    [
        'id' => 2,
        'name' => 'Street Sport Big Brake Kit',
        'brand' => 'Performance Stop',
        'type' => 'Front Axle Kit',
        'features' => 'Drilled & slotted rotors, 6-piston calipers, sport pads',
        'price' => '2,800.00',
        'image' => './assets/brake/Street Sport Big Brake kit.jpg', 
        'description' => 'Significant upgrade over OEM brakes for spirited driving. Improved heat dissipation and consistent pedal feel.'
    ],
    [
        'id' => 3,
        'name' => 'Endurance Racing Pads',
        'brand' => 'TrackDay Comp',
        'type' => 'Brake Pads (Set of 4)',
        'features' => 'High-friction compound, excellent thermal stability',
        'price' => '450.00',
        'image' => './assets/brake/Endurance Racing Pads.jpg', 
        'description' => 'Designed for demanding race conditions, offering long life and consistent performance lap after lap.'
    ],
    [
        'id' => 4,
        'name' => 'Braided Steel Brake Lines',
        'brand' => 'Fluid Dynamics',
        'type' => 'Full Set (4 lines)',
        'features' => 'Stainless steel braiding, PTFE inner core, improved pedal response',
        'price' => '220.00',
        'image' => './assets/brake/Braided Steel Brake Lines.jpg', 
        'description' => 'Reduces line expansion for a firmer, more responsive brake pedal and enhanced modulation.'
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brake Performance Systems - CarShroom Technology</title>
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
            background-color: #f4f6f8; 
            color: #333333;
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex-grow: 1;
            padding-top: 40px; 
            padding-bottom: 60px;
        }
        
        .brakes-showcase-section { 
            padding: 40px 20px;
            max-width: 1200px; 
            margin: 0 auto;
        }

        .brakes-main-title-container { 
            text-align: center; 
            margin-bottom: 50px; 
        }
        
        .brakes-main-title { 
            font-family: 'Space Mono', monospace;
            font-size: 2.5em; 
            font-weight: 700;
            text-transform: uppercase;
            color: #1a1a1a; 
            letter-spacing: 1.5px;
            line-height: 1.3;
            padding-bottom: 10px;
            border-bottom: 3px solid #c0392b; 
            display: inline-block;
        }

        .brake-products-grid { 
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); 
            gap: 35px; 
        }

        .brake-product-card { 
            background-color: #ffffff;
            border-radius: 8px; 
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .brake-product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.12);
        }

        .brake-product-card .image-container {
            width: 100%;
            height: 280px; 
            background-color: #e0e0e0; 
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom: 1px solid #ddd;
        }

        .brake-product-card img {
            width: 100%;
            height: 100%; 
            object-fit: cover; 
            object-position: center;
            display: block;
        }
        
        .brake-product-info { 
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex-grow: 1; 
        }

        .brake-product-info h3 {
            font-family: 'Space Mono', monospace;
            font-size: 1.3em; 
            font-weight: 700;
            color: #a52a2a; 
            margin-bottom: 8px;
        }
        .brake-product-info .brand {
            font-size: 0.85em;
            color: #7f8c8d; 
            margin-bottom: 5px;
            font-weight: 500;
            text-transform: uppercase;
        }
         .brake-product-info .type {
            font-size: 0.9em;
            color: #555;
            margin-bottom: 10px;
            font-style: italic;
        }
        .brake-product-info .details {
            font-size: 0.9em;
            color: #555;
            margin-bottom: 15px;
            flex-grow: 1; 
        }
         .brake-product-info .details strong {
            color: #333;
         }

        .brake-product-price { 
            font-size: 1.5em;
            font-weight: 700;
            color: #c0392b; 
            margin-bottom: 15px;
            text-align: right;
        }

        .add-to-cart-button {
            display: block;
            width: 100%;
            background-color: #a52a2a;
            color: #ffffff;
            padding: 12px 20px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
            font-size: 1em;
            transition: background-color 0.3s ease;
            border: none;
            cursor: pointer;
            margin-top: auto; 
        }
        .add-to-cart-button:hover {
            background-color: #8b0000; 
        }
        
        @media (max-width: 768px) { 
            .brakes-main-title {
                font-size: 2em;
            }
             .brake-products-grid {
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 25px;
            }
            .brake-product-card .image-container {
                height: 250px; 
            }
        }

        @media (max-width: 480px) { 
            .brakes-main-title {
                font-size: 1.7em;
            }
            .brake-product-card .image-container {
                height: 220px;
            }
            .brake-product-info h3 {
                font-size: 1.15em;
            }
            .brake-product-price {
                font-size: 1.3em;
            }
             .brakes-showcase-section {
                padding: 30px 15px;
            }
             main {
                padding-top: 20px;
                padding-bottom: 40px;
            }
        }
    </style>
</head>
<body>
    <?php 
        if (file_exists("../inc/navbar.php")) { 
            include "../inc/navbar.php";
        }
    ?>

    <main>
        <section class="brakes-showcase-section">
            <div class="brakes-main-title-container">
                <h1 class="brakes-main-title">Brake Performance Systems</h1>
            </div>
            <div class="brake-products-grid">
                <?php foreach ($brake_products as $brake): ?>
                    <div class="brake-product-card">
                        <div class="image-container">
                            <img src="<?php echo htmlspecialchars($brake['image']); ?>" alt="<?php echo htmlspecialchars($brake['name']); ?>" onerror="this.onerror=null;this.src='https://placehold.co/400x400/cccccc/333333?text=Image+Not+Available';">
                        </div>
                        <div class="brake-product-info">
                            <span class="brand"><?php echo htmlspecialchars($brake['brand']); ?></span>
                            <h3><?php echo htmlspecialchars($brake['name']); ?></h3>
                            <p class="type"><?php echo htmlspecialchars($brake['type']); ?></p>
                            <p class="details">
                                <strong>Features:</strong> <?php echo htmlspecialchars($brake['features']); ?><br>
                                <?php echo htmlspecialchars($brake['description']); ?>
                            </p>
                            <div class="brake-product-price">$<?php echo htmlspecialchars($brake['price']); ?></div>
                            <button type="button" class="add-to-cart-button" onclick="alert('<?php echo htmlspecialchars(addslashes($brake['name'])); ?> added to cart! (Demo)')">Add to Cart</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <?php 
        if (file_exists("../inc/news.php")) { 
            include "../inc/news.php";
        }
    ?>

    <?php 
        if (file_exists("../inc/footer.php")) { 
            include "../inc/footer.php";
        }
    ?>
</body>
</html>