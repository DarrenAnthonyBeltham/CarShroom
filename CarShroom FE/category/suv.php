<?php
$cars = [
    [
        'image' => '../assets/1-Mercedes-G-Class-review.jpg',
        'title' => 'Brabus Mercedes-Benz G63',
        'description' => 'The Brabus Mercedes-Benz G63 is an extensively tuned version of the AMG G63, featuring a handcrafted 4.5-liter twin-turbo V8 producing over 850 horsepower, bespoke aerodynamic enhancements, and a bespoke luxury interior with premium leather and carbon-fiber accents.',
        'alt_text' => 'Brabus Mercedes-Benz G63'
    ],
    [
        'image' => '../assets/Toyota Land Cruiser.jpeg',
        'title' => 'Toyota Land Cruiser',
        'description' => 'The Toyota Land Cruiser is a legendary off-road SUV powered by a 5.7-liter V8 engine producing 381 horsepower, known for its bulletproof reliability, full-time 4WD system, advanced crawl control, and a refined interior with premium materials for long-distance comfort.',
        'alt_text' => 'Toyota Land Cruiser'
    ],
    [
        'image' => '../assets/Hamann Porsche Macan.jpg',
        'title' => 'Hamann Porsche Macan',
        'description' => 'The Hamann Porsche Macan is a factory-modified performance SUV based on the Macan S, upgraded with a high-flow exhaust, ECU remap for approximately 380 horsepower, a bespoke wide-body kit, lowered sport suspension, and custom forged wheels for enhanced handling and aggressive styling.',
        'alt_text' => 'Hamann Porsche Macan'
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Listings</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa; 
            color: #333;
            line-height: 1.6;
        }

        .page-container {
            max-width: 900px; 
            margin: 20px auto; 
            padding: 0 15px; 
        }

        .car-card {
            background-color: #ffffff; 
            border-radius: 8px; 
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); 
            margin-bottom: 30px; 
            overflow: hidden; 
            display: grid;
            grid-template-columns: 2fr 3fr; 
            gap: 0px; 
        }

        .car-image-container {
            overflow: hidden; 
        }

        .car-image-container img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover; 
        }

        .car-info {
            padding: 25px 30px; 
            display: flex;
            flex-direction: column;
            justify-content: space-between; 
        }
        
        .car-info-main {
        }

        .car-title {
            font-size: 1.75em; 
            font-weight: 700; 
            color: #2d3748; 
            margin-bottom: 12px;
        }

        .car-description {
            font-size: 0.95em;
            color: #4a5568; 
            margin-bottom: 20px; 
            line-height: 1.7;
        }

        .car-actions-container {
            display: flex;
            flex-direction: column; 
            align-items: flex-end; 
            gap: 12px; 
            margin-top: auto; 
        }

        .order-now {
            background-color: #2d3748; 
            color: #ffffff; 
            border: none;
            padding: 12px 25px; 
            border-radius: 4px; 
            font-size: 0.9em;
            font-weight: 600;
            cursor: pointer;
            text-align: center;
            min-width: 180px; 
            transition: background-color 0.2s ease;
        }

        .order-now:hover {
            background-color: #1a202c; 
        }

        .keep-informed {
            color: #4a5568; 
            text-decoration: none;
            font-size: 0.9em;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .keep-informed:hover {
            color: #2d3748; 
            text-decoration: underline;
        }

        /* Modal Styles */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1000; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgba(0,0,0,0.6); 
        }

        .modal-content {
            background-color: #fefefe;
            margin: 10% auto; 
            padding: 25px 35px;
            border: 1px solid #ddd;
            width: 80%; 
            max-width: 600px; 
            border-radius: 8px;
            position: relative;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        .modal-close-button {
            color: #aaa;
            float: right; /* Old way, using absolute positioning is better */
            font-size: 28px;
            font-weight: bold;
            position: absolute;
            top: 10px;
            right: 20px;
        }

        .modal-close-button:hover,
        .modal-close-button:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        #modalCarTitle {
            margin-top: 0;
            margin-bottom: 20px;
            color: #2d3748;
            font-size: 1.6em;
            font-weight: 600;
        }

        #modalCustomizationOptions label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
            margin-top: 15px;
        }
        #modalCustomizationOptions select {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
            font-size: 0.95em;
        }
        .color-swatches {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
            flex-wrap: wrap;
        }
        .color-swatches span {
            display: inline-block;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            cursor: pointer;
            border: 3px solid transparent;
            transition: border-color 0.2s, transform 0.2s;
        }
        .color-swatches span:hover {
            transform: scale(1.1);
        }
        .color-swatches span.selected {
            border-color: #007bff; /* Highlight selected color */
            box-shadow: 0 0 8px rgba(0,123,255,0.5);
        }

        .modal-order-button {
            background-color: #28a745; 
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
            font-weight: 500;
            display: block;
            margin-top: 25px;
            min-width: 150px;
            text-align: center;
            transition: background-color 0.2s ease;
        }
        .modal-order-button:hover {
            background-color: #218838;
        }

        /* Custom Message Box Styles */
        .message-box {
            position: fixed;
            z-index: 2000; /* Higher than modal */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            display: flex; /* Used to center content */
            align-items: center;
            justify-content: center;
        }
        .message-box-content {
            background-color: #fff;
            padding: 25px 35px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            text-align: center;
            min-width: 320px;
            max-width: 90%;
        }
        #messageBoxText {
            margin-bottom: 20px;
            font-size: 1.1em;
            line-height: 1.5;
            color: #333;
        }
        #messageBoxOkButton {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.2s ease;
        }
        #messageBoxOkButton:hover {
            background-color: #0056b3;
        }


        @media (max-width: 768px) {
            .car-card {
                grid-template-columns: 1fr; 
            }

            .car-image-container img {
                max-height: 280px; 
            }

            .car-info {
                padding: 20px;
            }

            .car-title {
                font-size: 1.5em;
            }

            .car-description {
                font-size: 0.9em;
            }
            
            .car-actions-container {
                align-items: stretch; 
                width: 100%;
            }

            .order-now {
                 width: 100%; 
                 padding: 12px 15px;
            }

            .keep-informed {
                text-align: center; 
                margin-top: 4px; 
            }
            .modal-content {
                margin: 20% auto;
                padding: 20px;
                width: 90%;
            }
            #modalCarTitle {
                font-size: 1.3em;
            }
        }

        @media (max-width: 480px) {
            .car-title {
                font-size: 1.3em;
            }
            .car-info {
                padding: 15px;
            }
            .modal-content {
                margin: 25% auto;
                padding: 15px;
            }
             #modalCarTitle {
                font-size: 1.2em;
            }
            .color-swatches span {
                width: 30px;
                height: 30px;
            }
        }

    </style>
</head>
<body>
    <?php 
    if (file_exists(__DIR__ . '/../inc/navbar.php')) {
        include __DIR__ . '/../inc/navbar.php'; 
    } else {
    }
    ?>

    <div class="page-container">
        <?php foreach ($cars as $car): ?>
            <div class="car-card">
                <div class="car-image-container">
                    <img src="<?php echo htmlspecialchars($car['image']); ?>" alt="<?php echo htmlspecialchars($car['alt_text']); ?>" onerror="this.onerror=null;this.src='https://placehold.co/800x600/cccccc/ffffff?text=Image+Not+Found';">
                </div>
                <div class="car-info">
                    <div class="car-info-main"> 
                        <h2 class="car-title"><?php echo htmlspecialchars($car['title']); ?></h2>
                        <p class="car-description"><?php echo htmlspecialchars($car['description']); ?></p>
                    </div>
                    <div class="car-actions-container">
                        <button class="order-now">Order Now</button>
                        <a href="#" class="keep-informed">&gt; Keep me informed</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php 
    if (file_exists(__DIR__ . '/../inc/news.php')) {
        include __DIR__ . '/../inc/news.php'; 
    }
    ?>

    <?php 
    if (file_exists(__DIR__ . '/../inc/footer.php')) {
        include __DIR__ . '/../inc/footer.php'; 
    }
    ?>

    <div id="customizationModal" class="modal">
        <div class="modal-content">
            <span class="modal-close-button">&times;</span>
            <h3 id="modalCarTitle">Customize Car</h3>
            <div id="modalCustomizationOptions">
                <div>
                    <label for="color-select">Choose Color:</label>
                    <div class="color-swatches">
                        <span style="background-color: #DC143C;" data-color="Crimson Red" title="Crimson Red"></span>
                        <span style="background-color: #00008B;" data-color="Dark Blue" title="Dark Blue"></span>
                        <span style="background-color: #000000;" data-color="Gloss Black" title="Gloss Black"></span>
                        <span style="background-color: #C0C0C0;" data-color="Silver Metallic" title="Silver Metallic"></span>
                        <span style="background-color: #FFD700;" data-color="Gold" title="Gold"></span>
                        <span style="background-color: #F5F5F5; border: 1px solid #ddd;" data-color="Pearl White" title="Pearl White"></span>
                    </div>
                </div>
                <div>
                    <label for="wheel-select">Choose Wheels:</label>
                    <select id="wheel-select" name="wheels">
                        <option value="standard_alloy">Standard Alloy</option>
                        <option value="sport_rims_black">Sport Rims (Black)</option>
                        <option value="carbon_fiber_elite">Carbon Fiber Elite</option>
                        <option value="vintage_spoke">Vintage Spoke</option>
                    </select>
                </div>
                <div>
                    <label for="interior-select">Interior Trim:</label>
                    <select id="interior-select" name="interior">
                        <option value="leather_black">Black Leather</option>
                        <option value="alcantara_red_stitching">Alcantara (Red Stitching)</option>
                        <option value="wood_grain_classic">Wood Grain Classic</option>
                        <option value="carbon_fiber_sport">Carbon Fiber Sport</option>
                    </select>
                </div>
            </div>
            <button class="modal-order-button">Confirm Customization</button>
        </div>
    </div>

    <div id="customMessageBox" class="message-box" style="display:none;">
        <div class="message-box-content">
            <p id="messageBoxText"></p>
            <button id="messageBoxOkButton">OK</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('customizationModal');
            const openModalButtons = document.querySelectorAll('.order-now');
            const closeModalButton = modal.querySelector('.modal-close-button');
            const modalCarTitle = document.getElementById('modalCarTitle');
            const modalCustomizationOptions = document.getElementById('modalCustomizationOptions');
            const modalOrderButton = modal.querySelector('.modal-order-button');
            const messageBox = document.getElementById('customMessageBox');
            const messageBoxText = document.getElementById('messageBoxText');
            const messageBoxOkButton = document.getElementById('messageBoxOkButton');

            function showCustomMessage(message) {
                messageBoxText.innerHTML = message.replace(/\\n/g, '<br>');
                messageBox.style.display = 'flex';
            }

            if (messageBoxOkButton) {
                messageBoxOkButton.addEventListener('click', function() {
                    messageBox.style.display = 'none';
                });
            }
            
            openModalButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const carCard = this.closest('.car-card');
                    const carTitleText = carCard.querySelector('.car-title').textContent;
                    
                    modalCarTitle.textContent = 'Customize: ' + carTitleText;
                    
                    modalCustomizationOptions.querySelectorAll('.color-swatches span.selected').forEach(s => s.classList.remove('selected'));
                    modalCustomizationOptions.querySelector('#wheel-select').selectedIndex = 0;
                    modalCustomizationOptions.querySelector('#interior-select').selectedIndex = 0;

                    modal.style.display = 'block';
                });
            });

            if (closeModalButton) {
                closeModalButton.addEventListener('click', function() {
                    modal.style.display = 'none';
                });
            }

            window.addEventListener('click', function(event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
                if (event.target == messageBox) { 
                    messageBox.style.display = 'none';
                }
            });

            modalCustomizationOptions.querySelectorAll('.color-swatches span').forEach(swatch => {
                swatch.addEventListener('click', function() {
                    modalCustomizationOptions.querySelectorAll('.color-swatches span.selected').forEach(s => s.classList.remove('selected'));
                    this.classList.add('selected');
                });
            });

            if (modalOrderButton) {
                modalOrderButton.addEventListener('click', function() {
                    const selectedColorSwatch = modalCustomizationOptions.querySelector('.color-swatches span.selected');
                    const selectedColor = selectedColorSwatch ? selectedColorSwatch.dataset.color : 'Not selected';
                    const selectedWheels = modalCustomizationOptions.querySelector('#wheel-select').value;
                    const selectedInterior = modalCustomizationOptions.querySelector('#interior-select').value;
                    const carBeingCustomized = modalCarTitle.textContent.replace('Customize: ', '');

                    showCustomMessage(
                        'Customization Confirmed for: ' + carBeingCustomized +
                        '\\nColor: ' + selectedColor +
                        '\\nWheels: ' + selectedWheels.replace(/_/g, ' ') + 
                        '\\nInterior: ' + selectedInterior.replace(/_/g, ' ')
                    );
                    modal.style.display = 'none'; 
                });
            }
        });
    </script>
</body>
</html>