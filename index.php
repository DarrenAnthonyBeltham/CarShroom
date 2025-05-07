<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarShroom</title>
</head>
<body>
    <?php include "inc/navbar.php" ?>

    <style>
        .carousel-container {
            position: relative;
            max-width: 1024px;
            margin: 30px auto;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            height: 300px;
        }
        
        .carousel {
            display: flex;
            width: 400%;
            height: 300px;
            transition: transform 0.5s ease-in-out;
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
            bottom: 0;
            left: 0;
            padding: 20px;
            color: white;
            width: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
        }
        
        .slide-content h2 {
            font-size: 24px;
            margin-bottom: 5px;
        }
        
        .slide-content p {
            font-size: 18px;
        }
        
        .nav-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            border-radius: 50%;
            font-size: 24px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: background-color 0.3s;
        }
        
        .nav-button:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }
        
        .prev {
            left: 10px;
        }
        
        .next {
            right: 10px;
        }
        
        .dots-container {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
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
        
        @media (max-width: 768px) {
            .carousel-container {
                height: 250px;
            }
            
            .carousel {
                height: 250px;
            }
            
            .slide-content h2 {
                font-size: 20px;
            }
            
            .slide-content p {
                font-size: 16px;
            }
        }
        
        @media (max-width: 480px) {
            .carousel-container {
                height: 200px;
            }
            
            .carousel {
                height: 200px;
            }
            
            .slide-content h2 {
                font-size: 18px;
            }
            
            .slide-content p {
                font-size: 14px;
            }
            
            .nav-button {
                width: 40px;
                height: 40px;
                font-size: 18px;
            }
        }
    </style>

    <div class="carousel-container">
        <div class="carousel">
            <div class="slide" style="background-image: url('assets/Brabus 911.jpg')">
                <div class="slide-content">
                    <h2>Porsche GT 911</h2>
                    <p>Discover your dream</p>
                </div>
            </div>
            
            <div class="slide" style="background-image: url('https://via.placeholder.com/1024x300/1c7d54/ffffff?text=Jaguar+C+X75')">
                <div class="slide-content">
                    <h2>Jaguar C X75</h2>
                    <p>The jaguar is shinin'</p>
                </div>
            </div>
            
            <div class="slide" style="background-image: url('https://via.placeholder.com/1024x300/222222/ffffff?text=AMG+GT+63+PRO')">
                <div class="slide-content">
                    <h2>AMG GT 63 PRO</h2>
                    <p>Power, Precision, Luxury, Speed.</p>
                </div>
            </div>
            
            <div class="slide" style="background-image: url('https://via.placeholder.com/1024x300/eeeeee/333333?text=Ferrari+458+Italia')">
                <div class="slide-content">
                    <h2>Ferrari 458 Italia</h2>
                    <p>White horse is reignin the Kingdom</p>
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
            
            function updateCarousel() {
                carousel.style.transform = `translateX(-${currentIndex * 25}%)`;
                
                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentIndex);
                });
            }
            
            nextButton.addEventListener('click', function() {
                currentIndex = (currentIndex + 1) % totalSlides;
                updateCarousel();
            });
            
            prevButton.addEventListener('click', function() {
                currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                updateCarousel();
            });
            
            dots.forEach((dot, index) => {
                dot.addEventListener('click', function() {
                    currentIndex = index;
                    updateCarousel();
                });
            });
            
            setInterval(function() {
                currentIndex = (currentIndex + 1) % totalSlides;
                updateCarousel();
            }, 5000);
            
            updateCarousel();
        });
    </script>
</body>
</html>