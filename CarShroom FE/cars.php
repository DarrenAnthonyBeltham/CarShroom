<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Collections - CarShroom</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <style>
        html {
            box-sizing: border-box;
            scroll-behavior: smooth;
        }
        *, *:before, *:after {
            box-sizing: inherit;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: #fff;
        }

        .category-section {
            height: 100vh;
            min-height: 600px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            overflow: hidden;
            color: #fff;
        }
        
        .slideshow-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0;
            transition: opacity 1.2s ease-in-out;
        }

        .slide.active {
            opacity: 1;
        }

        .category-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.2) 40%, rgba(0,0,0,0.85) 100%);
            z-index: 1;
        }
        
        .category-content {
            position: relative;
            z-index: 2;
            padding: 20px;
            animation: fadeIn 1.5s ease-out;
        }
        
        .category-content h2 {
            font-size: clamp(3rem, 8vw, 6rem);
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin: 0;
            text-shadow: 0 4px 15px rgba(0,0,0,0.5);
        }

        .category-content p {
            font-size: clamp(1rem, 2.5vw, 1.25rem);
            font-weight: 300;
            margin: 10px auto 30px auto; 
            max-width: 600px;
            text-shadow: 0 2px 10px rgba(0,0,0,0.7);
        }

        .category-button {
            display: inline-block;
            padding: 14px 32px;
            border: 2px solid #fff;
            border-radius: 50px;
            background-color: transparent;
            color: #fff;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }
        .category-button:hover {
            background-color: #fff;
            color: #000;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .down-arrow {
            position: absolute;
            bottom: 30px;
            left: 0;
            right: 0;
            margin-left: auto;
            margin-right: auto;
            z-index: 3;
            width: 50px;
            height: 50px;
            border: 2px solid rgba(255,255,255,0.7);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: bounce 2s infinite;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }

    </style>
</head>
<body>

    <?php 
        if (file_exists("./inc/navbar.php")) { 
            include "./inc/navbar.php";
        }
    ?>

    <main>
        <section id="hypercars" class="category-section">
            <div class="slideshow-container"></div>
            <div class="category-content">
                <h2>Hypercars</h2>
                <p>The pinnacle of automotive engineering, where performance and technology know no bounds.</p>
                <a href="category/hypercars.php" class="category-button">View Collection</a>
            </div>
            <div class="down-arrow">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 5V19M12 19L7 14M12 19L17 14" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </section>

        <section id="supercars" class="category-section">
            <div class="slideshow-container"></div>
            <div class="category-content">
                <h2>Supercars</h2>
                <p>Experience breathtaking speed, razor-sharp handling, and head-turning design.</p>
                <a href="category/supercars.php" class="category-button">View Collection</a>
            </div>
        </section>

        <section id="suvs" class="category-section">
            <div class="slideshow-container"></div>
            <div class="category-content">
                <h2>SUVs</h2>
                <p>Command the road with unparalleled luxury, space, and all-terrain capability.</p>
                <a href="category/suv.php" class="category-button">View Collection</a>
            </div>
        </section>
        
        <section id="muscle" class="category-section">
            <div class="slideshow-container"></div>
            <div class="category-content">
                <h2>Muscle Cars</h2>
                <p>Pure American power. Iconic designs powered by roaring V8 engines.</p>
                <a href="category/musclecars.php" class="category-button">View Collection</a>
            </div>
        </section>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const categorySlides = {
                hypercars: [
                    'category/assets/hypercars/RimacNevera.jpg',
                    'category/assets/hypercars/SSCTuatara.jpg',
                    'category/assets/hypercars/Porsche918Spyder.webp',
                    'category/assets/hypercars/PaganiHuayraRoadster.webp'
                ],
                supercars: [
                    'category/assets/supercars/FerrariF8Tributo.webp', 
                    'category/assets/supercars/MClaren765LT.jpg',
                    'category/assets/supercars/LamborghiniAventadorSVJ.webp',
                    'category/assets/supercars/Porsche911TurboS.webp'
                ],
                suvs: [
                    'category/assets/suv/AstonMartinDBX707.jpg', 
                    'category/assets/suv/RollsRoyceCullinan.jpg',
                    'category/assets/suv/LexusLX600.jpg',
                    'category/assets/suv/CadillacEscalade-V.jpg'
                ],
                muscle: [
                    'category/assets/musclecars/FordMustangGT500.webp',
                    'category/assets/musclecars/PontiacGTOTheJudge.jpg',
                    'category/assets/musclecars/BuickGNX.jpg',
                    'category/assets/musclecars/ChevroletCamaroZL1.jpg'
                ]
            };

            function initSlideshow(sectionId, imageUrls) {
                const section = document.getElementById(sectionId);
                if (!section) return;

                const slideshowContainer = section.querySelector('.slideshow-container');
                if (!slideshowContainer) return;

                imageUrls.forEach((url, index) => {
                    const slide = document.createElement('div');
                    slide.className = 'slide';
                    slide.style.backgroundImage = `url('${url}')`;
                    slideshowContainer.appendChild(slide);
                });

                const slides = slideshowContainer.querySelectorAll('.slide');
                let currentIndex = 0;
                
                if (slides.length > 0) {
                    slides[currentIndex].classList.add('active');
                }

                setInterval(() => {
                    slides[currentIndex].classList.remove('active');
                    currentIndex = (currentIndex + 1) % slides.length;
                    slides[currentIndex].classList.add('active');
                }, 5500);
            }

            for (const category in categorySlides) {
                initSlideshow(category, categorySlides[category]);
            }
        });
    </script>
</body>
</html>
