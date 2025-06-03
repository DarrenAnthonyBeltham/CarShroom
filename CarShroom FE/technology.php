<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technology - In-House Solutions - CarShroom</title>
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
            background-color: #ffffff;
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
        
        .technology-showcase-section {
            padding: 40px 20px;
            max-width: 900px; 
            margin: 0 auto;
        }

        .technology-main-title-container {
            text-align: left; 
            margin-bottom: 40px; 
        }
        
        .technology-main-title {
            font-family: 'Space Mono', monospace;
            font-size: 1.8em; 
            font-weight: 700;
            text-transform: uppercase;
            color: #000000;
            letter-spacing: 1px;
            line-height: 1.4;
        }

        .technology-parts-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr); 
            gap: 30px; 
        }

        .technology-part-item {
            position: relative;
            overflow: hidden;
            border-radius: 0px; 
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: #e9e9e9;
        }
        .technology-part-item:hover {
            transform: translateY(-5px); 
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }

        .technology-part-item img {
            width: 100%;
            height: 320px; 
            object-fit: cover;
            display: block;
            transition: transform 0.3s ease;
        }
         .technology-part-item:hover img {
            transform: scale(1.05); 
         }

        .technology-part-title {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.6) 40%, transparent 100%);
            color: #ffffff;
            padding: 20px 15px 15px 15px; 
            font-family: 'Space Mono', monospace;
            font-size: 1em;
            font-weight: 700;
            text-align: left;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        @media (max-width: 768px) { 
            .technology-main-title-container {
                text-align: center;
                margin-bottom: 30px;
            }
            .technology-main-title {
                font-size: 1.6em;
            }
             .technology-parts-grid {
                grid-template-columns: 1fr;
                gap: 25px;
            }
            .technology-part-item img {
                height: 280px; 
            }
        }

        @media (max-width: 480px) {
            .technology-main-title {
                font-size: 1.4em;
            }
            .technology-part-item img {
                height: 250px;
            }
            .technology-part-title {
                font-size: 0.9em;
                padding: 15px 10px 10px 10px;
            }
             .technology-showcase-section {
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
        if (file_exists("inc/navbar.php")) {
            include "inc/navbar.php";
        }
    ?>

    <main>
        <section class="technology-showcase-section">
            <div class="technology-main-title-container">
                <h1 class="technology-main-title">IN-HOUSE SOLUTIONS<br>FOR THE VISIONARY</h1>
            </div>
            <div class="technology-parts-grid">
                <a href="technologys/wheels.php" class="technology-part-item" title="High-Tech Wheels">
                    <img src="./assets/Lambo Wheels.jpg">
                    <div class="technology-part-title">HIGH-TECH WHEELS</div>
                </a>
                <a href="technologys/engine.php" class="technology-part-item" title="Engine and Powertrains">
                    <img src="./assets/V12 Engine.jpg" alt="Engine and Powertrains">
                    <div class="technology-part-title">ENGINE AND POWERTRAINS</div>
                </a>
                <a href="technologys/interior.php" class="technology-part-item" title="Luxury Interiors">
                    <img src="./assets/Rolls Royce Interior.jpg" alt="Luxury Interiors">
                    <div class="technology-part-title">LUXURY INTERIORS</div>
                </a>
                <a href="technologys/brake.php" class="technology-part-item" title="Brake Performance">
                    <img src="./assets/Brake.jpg" alt="Brake Performance">
                    <div class="technology-part-title">BRAKE PERFORMANCE</div>
                </a>
                <a href="technologys/wings.php" class="technology-part-item" title="Aerodynamic Wings">
                    <img src="./assets/CarWings.jpg" alt="Aerodynamic Wings">
                    <div class="technology-part-title">Aerodynamic Wings</div>
                </a>
                <a href="technologys/bumper.php" class="technology-part-item" title="Performance Bumper">
                    <img src="./assets/Bumper.jpg" alt="Performance Bumper">
                    <div class="technology-part-title">Performance Bumper</div>
                </a>
            </div>
        </section>
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
