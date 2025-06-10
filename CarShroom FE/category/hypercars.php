<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hypercar Collection - CarShroom</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Oswald:wght@400;500;700&display=swap" rel="stylesheet">
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
            background-color: #000;
            color: #fff;
            line-height: 1.7;
            overflow: hidden;
        }
        
        main.car-showcase-container {
            width: 100%;
            height: calc(100vh - 70px);
            overflow-y: scroll;
            scroll-snap-type: y mandatory;
            -ms-overflow-style: none;  
            scrollbar-width: none;  
        }
        
        main.car-showcase-container::-webkit-scrollbar {
            display: none;
        }
        
        .car-section {
            height: 100%;
            width: 100%;
            position: relative;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            text-align: center;
            padding: 40px 20px;
            scroll-snap-align: start;
            flex-shrink: 0;
        }

        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            z-index: -1;
            transform: scale(1.05);
            transition: transform 8s ease-out;
        }
        .car-section.is-visible .background-image {
            transform: scale(1);
        }


        .car-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0,0,0,0.9) 10%, transparent 50%);
        }

        .car-content {
            z-index: 1;
            max-width: 900px;
            margin-bottom: 5vh;
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 1s ease-out 0.4s, transform 1s ease-out 0.4s;
        }
        
        .car-section.is-visible .car-content {
             opacity: 1;
             transform: translateY(0);
        }


        .car-title {
            font-family: 'Oswald', sans-serif;
            font-size: clamp(3rem, 8vw, 6rem);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            line-height: 1;
            text-shadow: 0 4px 20px rgba(0,0,0,0.5);
            margin: 0;
        }
        
        .car-brand {
            font-size: clamp(1rem, 2.5vw, 1.2rem);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 10px;
        }

        .car-description {
            font-size: 1.1rem;
            max-width: 700px;
            margin: 20px auto 30px;
            font-weight: 300;
            color: rgba(255, 255, 255, 0.9);
        }

        .car-specs {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }
        
        .spec-item {
            border-left: 2px solid #e74c3c;
            padding-left: 15px;
        }

        .spec-value {
            font-size: 1.8rem;
            font-weight: 700;
        }

        .spec-label {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.7);
            text-transform: uppercase;
        }

        .cta-button {
            display: inline-block;
            padding: 14px 32px;
            border: 2px solid #fff;
            background-color: transparent;
            color: #fff;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }
        .cta-button:hover {
            background-color: #fff;
            color: #000;
        }
        
        .side-navigation {
            position: fixed;
            top: 50%;
            right: 30px;
            transform: translateY(-50%);
            z-index: 100;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .nav-dot {
            width: 12px;
            height: 12px;
            background-color: rgba(255, 255, 255, 0.4);
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }
        .nav-dot:hover {
            background-color: rgba(255, 255, 255, 0.8);
            transform: scale(1.2);
        }
        .nav-dot.active {
            background-color: #fff;
            transform: scale(1.4);
        }
    </style>
</head>
<body>

    <?php 
        if (file_exists("../inc/navbar.php")) { 
            include "../inc/navbar.php";
        }
        
        $hypercars = [
            [
                'id' => 'hennessey',
                'brand' => 'Hennessey',
                'name' => 'Venom F5',
                'description' => 'An American-built hypercar engineered to be the absolute fastest road car on earth, targeting speeds beyond 300 mph.',
                'image' => 'assets/hypercars/VenomF5.jpeg',
                'specs' => [
                    'HP' => '1,817',
                    '0-60' => '< 2.6s',
                    'Top Speed' => '311+ mph'
                ]
            ],
            [
                'id' => 'ferrari',
                'brand' => 'Ferrari',
                'name' => 'LaFerrari',
                'description' => 'The definitive hybrid hypercar, combining a V12 with F1-derived KERS technology for instantaneous, breathtaking performance.',
                'image' => 'assets/hypercars/LaFerrari.webp',
                'specs' => [
                    'HP' => '950',
                    '0-60' => '< 3.0s',
                    'Top Speed' => '217+ mph'
                ]
            ],
            [
                'id' => 'astonmartin',
                'brand' => 'Aston Martin',
                'name' => 'Valkyrie',
                'description' => 'A road-legal masterpiece co-developed with Red Bull Advanced Technologies, delivering a true Formula 1 experience.',
                'image' => 'assets/hypercars/AstonMartinValk.jpg',
                'specs' => [
                    'HP' => '1,160',
                    '0-60' => '2.5s',
                    'Top Speed' => '250 mph'
                ]
            ],
        ];
    ?>
    
    <nav class="side-navigation" id="sideNav">
        <?php foreach($hypercars as $car): ?>
            <a href="#<?php echo htmlspecialchars($car['id']); ?>" class="nav-dot" data-target="<?php echo htmlspecialchars($car['id']); ?>"></a>
        <?php endforeach; ?>
    </nav>
    
    <main class="car-showcase-container">
        <?php foreach($hypercars as $car): ?>
            <section id="<?php echo htmlspecialchars($car['id']); ?>" class="car-section">
                <div class="background-image" style="background-image: url('<?php echo htmlspecialchars($car['image']); ?>');"></div>
                <div class="car-content">
                    <p class="car-brand"><?php echo htmlspecialchars($car['brand']); ?></p>
                    <h1 class="car-title"><?php echo htmlspecialchars($car['name']); ?></h1>
                    <p class="car-description"><?php echo htmlspecialchars($car['description']); ?></p>
                    <div class="car-specs">
                        <div class="spec-item">
                            <div class="spec-value"><?php echo htmlspecialchars($car['specs']['HP']); ?></div>
                            <div class="spec-label">Horsepower</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-value"><?php echo htmlspecialchars($car['specs']['0-60']); ?></div>
                            <div class="spec-label">0-60 MPH</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-value"><?php echo htmlspecialchars($car['specs']['Top Speed']); ?></div>
                            <div class="spec-label">Top Speed</div>
                        </div>
                    </div>
                    <a href="../contact.php" class="cta-button">Inquire Now</a>
                </div>
            </section>
        <?php endforeach; ?>
    </main>

    <?php 
        if (file_exists("../inc/footer.php")) { 
            include "../inc/footer.php";
        }
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sections = document.querySelectorAll('.car-section');
            const navDots = document.querySelectorAll('.nav-dot');

            const observerOptions = {
                root: document.querySelector('.car-showcase-container'),
                rootMargin: '0px',
                threshold: 0.6 
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    const sectionId = entry.target.id;
                    const correspondingDot = document.querySelector(`.nav-dot[data-target="${sectionId}"]`);
                    
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        if (correspondingDot) {
                            navDots.forEach(dot => dot.classList.remove('active'));
                            correspondingDot.classList.add('active');
                        }
                    } else {
                         entry.target.classList.remove('is-visible');
                    }
                });
            }, observerOptions);

            sections.forEach(section => {
                observer.observe(section);
            });
        });
    </script>
</body>
</html>
