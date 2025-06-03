<?php
// Sample data for aerodynamic wings - replace with your actual data source
$wing_products = [
    [
        'id' => 1,
        'name' => 'GT Carbon Fiber Wing',
        'brand' => 'AeroPerformance',
        'material' => 'High-Gloss Carbon Fiber',
        'features' => 'Adjustable angle of attack, swan neck mounts, significant downforce',
        'price' => '2,200.00',
        'image' => './assets/wing/GT Carbon Fiber Wing.jpg',
        'description' => 'Track-focused GT wing designed for maximum downforce and stability at high speeds. Lightweight and incredibly strong.'
    ],
    [
        'id' => 2,
        'name' => 'Street Series Ducktail Spoiler',
        'brand' => 'SubtleAero',
        'material' => 'Paintable FRP Composite',
        'features' => 'Classic ducktail design, easy installation, improves rear aesthetics',
        'price' => '550.00',
        'image' => './assets/wing/Ducktail Spoiler.webp', 
        'description' => 'Add a touch of classic motorsport style to your street car. Enhances the vehicle\'s lines while providing a modest aerodynamic benefit.'
    ],
    [
        'id' => 3,
        'name' => 'Active Aero Rear Wing System',
        'brand' => 'DynamicFlow',
        'material' => 'Aluminum & Carbon Fiber Components',
        'features' => 'Electronically controlled, variable angle, air brake function',
        'price' => '7,800.00',
        'image' => './assets/wing/Aero Rear Wing System.jpg', 
        'description' => 'State-of-the-art active aerodynamic system that adjusts wing angle based on speed and braking for optimal performance.'
    ],
    [
        'id' => 4,
        'name' => 'Universal Roof Spoiler Extension',
        'brand' => 'AeroPlus',
        'material' => 'ABS Plastic - Gloss Black',
        'features' => 'Universal fitment (with modification), enhances roofline flow',
        'price' => '180.00',
        'image' => './assets/wing/Universal Roof SPoiler Extensioin.jpg',
        'description' => 'A versatile roof spoiler extension to add a sporty touch and help manage airflow over the rear of the vehicle.'
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aerodynamic Wings & Spoilers - CarShroom Technology</title>
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
        
        .wings-showcase-section { 
            padding: 40px 20px;
            max-width: 1200px; 
            margin: 0 auto;
        }

        .wings-main-title-container { 
            text-align: center; 
            margin-bottom: 50px; 
        }
        
        .wings-main-title { 
            font-family: 'Space Mono', monospace;
            font-size: 2.5em; 
            font-weight: 700;
            text-transform: uppercase;
            color: #1a1a1a; 
            letter-spacing: 1.5px;
            line-height: 1.3;
            padding-bottom: 10px;
            border-bottom: 3px solid #2c3e50; /* Techy dark blue accent */
            display: inline-block;
        }

        .wing-products-grid { 
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); 
            gap: 35px; 
        }

        .wing-product-card { 
            background-color: #ffffff;
            border-radius: 8px; 
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .wing-product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.12);
        }

        .wing-product-card .image-container {
            width: 100%;
            height: 280px; 
            background-color: #e8eaf6; /* Lighter techy blue background */
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom: 1px solid #ddd;
        }

        .wing-product-card img {
            width: 100%;
            height: 100%; 
            object-fit: cover; 
            object-position: center;
            display: block;
        }
        
        .wing-product-info { 
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex-grow: 1; 
        }

        .wing-product-info h3 {
            font-family: 'Space Mono', monospace;
            font-size: 1.3em; 
            font-weight: 700;
            color: #1d3557; /* Darker blue for wing product name */
            margin-bottom: 8px;
        }
        .wing-product-info .brand {
            font-size: 0.85em;
            color: #7f8c8d; 
            margin-bottom: 5px;
            font-weight: 500;
            text-transform: uppercase;
        }
         .wing-product-info .material { 
            font-size: 0.9em;
            color: #555;
            margin-bottom: 10px;
            font-style: italic;
        }
        .wing-product-info .details {
            font-size: 0.9em;
            color: #555;
            margin-bottom: 15px;
            flex-grow: 1; 
        }
         .wing-product-info .details strong {
            color: #333;
         }

        .wing-product-price { 
            font-size: 1.5em;
            font-weight: 700;
            color: #2c3e50; 
            margin-bottom: 15px;
            text-align: right;
        }

        .add-to-cart-button {
            display: block;
            width: 100%;
            background-color: #1d3557; 
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
            background-color: #162841; 
        }
        
        @media (max-width: 768px) { 
            .wings-main-title {
                font-size: 2em;
            }
             .wing-products-grid {
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 25px;
            }
            .wing-product-card .image-container {
                height: 250px; 
            }
        }

        @media (max-width: 480px) { 
            .wings-main-title {
                font-size: 1.7em;
            }
            .wing-product-card .image-container {
                height: 220px;
            }
            .wing-product-info h3 {
                font-size: 1.15em;
            }
            .wing-product-price {
                font-size: 1.3em;
            }
             .wings-showcase-section {
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
        <section class="wings-showcase-section">
            <div class="wings-main-title-container">
                <h1 class="wings-main-title">Aerodynamic Wings & Spoilers</h1>
            </div>
            <div class="wing-products-grid">
                <?php foreach ($wing_products as $wing): ?>
                    <div class="wing-product-card">
                        <div class="image-container">
                            <img src="<?php echo htmlspecialchars($wing['image']); ?>" alt="<?php echo htmlspecialchars($wing['name']); ?>" onerror="this.onerror=null;this.src='https://placehold.co/400x400/cccccc/333333?text=Image+Not+Available';">
                        </div>
                        <div class="wing-product-info">
                            <span class="brand"><?php echo htmlspecialchars($wing['brand']); ?></span>
                            <h3><?php echo htmlspecialchars($wing['name']); ?></h3>
                            <p class="material">Material: <?php echo htmlspecialchars($wing['material']); ?></p>
                            <p class="details">
                                <strong>Features:</strong> <?php echo htmlspecialchars($wing['features']); ?><br>
                                <?php echo htmlspecialchars($wing['description']); ?>
                            </p>
                            <div class="wing-product-price">$<?php echo htmlspecialchars($wing['price']); ?></div>
                            <button type="button" class="add-to-cart-button" onclick="alert('<?php echo htmlspecialchars(addslashes($wing['name'])); ?> added to cart! (Demo)')">Add to Cart</button>
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