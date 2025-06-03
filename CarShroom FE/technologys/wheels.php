<?php
// Sample data for wheels - replace with your actual data source (e.g., database)
$wheel_products = [
    [
        'id' => 1,
        'name' => 'Forged Monoblock F-01',
        'brand' => 'Prestige Wheels',
        'size' => '20 inch | 5x112',
        'finish' => 'Gloss Black',
        'price' => '1,200.00',
        'image' => './assets/wheels/forgedmonoblockf01.jpeg',
        'description' => 'Ultra-lightweight forged monoblock construction for maximum performance and aggressive styling. Perfect for sports and luxury vehicles seeking an edge.'
    ],
    [
        'id' => 2,
        'name' => 'Classic Mesh C-05',
        'brand' => 'Heritage Rims',
        'size' => '19 inch | 5x120',
        'finish' => 'Silver Machined Face',
        'price' => '950.00',
        'image' => './assets/wheels/ClassicMeshC05.webp',
        'description' => 'Timeless mesh design with a modern twist. Durable construction with a polished finish, offering a sophisticated look for classic and contemporary cars.'
    ],
    [
        'id' => 3,
        'name' => 'Off-Road Dominator X-10',
        'brand' => 'Terrain Masters',
        'size' => '18 inch | 6x139.7',
        'finish' => 'Matte Bronze',
        'price' => '880.00',
        'image' => './assets/wheels/Off-Road Dominator X-10.jpg',
        'description' => 'Built for the toughest terrains. Reinforced alloy with a rugged matte bronze finish, providing exceptional durability and a commanding presence for trucks and SUVs.'
    ],
    [
        'id' => 4,
        'name' => 'Aero Disc TurboFan',
        'brand' => 'Concept Dynamics',
        'size' => '21 inch | 5x114.3',
        'finish' => 'Carbon Fiber & Polished Alloy',
        'price' => '2,500.00',
        'image' => './assets/wheels/AeroDiscTurboFan.jpg',
        'description' => 'Aerodynamically optimized TurboFan design for reduced drag and enhanced brake cooling. Features a unique carbon fiber overlay for a futuristic appeal.'
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>High-Tech Wheels - CarShroom Technology</title>
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
        
        .wheels-showcase-section {
            padding: 40px 20px;
            max-width: 1200px; 
            margin: 0 auto;
        }

        .wheels-main-title-container {
            text-align: center; 
            margin-bottom: 50px; 
        }
        
        .wheels-main-title {
            font-family: 'Space Mono', monospace;
            font-size: 2.5em; 
            font-weight: 700;
            text-transform: uppercase;
            color: #1a1a1a; 
            letter-spacing: 1.5px;
            line-height: 1.3;
            padding-bottom: 10px;
            border-bottom: 3px solid #e74c3c; 
            display: inline-block;
        }

        .wheel-products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); 
            gap: 35px; 
        }

        .wheel-product-card {
            background-color: #ffffff;
            border-radius: 8px; 
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .wheel-product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.12);
        }

        .wheel-product-card img {
            width: 100%;
            height: 100%; 
            object-fit: cover; 
            object-position: center;
            display: block;
        }
        
        .wheel-product-info {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex-grow: 1; 
        }

        .wheel-product-info h3 {
            font-family: 'Space Mono', monospace;
            font-size: 1.3em; 
            font-weight: 700;
            color: #2c3e50; 
            margin-bottom: 8px;
        }
        .wheel-product-info .brand {
            font-size: 0.85em;
            color: #7f8c8d; 
            margin-bottom: 10px;
            font-weight: 500;
            text-transform: uppercase;
        }
        .wheel-product-info .details {
            font-size: 0.9em;
            color: #555;
            margin-bottom: 15px;
            flex-grow: 1; 
        }
         .wheel-product-info .details strong {
            color: #333;
         }

        .wheel-product-price {
            font-size: 1.5em;
            font-weight: 700;
            color: #e74c3c; 
            margin-bottom: 15px;
            text-align: right;
        }

        .add-to-cart-button {
            display: block;
            width: 100%;
            background-color: #34495e; 
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
            background-color: #2c3e50; 
        }
        
        @media (max-width: 768px) { 
            .wheels-main-title {
                font-size: 2em;
            }
             .wheel-products-grid {
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 25px;
            }
            .wheel-product-card img {
                height: 250px; 
            }
        }

        @media (max-width: 480px) { 
            .wheels-main-title {
                font-size: 1.7em;
            }
            .wheel-product-card img {
                height: 220px;
            }
            .wheel-product-info h3 {
                font-size: 1.15em;
            }
            .wheel-product-price {
                font-size: 1.3em;
            }
             .wheels-showcase-section {
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
        <section class="wheels-showcase-section">
            <div class="wheels-main-title-container">
                <h1 class="wheels-main-title">High-Tech Wheels</h1>
            </div>
            <div class="wheel-products-grid">
                <?php foreach ($wheel_products as $wheel): ?>
                    <div class="wheel-product-card">
                        <img src="<?php echo htmlspecialchars($wheel['image']); ?>" alt="<?php echo htmlspecialchars($wheel['name']); ?>" onerror="this.onerror=null;this.src='https://placehold.co/600x600/cccccc/333333?text=Image+Not+Available';">
                        <div class="wheel-product-info">
                            <span class="brand"><?php echo htmlspecialchars($wheel['brand']); ?></span>
                            <h3><?php echo htmlspecialchars($wheel['name']); ?></h3>
                            <p class="details">
                                <strong>Size:</strong> <?php echo htmlspecialchars($wheel['size']); ?><br>
                                <strong>Finish:</strong> <?php echo htmlspecialchars($wheel['finish']); ?><br>
                                <?php echo htmlspecialchars($wheel['description']); ?>
                            </p>
                            <div class="wheel-product-price">$<?php echo htmlspecialchars($wheel['price']); ?></div>
                            <button type="button" class="add-to-cart-button" onclick="alert('<?php echo htmlspecialchars(addslashes($wheel['name'])); ?> added to cart!')">Add to Cart</button>
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