<?php
$engine_products = [
    [
        'id' => 1,
        'name' => 'Twin-Turbo V8 Performance Crate Engine',
        'brand' => 'PowerTrain Pro',
        'type' => 'Complete Engine Assembly',
        'specs' => '4.0L, 720HP, 800Nm Torque, Forged Internals',
        'price' => '25,500.00',
        'image' => './assets/engine/Twin Turbo.webp', 
        'description' => 'Unleash raw power with this fully built twin-turbo V8. Engineered for reliability and extreme performance applications.'
    ],
    [
        'id' => 2,
        'name' => 'Performance ECU & Tuning Package',
        'brand' => 'ChipTune Masters',
        'type' => 'ECU Remap & Hardware',
        'specs' => 'Up to +80HP, +120Nm Torque, Includes high-flow intake',
        'price' => '1,950.00',
        'image' => './assets/engine/ECU and Tuning.jpg', 
        'description' => 'Optimize your existing engine with our advanced ECU tuning and performance hardware package for significant gains.'
    ],
    [
        'id' => 3,
        'name' => 'Titanium Valvetronic Exhaust System',
        'brand' => 'AeroFlow Exhausts',
        'type' => 'Full Cat-Back System',
        'specs' => 'Full Titanium Construction, Valved for Sound Control, -15kg Weight Reduction',
        'price' => '6,200.00',
        'image' => './assets/engine/Titanium Valvetronic Exhaust System.jpg', 
        'description' => 'Experience an exhilarating exhaust note and performance gains with this ultra-lightweight titanium valved exhaust system.'
    ],
    [
        'id' => 4,
        'name' => 'Performance Intercooler Kit',
        'brand' => 'CoolBoost',
        'type' => 'Front Mount Intercooler',
        'specs' => 'Bar and Plate Core, Reduces Intake Temps by up to 20°C',
        'price' => '980.00',
        'image' => './assets/engine/Performance Intercooler.jpg',
        'description' => 'Keep your intake temperatures low for consistent power with this high-efficiency front mount intercooler kit.'
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Engines & Powertrains - CarShroom Technology</title>
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
        
        .engines-showcase-section { 
            padding: 40px 20px;
            max-width: 1200px; 
            margin: 0 auto;
        }

        .engines-main-title-container { 
            text-align: center; 
            margin-bottom: 50px; 
        }
        
        .engines-main-title { 
            font-family: 'Space Mono', monospace;
            font-size: 2.5em; 
            font-weight: 700;
            text-transform: uppercase;
            color: #1a1a1a; 
            letter-spacing: 1.5px;
            line-height: 1.3;
            padding-bottom: 10px;
            border-bottom: 3px solid #d35400; /* Engine-themed accent (e.g., burnt orange) */
            display: inline-block;
        }

        .engine-products-grid { 
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); 
            gap: 35px; 
        }

        .engine-product-card { 
            background-color: #ffffff;
            border-radius: 8px; 
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .engine-product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.12);
        }

        .engine-product-card .image-container {
            width: 100%;
            height: 280px; 
            background-color: #343a40; /* Dark background for engine parts */
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom: 1px solid #495057;
        }

        .engine-product-card img {
            width: 100%;
            height: 100%; 
            object-fit: cover; 
            object-position: center;
            display: block;
        }
        
        .engine-product-info { 
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex-grow: 1; 
        }

        .engine-product-info h3 {
            font-family: 'Space Mono', monospace;
            font-size: 1.3em; 
            font-weight: 700;
            color: #b84300; /* Burnt orange for engine product name */
            margin-bottom: 8px;
        }
        .engine-product-info .brand {
            font-size: 0.85em;
            color: #7f8c8d; 
            margin-bottom: 5px;
            font-weight: 500;
            text-transform: uppercase;
        }
         .engine-product-info .type { 
            font-size: 0.9em;
            color: #555;
            margin-bottom: 10px;
            font-style: italic;
        }
        .engine-product-info .details {
            font-size: 0.9em;
            color: #555;
            margin-bottom: 15px;
            flex-grow: 1; 
        }
         .engine-product-info .details strong {
            color: #333;
         }

        .engine-product-price { 
            font-size: 1.5em;
            font-weight: 700;
            color: #d35400; 
            margin-bottom: 15px;
            text-align: right;
        }

        .add-to-cart-button {
            display: block;
            width: 100%;
            background-color: #b84300; 
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
            background-color: #a03700; 
        }
        
        @media (max-width: 768px) { 
            .engines-main-title {
                font-size: 2em;
            }
             .engine-products-grid {
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 25px;
            }
            .engine-product-card .image-container {
                height: 250px; 
            }
        }

        @media (max-width: 480px) { 
            .engines-main-title {
                font-size: 1.7em;
            }
            .engine-product-card .image-container {
                height: 220px;
            }
            .engine-product-info h3 {
                font-size: 1.15em;
            }
            .engine-product-price {
                font-size: 1.3em;
            }
             .engines-showcase-section {
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
        <section class="engines-showcase-section">
            <div class="engines-main-title-container">
                <h1 class="engines-main-title">Engines & Powertrains</h1>
            </div>
            <div class="engine-products-grid">
                <?php foreach ($engine_products as $engine): ?>
                    <div class="engine-product-card">
                        <div class="image-container">
                            <img src="<?php echo htmlspecialchars($engine['image']); ?>" alt="<?php echo htmlspecialchars($engine['name']); ?>" onerror="this.onerror=null;this.src='https://placehold.co/400x400/cccccc/333333?text=Image+Not+Available';">
                        </div>
                        <div class="engine-product-info">
                            <span class="brand"><?php echo htmlspecialchars($engine['brand']); ?></span>
                            <h3><?php echo htmlspecialchars($engine['name']); ?></h3>
                            <p class="type">Type: <?php echo htmlspecialchars($engine['type']); ?></p>
                            <p class="details">
                                <strong>Specs:</strong> <?php echo htmlspecialchars($engine['specs']); ?><br>
                                <?php echo htmlspecialchars($engine['description']); ?>
                            </p>
                            <div class="engine-product-price">$<?php echo htmlspecialchars($engine['price']); ?></div>
                            <button type="button" class="add-to-cart-button" onclick="alert('<?php echo htmlspecialchars(addslashes($engine['name'])); ?> added to cart! (Demo)')">Add to Cart</button>
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
