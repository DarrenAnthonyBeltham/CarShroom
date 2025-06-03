<?php
// Sample data for bumper and aero systems - replace with your actual data source
$bumper_products = [
    [
        'id' => 1,
        'name' => 'Aggressor V1 Front Bumper',
        'brand' => 'Aero Dynamics',
        'material' => 'Carbon Fiber with Steel Reinforcement',
        'features' => 'Integrated LED DRLs, improved airflow, aggressive styling',
        'price' => '1,850.00',
        'image' => './assets/bumper/Aggressor V1 Front Bumper.jpg', 
        'description' => 'Transform the look of your vehicle with the Aggressor V1. Full carbon fiber construction for light weight and strength, with functional air ducts.'
    ],
    [
        'id' => 2,
        'name' => 'Stealth Rear Diffuser Bumper',
        'brand' => 'StealthWerks',
        'material' => 'Reinforced Polypropylene',
        'features' => 'Integrated quad-tip exhaust cutouts, functional rear diffuser',
        'price' => '1,300.00',
        'image' => './assets/bumper/Stealth Rear Diffuser Bumper.webp', 
        'description' => 'Enhance rear aerodynamics and achieve a sportier look. Designed for perfect fitment and durability.'
    ],
    [
        'id' => 3,
        'name' => 'Off-Road Steel Winch Bumper',
        'brand' => 'TrailGuard',
        'material' => 'Heavy-Duty Powder-Coated Steel',
        'features' => 'Winch mount (up to 12,000 lbs), D-ring shackles, integrated light bar slots',
        'price' => '2,100.00',
        'image' => './assets/bumper/Off Road Steel Winch Bumper.webp', 
        'description' => 'Built for extreme off-road conditions. Provides maximum protection and recovery options for your truck or SUV.'
    ],
    [
        'id' => 4,
        'name' => 'GT Sport Side Skirts (Pair)',
        'brand' => 'Velocity Aero',
        'material' => 'Fiberglass Reinforced Plastic (FRP)',
        'features' => 'Aerodynamic profile, paint-ready finish',
        'price' => '750.00',
        'image' => './assets/bumper/SideSkirt.webp', 
        'description' => 'Complete the sporty look of your vehicle with these sleek GT Sport side skirts. Designed to improve airflow along the vehicle sides.'
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Performance Bumpers & Aero - CarShroom Technology</title>
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
        
        .bumpers-showcase-section { 
            padding: 40px 20px;
            max-width: 1200px; 
            margin: 0 auto;
        }

        .bumpers-main-title-container { 
            text-align: center; 
            margin-bottom: 50px; 
        }
        
        .bumpers-main-title { 
            font-family: 'Space Mono', monospace;
            font-size: 2.5em; 
            font-weight: 700;
            text-transform: uppercase;
            color: #1a1a1a; 
            letter-spacing: 1.5px;
            line-height: 1.3;
            padding-bottom: 10px;
            border-bottom: 3px solid #3498db; /* Bumper-themed accent color (e.g., cool blue) */
            display: inline-block;
        }

        .bumper-products-grid { 
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); 
            gap: 35px; 
        }

        .bumper-product-card { 
            background-color: #ffffff;
            border-radius: 8px; 
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .bumper-product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.12);
        }

        .bumper-product-card .image-container {
            width: 100%;
            height: 280px; 
            background-color: #eceff1; /* Light blue-grey background */
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom: 1px solid #ddd;
        }

        .bumper-product-card img {
            width: 100%;
            height: 100%; 
            object-fit: cover; 
            object-position: center;
            display: block;
        }
        
        .bumper-product-info { 
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex-grow: 1; 
        }

        .bumper-product-info h3 {
            font-family: 'Space Mono', monospace;
            font-size: 1.3em; 
            font-weight: 700;
            color: #2980b9; /* Darker blue for bumper product name */
            margin-bottom: 8px;
        }
        .bumper-product-info .brand {
            font-size: 0.85em;
            color: #7f8c8d; 
            margin-bottom: 5px;
            font-weight: 500;
            text-transform: uppercase;
        }
         .bumper-product-info .material { 
            font-size: 0.9em;
            color: #555;
            margin-bottom: 10px;
            font-style: italic;
        }
        .bumper-product-info .details {
            font-size: 0.9em;
            color: #555;
            margin-bottom: 15px;
            flex-grow: 1; 
        }
         .bumper-product-info .details strong {
            color: #333;
         }

        .bumper-product-price { 
            font-size: 1.5em;
            font-weight: 700;
            color: #3498db; 
            margin-bottom: 15px;
            text-align: right;
        }

        .add-to-cart-button {
            display: block;
            width: 100%;
            background-color: #2980b9; 
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
            background-color: #2471a3; 
        }
        
        @media (max-width: 768px) { 
            .bumpers-main-title {
                font-size: 2em;
            }
             .bumper-products-grid {
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 25px;
            }
            .bumper-product-card .image-container {
                height: 250px; 
            }
        }

        @media (max-width: 480px) { 
            .bumpers-main-title {
                font-size: 1.7em;
            }
            .bumper-product-card .image-container {
                height: 220px;
            }
            .bumper-product-info h3 {
                font-size: 1.15em;
            }
            .bumper-product-price {
                font-size: 1.3em;
            }
             .bumpers-showcase-section {
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
        <section class="bumpers-showcase-section">
            <div class="bumpers-main-title-container">
                <h1 class="bumpers-main-title">Performance Bumpers & Aero</h1>
            </div>
            <div class="bumper-products-grid">
                <?php foreach ($bumper_products as $bumper): ?>
                    <div class="bumper-product-card">
                        <div class="image-container">
                            <img src="<?php echo htmlspecialchars($bumper['image']); ?>" alt="<?php echo htmlspecialchars($bumper['name']); ?>" onerror="this.onerror=null;this.src='https://placehold.co/400x400/cccccc/333333?text=Image+Not+Available';">
                        </div>
                        <div class="bumper-product-info">
                            <span class="brand"><?php echo htmlspecialchars($bumper['brand']); ?></span>
                            <h3><?php echo htmlspecialchars($bumper['name']); ?></h3>
                            <p class="material">Material: <?php echo htmlspecialchars($bumper['material']); ?></p>
                            <p class="details">
                                <strong>Features:</strong> <?php echo htmlspecialchars($bumper['features']); ?><br>
                                <?php echo htmlspecialchars($bumper['description']); ?>
                            </p>
                            <div class="bumper-product-price">$<?php echo htmlspecialchars($bumper['price']); ?></div>
                            <button type="button" class="add-to-cart-button" onclick="alert('<?php echo htmlspecialchars(addslashes($bumper['name'])); ?> added to cart! (Demo)')">Add to Cart</button>
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