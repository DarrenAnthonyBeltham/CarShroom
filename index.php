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
        
        .prev {
            left: 30px;
        }
        
        .next {
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
        
        @media (max-width: 768px) {
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
        
        @media (max-width: 480px) {
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
            
            .nav-button {
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
        
        <button class="nav-button prev">&#10094;</button>
        <button class="nav-button next">&#10095;</button>
        
        <div class="dots-container">
            <div class="dot active"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const carousel = document.querySelector('.carousel');
            const slides = document.querySelectorAll('.slide');
            const dots = document.querySelectorAll('.dot');
            const prevButton = document.querySelector('.prev');
            const nextButton = document.querySelector('.next');
            
            let currentIndex = 0;
            const totalSlides = slides.length;
            let autoplayInterval;
            
            function updateCarousel() {
                carousel.style.transform = `translateX(-${currentIndex * 25}%)`;
                
                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentIndex);
                });
            }
            
            function startAutoplay() {
                stopAutoplay(); 
                autoplayInterval = setInterval(function() {
                    currentIndex = (currentIndex + 1) % totalSlides;
                    updateCarousel();
                }, 5000);
            }
            
            function stopAutoplay() {
                if (autoplayInterval) {
                    clearInterval(autoplayInterval);
                }
            }
            
            nextButton.addEventListener('click', function() {
                currentIndex = (currentIndex + 1) % totalSlides;
                updateCarousel();
                startAutoplay(); 
            });
            
            prevButton.addEventListener('click', function() {
                currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                updateCarousel();
                startAutoplay(); 
            });
            
            dots.forEach((dot, index) => {
                dot.addEventListener('click', function() {
                    currentIndex = index;
                    updateCarousel();
                    startAutoplay(); 
                });
            });
            
            carousel.addEventListener('mouseenter', stopAutoplay);
            carousel.addEventListener('mouseleave', startAutoplay);
            

            startAutoplay();
            updateCarousel();
        });
    </script>
</body>
</html>