<?php
// Sample data for luxury interior components - replace with your actual data source
$interior_products = [
    [
        'id' => 1,
        'name' => 'Bespoke Leather Racing Seats',
        'brand' => 'Artisan Interiors',
        'material' => 'Nappa Leather & Alcantara',
        'features' => 'Custom stitching, carbon fiber shell, heated & ventilated',
        'price' => '4,500.00',
        'image' => './assets/interior/BespokeLeatherRacingSeats.webp',
        'description' => 'Experience ultimate comfort and support with our bespoke racing seats, handcrafted to perfection with the finest materials.'
    ],
    [
        'id' => 2,
        'name' => 'Carbon Fiber Steering Wheel',
        'brand' => 'PerformanceGrip',
        'material' => 'Carbon Fiber & Perforated Leather',
        'features' => 'Ergonomic design, integrated shift lights, customizable inlay',
        'price' => '1,800.00',
        'image' => './assets/interior/Carbon Fiber Steering Wheel.webp',
        'description' => 'Enhance your driving connection with this lightweight carbon fiber steering wheel, offering superior grip and a sporty aesthetic.'
    ],
    [
        'id' => 3,
        'name' => 'Ambient Lighting Upgrade Kit',
        'brand' => 'LumiLux',
        'material' => 'Multi-color LED System',
        'features' => 'App-controlled, 64 color options, dynamic lighting modes',
        'price' => '650.00',
        'image' => './assets/interior/Lighting Upgrade.webp',
        'description' => 'Set the perfect mood in your cabin with our advanced ambient lighting kit, offering a spectrum of colors and effects.'
    ],
    [
        'id' => 4,
        'name' => 'Alcantara Headliner & Pillar Kit',
        'brand' => 'Elite Trim',
        'material' => 'Genuine Alcantara',
        'features' => 'Luxurious feel, improved acoustics, custom color options',
        'price' => '2,200.00',
        'image' => './assets/interior/Alcantara Headliner and Pillar kit.png', 
        'description' => 'Elevate your interior to a new level of luxury with a full Alcantara headliner and pillar trim kit.'
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxury Interiors - CarShroom Technology</title>
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
        
        .interiors-showcase-section { 
            padding: 40px 20px;
            max-width: 1200px; 
            margin: 0 auto;
        }

        .interiors-main-title-container { 
            text-align: center; 
            margin-bottom: 50px; 
        }
        
        .interiors-main-title { 
            font-family: 'Space Mono', monospace;
            font-size: 2.5em; 
            font-weight: 700;
            text-transform: uppercase;
            color: #1a1a1a; 
            letter-spacing: 1.5px;
            line-height: 1.3;
            padding-bottom: 10px;
            border-bottom: 3px solid #b8860b; /* Gold-like accent for luxury */
            display: inline-block;
        }

        .interior-products-grid { 
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); 
            gap: 35px; 
        }

        .interior-product-card { 
            background-color: #ffffff;
            border-radius: 8px; 
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .interior-product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.12);
        }

        .interior-product-card .image-container {
            width: 100%;
            height: 280px; 
            background-color: #faf0e6; /* Creamy background for luxury items */
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom: 1px solid #ddd;
        }

        .interior-product-card img {
            width: 100%;
            height: 100%; 
            object-fit: cover; 
            object-position: center;
            display: block;
        }
        
        .interior-product-info { 
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex-grow: 1; 
        }

        .interior-product-info h3 {
            font-family: 'Space Mono', monospace;
            font-size: 1.3em; 
            font-weight: 700;
            color: #8B4513; /* SaddleBrown for interior product name */
            margin-bottom: 8px;
        }
        .interior-product-info .brand {
            font-size: 0.85em;
            color: #7f8c8d; 
            margin-bottom: 5px;
            font-weight: 500;
            text-transform: uppercase;
        }
         .interior-product-info .material { 
            font-size: 0.9em;
            color: #555;
            margin-bottom: 10px;
            font-style: italic;
        }
        .interior-product-info .details {
            font-size: 0.9em;
            color: #555;
            margin-bottom: 15px;
            flex-grow: 1; 
        }
         .interior-product-info .details strong {
            color: #333;
         }

        .interior-product-price { 
            font-size: 1.5em;
            font-weight: 700;
            color: #b8860b; /* Gold-like accent for price */
            margin-bottom: 15px;
            text-align: right;
        }

        .add-to-cart-button {
            display: block;
            width: 100%;
            background-color: #8B4513; /* SaddleBrown for button */
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
            background-color: #7A3D0F; /* Darker brown */
        }
        
        @media (max-width: 768px) { 
            .interiors-main-title {
                font-size: 2em;
            }
             .interior-products-grid {
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 25px;
            }
            .interior-product-card .image-container {
                height: 250px; 
            }
        }

        @media (max-width: 480px) { 
            .interiors-main-title {
                font-size: 1.7em;
            }
            .interior-product-card .image-container {
                height: 220px;
            }
            .interior-product-info h3 {
                font-size: 1.15em;
            }
            .interior-product-price {
                font-size: 1.3em;
            }
             .interiors-showcase-section {
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
        <section class="interiors-showcase-section">
            <div class="interiors-main-title-container">
                <h1 class="interiors-main-title">Luxury Interiors</h1>
            </div>
            <div class="interior-products-grid">
                <?php foreach ($interior_products as $interior): ?>
                    <div class="interior-product-card">
                        <div class="image-container">
                            <img src="<?php echo htmlspecialchars($interior['image']); ?>" alt="<?php echo htmlspecialchars($interior['name']); ?>" onerror="this.onerror=null;this.src='https://placehold.co/400x400/cccccc/333333?text=Image+Not+Available';">
                        </div>
                        <div class="interior-product-info">
                            <span class="brand"><?php echo htmlspecialchars($interior['brand']); ?></span>
                            <h3><?php echo htmlspecialchars($interior['name']); ?></h3>
                            <p class="material">Material: <?php echo htmlspecialchars($interior['material']); ?></p>
                            <p class="details">
                                <strong>Features:</strong> <?php echo htmlspecialchars($interior['features']); ?><br>
                                <?php echo htmlspecialchars($interior['description']); ?>
                            </p>
                            <div class="interior-product-price">$<?php echo htmlspecialchars($interior['price']); ?></div>
                            <button type="button" class="add-to-cart-button" onclick="alert('<?php echo htmlspecialchars(addslashes($interior['name'])); ?> added to cart! (Demo)')">Add to Cart</button>
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
