<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarShroom</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            overflow-x: hidden;
        }
        
        .carousel-container {
            position: relative;
            width: 100vw;
            height: 500px;
            overflow: hidden;
        }
        
        .carousel {
            display: flex;
            width: 400%;
            height: 100%;
            transition: transform 0.8s ease-in-out;
        }
        
        .slide {
            cursor: pointer;
            position: relative;
            width: 25%;
            height: 100%;
            background-size: cover;
            background-position: center;
        }
        
        .slide-content {
            position: absolute;
            bottom: 15%;
            left: 10%;
            color: #fff !important;
            max-width: 60%;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5); 
        }

        .slide-content h3 {
            font-size: 1.5rem;
            text-transform: uppercase;
            margin-bottom: 10px;
            font-weight: 500;
            color: #fff !important;
            opacity: 1 !important;
        }

        .slide-content h2 {
            font-size: 3rem;
            margin-bottom: 15px;
            font-weight: 700;
            color: #fff !important;
            opacity: 1 !important;
        }

        .slide-content p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: #fff !important;
            opacity: 1 !important;
        }
        
        .nav-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            background-color: rgba(0, 0, 0, 0.3);
            color: white;
            border: none;
            border-radius: 50%;
            font-size: 24px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: background-color 0.3s;
            z-index: 10;
        }
        
        .nav-button:hover {
            background-color: rgba(0, 0, 0, 0.6);
        }
        
        .carousel-container > .prev {
            left: 30px;
        }
        
        .carousel-container > .next {
            right: 30px;
        }
        
        .dots-container {
            position: absolute;
            bottom: 8%;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
            z-index: 10;
        }
        
        .dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .dot.active {
            background-color: rgba(255, 255, 255, 1);
        }
        
        .slide::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .news-carousel-container {
            width: 100%;
            position: relative;
            padding: 50px 0;
            overflow: hidden;
        }
        
        .news-carousel {
            display: flex;
            width: 300%; 
            transition: transform 0.5s ease;
        }
        
        .news-slide {
            width: calc(100% / 3); 
            display: flex;
            padding: 0 10%;
            align-items: center;
        }
        
        .news-content {
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-right: 50px;
        }
        
        .news-image {
            width: 50%;
            overflow: hidden;
        }
        
        .news-image img {
            width: 290px;
            height: 420px;
            object-fit: cover;
        }
        
        .news-title {
            font-family: 'Space Mono', monospace;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.2;
        }
        
        .news-description {
            font-family: 'Montserrat Alternates', sans-serif;
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        
        .read-more {
            font-family: 'Space Mono', monospace;
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            color: #000;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 20px;
        }
        
        .read-more .circle {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            border: 1px solid #000;
            border-radius: 50%;
            margin-left: 10px;
        }
        
        .news-carousel-container .navigation {
            display: flex;
            justify-content: space-between;
            position: absolute;
            width: 100%;
            top: 50%;
            transform: translateY(-50%);
            padding: 0 5%; 
            z-index: 10;
        }
        
        .news-carousel-container .navigation .nav-button {
            position: static; 
            transform: none; 
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            padding: 10px;
            color: #000; 
            width: auto; 
            height: auto;
            border-radius: 0;
        }
        
        .indicators {
            display: flex;
            gap: 10px;
        }
        
        .indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: 1px solid #000;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .indicator.active {
            background-color: #000;
        }
        
        .view-all {
            display: inline-block;
            font-family: 'Space Mono', monospace;
            text-decoration: none;
            color: #000;
            margin-left: 15px; 
            padding-left: 15px; 
            border-left: 1px solid #999;
        }

        @media screen and (max-width: 992px) {
            .news-slide {
                flex-direction: column;
                padding: 0 5%;
            }
            
            .news-content, .news-image {
                width: 100%;
            }
            
            .news-content {
                padding-right: 0;
                margin-bottom: 30px;
            }
            
            .news-title {
                font-size: 2rem;
            }
        }
        
        @media screen and (max-width: 768px) {
            .slide-content h3 {
                font-size: 1.2rem;
            }
            
            .slide-content h2 {
                font-size: 2rem;
            }
            
            .slide-content p {
                font-size: 1rem;
            }
        }
        
        @media screen and (max-width: 480px) {
            .slide-content {
                left: 5%;
                max-width: 90%;
            }
            
            .slide-content h3 {
                font-size: 1rem;
            }
            
            .slide-content h2 {
                font-size: 1.5rem;
            }
            
            .nav-button { /* Affects first carousel buttons too */
                width: 40px;
                height: 40px;
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
    <?php include "inc/navbar.php" ?>

    <div class="carousel-container">
        <div class="carousel">
            <div class="slide" style="background-image: url('assets/Brabus 911.jpg')">
                <div class="slide-content">
                    <h3>Porsche GT 911</h3>
                    <h2>Discover your dream</h2>
                    <p>Experience unparalleled performance and iconic design</p>
                </div>
            </div>
            
            <div class="slide" style="background-image: url('assets/the-jaguar-c-x75-is-finally-a-fully-finished-vx-1440x900.jpg')">
                <div class="slide-content">
                    <h3>Jaguar C X75</h3>
                    <h2>The jaguar is shinin'</h2>
                    <p>Elegance meets raw power in this exclusive masterpiece</p>
                </div>
            </div>
            
            <div class="slide" style="background-image: url('assets/AMG GT 63 Pro.jpeg')">
                <div class="slide-content">
                    <h3>AMG GT 63 PRO</h3>
                    <h2>Power, Precision, Luxury, Speed.</h2>
                    <p>Dominate the road with German engineering excellence</p>
                </div>
            </div>
            
            <div class="slide" style="background-image: url('assets/White Ferrari.jpg')">
                <div class="slide-content">
                    <h3>Ferrari 458 Italia</h3>
                    <h2>White horse is reignin the Kingdom</h2>
                    <p>Italian craftsmanship that defines automotive perfection</p>
                </div>
            </div>
        </div>
        
        <button class="nav-button prev">❮</button>
        <button class="nav-button next">❯</button>
        
        <div class="dots-container">
            <div class="dot active"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>

    <div class="news-carousel-container">
        <div class="navigation">
            <button class="nav-button prev">❮</button>
            <button class="nav-button next">❯</button>
        </div>
        
        <div class="news-carousel">
            <div class="news-slide">
                <div class="news-content">
                    <h2 class="news-title">Delivering on A singular Vision</h2>
                    <div class="news-description">
                        On August 12, 1994, a 22-year-old Christian von Koenigsegg decided to follow his dream and build the world's greatest sports car. Koenigsegg Automotive is born
                    </div>
                    <a href="#" class="read-more">
                        READ MORE
                        <span class="circle">→</span>
                    </a>
                </div>
                <div class="news-image">
                    <img src="assets/Koenigsegg news.png" alt="Koenigsegg car">
                </div>
            </div>
            
            <div class="news-slide">
                <div class="news-content">
                    <h2 class="news-title">TAILOR MADE FOR THE HAND</h2>
                    <div class="news-description">
                    The Maranello Clutch shifts Ferrari fashion accessories into high gear. As with the Tailor Made programme for its cars, the brand’s clients can now personalise their handbags, choosing from a vast selection of colours and materialsh.
                    </div>
                    <a href="#" class="read-more">
                        READ MORE
                        <span class="circle">→</span>
                    </a>
                </div>
                <div class="news-image">
                    <img src="assets/Ferrari maranello clutch.jpg" alt="Ferrari Maranello Clutch">
                </div>
            </div>
            
            <div class="news-slide">
                <div class="news-content">
                    <h2 class="news-title">Revuelto Opera Unica at Lamborghini Esperienza Arte Shanghai</h2>
                    <div class="news-description">
                        Automobili Lamborghini unveiled Revuelto Opera Unica, during the Lamborghini Esperienza Arte event in Shanghai.
                    </div>
                    <a href="#" class="read-more">
                        READ MORE
                        <span class="circle">→</span>
                    </a>
                </div>
                <div class="news-image">
                    <img src="assets/Revuelto opera shanghai.jpg" alt="Lamborghini Revuelto Opera Shanghai">
                </div>
            </div>
        </div>
        
        <div style="display: flex; align-items: center; justify-content: center; margin-top: 30px;">
        <div class="indicators">
            <div class="indicator active"></div>
            <div class="indicator"></div>
            <div class="indicator"></div>
        </div>
        <a href="#" class="view-all">View All News</a>
    </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mainCarouselElement = document.querySelector('.carousel-container .carousel');
            const mainSlides = document.querySelectorAll('.carousel-container .slide');
            const mainDots = document.querySelectorAll('.carousel-container .dot');
            const mainPrevButton = document.querySelector('.carousel-container > .prev');
            const mainNextButton = document.querySelector('.carousel-container > .next');
            
            let mainCurrentIndex = 0;
            const mainTotalSlides = mainSlides.length;
            let mainAutoplayInterval;
            
            function updateMainCarousel() {
                mainCarouselElement.style.transform = `translateX(-${mainCurrentIndex * (100 / mainTotalSlides)}%)`;
                mainDots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === mainCurrentIndex);
                });
            }
            
            function startMainAutoplay() {
                stopMainAutoplay(); 
                mainAutoplayInterval = setInterval(function() {
                    mainCurrentIndex = (mainCurrentIndex + 1) % mainTotalSlides;
                    updateMainCarousel();
                }, 5000);
            }
            
            function stopMainAutoplay() {
                if (mainAutoplayInterval) {
                    clearInterval(mainAutoplayInterval);
                }
            }
            
            if (mainNextButton && mainPrevButton && mainCarouselElement && mainSlides.length > 0 && mainDots.length > 0) {
                mainNextButton.addEventListener('click', function() {
                    mainCurrentIndex = (mainCurrentIndex + 1) % mainTotalSlides;
                    updateMainCarousel();
                    startMainAutoplay(); 
                });
                
                mainPrevButton.addEventListener('click', function() {
                    mainCurrentIndex = (mainCurrentIndex - 1 + mainTotalSlides) % mainTotalSlides;
                    updateMainCarousel();
                    startMainAutoplay(); 
                });
                
                mainDots.forEach((dot, index) => {
                    dot.addEventListener('click', function() {
                        mainCurrentIndex = index;
                        updateMainCarousel();
                        startMainAutoplay(); 
                    });
                });
                
                mainCarouselElement.addEventListener('mouseenter', stopMainAutoplay);
                mainCarouselElement.addEventListener('mouseleave', startMainAutoplay);
                
                startMainAutoplay();
                updateMainCarousel();
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const newsCarouselContainer = document.querySelector('.news-carousel-container');
            const newsCarousel = newsCarouselContainer.querySelector('.news-carousel');
            const newsSlides = newsCarouselContainer.querySelectorAll('.news-slide');
            const newsIndicators = newsCarouselContainer.querySelectorAll('.indicators .indicator');
            const newsNavigation = newsCarouselContainer.querySelector('.navigation');
            const newsPrevButton = newsNavigation.querySelector('.prev');
            const newsNextButton = newsNavigation.querySelector('.next');
            
            let newsCurrentIndex = 0;
            const newsTotalSlides = newsSlides.length;
            
            function updateNewsCarousel() {
                if (newsTotalSlides > 0) {
                    const slideWidthPercentage = 100 / newsTotalSlides;
                    newsCarousel.style.transform = `translateX(-${newsCurrentIndex * slideWidthPercentage}%)`;
                }
                newsIndicators.forEach((indicator, index) => {
                    indicator.classList.toggle('active', index === newsCurrentIndex);
                });
            }
            
            if (newsPrevButton && newsNextButton && newsCarousel && newsSlides.length > 0 && newsIndicators.length > 0) {
                newsNextButton.addEventListener('click', function() {
                    newsCurrentIndex = (newsCurrentIndex + 1) % newsTotalSlides;
                    updateNewsCarousel();
                });
                
                newsPrevButton.addEventListener('click', function() {
                    newsCurrentIndex = (newsCurrentIndex - 1 + newsTotalSlides) % newsTotalSlides;
                    updateNewsCarousel();
                });
                
                newsIndicators.forEach((indicator, index) => {
                    indicator.addEventListener('click', function() {
                        newsCurrentIndex = index;
                        updateNewsCarousel();
                    });
                });
                updateNewsCarousel(); 
            }
        });
    </script>
</body>
</html>