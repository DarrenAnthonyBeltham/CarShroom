<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dealer Locator - CarShroom</title>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&family=Open+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background: #ffffff;
            color: #2c3e50;
            line-height: 1.6;
            min-height: 100vh;
        }

        .hero-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 50%, #f1f3f4 100%);
            padding: 60px 0 40px;
            text-align: center;
            border-bottom: 3px solid #e9ecef;
            position: relative;
        }

        .hero-section::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: linear-gradient(90deg, #3498db, #2980b9);
            border-radius: 2px;
        }

        .hero-title {
            font-family: 'Merriweather', serif;
            font-size: 3.2rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 15px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .hero-subtitle {
            font-size: 1.3rem;
            color: #7f8c8d;
            font-weight: 400;
            margin-bottom: 10px;
        }

        .locator-container {
            display: flex;
            min-height: calc(100vh - 200px);
            background: #ffffff;
        }

        .locations-panel {
            width: 420px;
            background: #ffffff;
            border-right: 2px solid #e9ecef;
            display: flex;
            flex-direction: column;
            box-shadow: 2px 0 10px rgba(0,0,0,0.05);
        }

        .locations-header {
            padding: 35px 30px;
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            border-bottom: 2px solid #e9ecef;
        }

        .locations-header h2 {
            font-family: 'Merriweather', serif;
            font-size: 2rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 25px;
        }

        .search-container {
            position: relative;
        }

        .search-bar {
            width: 100%;
            padding: 15px 20px;
            font-size: 1rem;
            background: #ffffff;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            color: #2c3e50;
            font-family: 'Open Sans', sans-serif;
            transition: all 0.3s ease;
        }

        .search-bar::placeholder {
            color: #95a5a6;
        }

        .search-bar:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }

        .locations-list {
            overflow-y: auto;
            flex-grow: 1;
            padding: 20px 0;
            background: #fafbfc;
        }

        .locations-list::-webkit-scrollbar {
            width: 8px;
        }

        .locations-list::-webkit-scrollbar-track {
            background: #f8f9fa;
        }

        .locations-list::-webkit-scrollbar-thumb {
            background: #bdc3c7;
            border-radius: 4px;
        }

        .locations-list::-webkit-scrollbar-thumb:hover {
            background: #95a5a6;
        }

        .location-item {
            margin: 12px 20px;
            padding: 25px;
            background: #ffffff;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid #e9ecef;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .location-item:hover {
            transform: translateY(-3px);
            border-color: #3498db;
            box-shadow: 0 8px 25px rgba(52, 152, 219, 0.15);
        }

        .location-item.active {
            background: linear-gradient(135deg, #ebf3fd 0%, #ffffff 100%);
            border-color: #3498db;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(52, 152, 219, 0.2);
        }

        .location-item h3 {
            font-family: 'Merriweather', serif;
            font-size: 1.3rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 12px;
        }

        .location-item p {
            margin-bottom: 8px;
            font-size: 0.95rem;
            color: #5a6c7d;
            line-height: 1.5;
        }

        .location-item .phone {
            color: #3498db;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .location-item .phone:hover {
            color: #2980b9;
            text-decoration: underline;
        }

        .map-panel {
            flex-grow: 1;
            position: relative;
            background: #ffffff;
            overflow: hidden;
        }

        .map-image-container {
            position: relative;
            width: 100%;
            height: 100%;
            transform-origin: 0 0;
            transition: transform 0.8s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        .custom-map {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 50%, #ecf0f1 100%);
            position: relative;
            overflow: hidden;
        }

        .continent {
            position: absolute;
            border-radius: 15px;
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border: 2px solid #d5dbdb;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .continent:hover {
            background: linear-gradient(135deg, #ffffff 0%, #ecf0f1 100%);
            border-color: #bdc3c7;
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
            transform: translateY(-2px);
        }

        .continent-asia {
            top: 25%;
            left: 55%;
            width: 35%;
            height: 45%;
            border-radius: 25px 35px 20px 30px;
        }

        .continent-europe {
            top: 20%;
            left: 45%;
            width: 15%;
            height: 25%;
            border-radius: 12px 18px 12px 8px;
        }

        .continent-africa {
            top: 35%;
            left: 48%;
            width: 12%;
            height: 35%;
            border-radius: 12px 8px 18px 12px;
        }

        .continent-north-america {
            top: 15%;
            left: 15%;
            width: 25%;
            height: 40%;
            border-radius: 20px 25px 15px 30px;
        }

        .continent-south-america {
            top: 45%;
            left: 25%;
            width: 12%;
            height: 35%;
            border-radius: 8px 12px 20px 15px;
        }

        .continent-australia {
            top: 70%;
            left: 75%;
            width: 18%;
            height: 15%;
            border-radius: 15px 20px 12px 15px;
        }

        .grid-lines {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.1;
            background-image: 
                linear-gradient(rgba(52, 152, 219, 0.3) 1px, transparent 1px),
                linear-gradient(90deg, rgba(52, 152, 219, 0.3) 1px, transparent 1px);
            background-size: 60px 60px;
        }

        .map-pin {
            width: 28px;
            height: 28px;
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            border-radius: 50% 50% 50% 0;
            transform: rotate(-45deg);
            position: absolute;
            border: 3px solid #ffffff;
            box-shadow: 0 4px 15px rgba(231, 76, 60, 0.4), 0 0 0 0 rgba(231, 76, 60, 0.1);
            cursor: pointer;
            transition: all 0.3s ease;
            margin-left: -14px;
            margin-top: -28px;
            animation: gentle-pulse 3s infinite;
        }

        @keyframes gentle-pulse {
            0% { box-shadow: 0 4px 15px rgba(231, 76, 60, 0.4), 0 0 0 0 rgba(231, 76, 60, 0.1); }
            50% { box-shadow: 0 4px 15px rgba(231, 76, 60, 0.4), 0 0 0 8px rgba(231, 76, 60, 0.15); }
            100% { box-shadow: 0 4px 15px rgba(231, 76, 60, 0.4), 0 0 0 0 rgba(231, 76, 60, 0.1); }
        }

        .map-pin:hover {
            transform: rotate(-45deg) scale(1.2);
            box-shadow: 0 6px 20px rgba(231, 76, 60, 0.5), 0 0 0 12px rgba(231, 76, 60, 0.2);
        }

        .map-pin.active {
            background: linear-gradient(135deg, #c0392b 0%, #a93226 100%);
            transform: rotate(-45deg) scale(1.4);
            z-index: 5;
            box-shadow: 0 8px 25px rgba(192, 57, 43, 0.6), 0 0 0 15px rgba(192, 57, 43, 0.2);
            animation: none;
        }

        .map-pin::before {
            content: '';
            width: 8px;
            height: 8px;
            background: #ffffff;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .reset-view-btn {
            position: absolute;
            bottom: 30px;
            right: 30px;
            z-index: 5;
            background: #ffffff;
            border: 2px solid #3498db;
            border-radius: 8px;
            padding: 12px 24px;
            cursor: pointer;
            font-weight: 600;
            color: #3498db;
            font-family: 'Open Sans', sans-serif;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.2);
            transition: all 0.3s ease;
            opacity: 0;
            transform: translateY(20px) scale(0.9);
        }

        .reset-view-btn.visible {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        .reset-view-btn:hover {
            background: #3498db;
            color: #ffffff;
            box-shadow: 0 6px 20px rgba(52, 152, 219, 0.3);
            transform: translateY(-2px) scale(1.05);
        }

        .decorative-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
        }

        .floating-icon {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(52, 152, 219, 0.3);
            border-radius: 50%;
            animation: gentle-float 4s ease-in-out infinite;
        }

        @keyframes gentle-float {
            0%, 100% { transform: translateY(0px) scale(1); opacity: 0.3; }
            50% { transform: translateY(-10px) scale(1.2); opacity: 0.6; }
        }

        @media (max-width: 992px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .locator-container {
                flex-direction: column;
                min-height: auto;
            }
            
            .locations-panel {
                width: 100%;
                height: 50vh;
                max-height: 500px;
                border-right: none;
                border-bottom: 2px solid #e9ecef;
            }
            
            .map-panel {
                width: 100%;
                height: 50vh;
                min-height: 400px;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                font-size: 2rem;
            }
            
            .locations-panel {
                height: 55vh;
            }
            
            .map-panel {
                height: 45vh;
            }
            
            .location-item {
                margin: 8px 15px;
                padding: 20px;
            }
            
            .locations-header {
                padding: 25px 20px;
            }
        }
    </style>
</head>
<body>
    <?php 
        if (file_exists("./inc/navbar.php")) { 
            include "./inc/navbar.php";
        }
    ?>

    <div class="hero-section">
        <h1 class="hero-title">Premium Dealerships</h1>
        <p class="hero-subtitle">Discover our exclusive showrooms worldwide</p>
    </div>

    <div class="locator-container">
        <div class="locations-panel">
            <div class="locations-header">
                <h2>Our Locations</h2>
                <div class="search-container">
                    <input type="text" id="locationSearch" class="search-bar" placeholder="Search by city or address...">
                </div>
            </div>
            <div class="locations-list" id="locationsList">
            </div>
        </div>
        <div class="map-panel" id="mapPanel">
            <div class="map-image-container" id="mapImageContainer">
                <div class="custom-map" id="customMap">
                    <div class="decorative-elements" id="decorativeElements">
                    </div>
                    <div class="grid-lines"></div>
                    <div class="continent continent-north-america"></div>
                    <div class="continent continent-south-america"></div>
                    <div class="continent continent-europe"></div>
                    <div class="continent continent-africa"></div>
                    <div class="continent continent-asia"></div>
                    <div class="continent continent-australia"></div>
                </div>
            </div>
            <button id="resetViewBtn" class="reset-view-btn">Reset View</button>
        </div>
    </div>

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
            const locations = [
                { 
                    id: 1, 
                    name: 'CarShroom Jakarta Prestige', 
                    address: '123 Sudirman Avenue, SCBD, Jakarta, Indonesia', 
                    phone: '+62 21 555 0101', 
                    hours: 'Mon-Sat: 9am - 7pm', 
                    lat: 45, 
                    lng: 72 
                },
                { 
                    id: 2, 
                    name: 'CarShroom Surabaya Elite', 
                    address: '456 Basuki Rahmat St, Surabaya, Indonesia', 
                    phone: '+62 31 555 0202', 
                    hours: 'Mon-Sat: 10am - 8pm', 
                    lat: 48, 
                    lng: 75 
                },
                { 
                    id: 3, 
                    name: 'CarShroom Bali Luxury', 
                    address: '789 Sunset Road, Kuta, Bali, Indonesia', 
                    phone: '+62 361 555 0303', 
                    hours: 'Mon-Sun: 10am - 9pm', 
                    lat: 52, 
                    lng: 78 
                },
                { 
                    id: 4, 
                    name: 'CarShroom Bandung Premium', 
                    address: '101 Dago Pakar Street, Bandung, Indonesia', 
                    phone: '+62 22 555 0404', 
                    hours: 'Mon-Sat: 9am - 6pm', 
                    lat: 46, 
                    lng: 70 
                },
                { 
                    id: 5, 
                    name: 'CarShroom Singapore Platinum', 
                    address: '88 Marina Bay Sands, Singapore', 
                    phone: '+65 6555 0505', 
                    hours: 'Mon-Sun: 10am - 10pm', 
                    lat: 50, 
                    lng: 73 
                },
                { 
                    id: 6, 
                    name: 'CarShroom Tokyo Imperial', 
                    address: '1-1-1 Ginza, Chuo City, Tokyo, Japan', 
                    phone: '+81 3 5555 0606', 
                    hours: 'Mon-Sat: 10am - 8pm', 
                    lat: 38, 
                    lng: 82 
                },
                { 
                    id: 7, 
                    name: 'CarShroom London Mayfair', 
                    address: '123 Bond Street, Mayfair, London, UK', 
                    phone: '+44 20 7555 0707', 
                    hours: 'Mon-Sat: 9am - 7pm', 
                    lat: 28, 
                    lng: 48 
                },
                { 
                    id: 8, 
                    name: 'CarShroom New York Fifth Avenue', 
                    address: '500 Fifth Avenue, New York, NY, USA', 
                    phone: '+1 212 555 0808', 
                    hours: 'Mon-Sat: 10am - 8pm', 
                    lat: 32, 
                    lng: 25 
                },
            ];

            const locationsList = document.getElementById('locationsList');
            const mapPanel = document.getElementById('mapPanel');
            const mapImageContainer = document.getElementById('mapImageContainer');
            const searchBar = document.getElementById('locationSearch');
            const resetBtn = document.getElementById('resetViewBtn');
            let activeLocationId = null;
            let scale = 1, panX = 0, panY = 0;

            function applyTransform(withTransition = false) {
                mapImageContainer.style.transition = withTransition ? 'transform 0.8s cubic-bezier(0.25, 0.8, 0.25, 1)' : '';
                mapImageContainer.style.transform = `translate(${panX}px, ${panY}px) scale(${scale})`;
                resetBtn.classList.toggle('visible', scale !== 1);
            }

            function renderLocations(filter = '') {
                locationsList.innerHTML = '';
                mapImageContainer.querySelectorAll('.map-pin').forEach(pin => pin.remove());
                
                const filteredLocations = locations.filter(loc => 
                    loc.name.toLowerCase().includes(filter.toLowerCase()) || 
                    loc.address.toLowerCase().includes(filter.toLowerCase())
                );

                filteredLocations.forEach(loc => {
                    const item = document.createElement('div');
                    item.className = 'location-item';
                    item.dataset.id = loc.id;
                    item.innerHTML = `
                        <h3>${loc.name}</h3>
                        <p>${loc.address}</p>
                        <p><a href="tel:${loc.phone}" class="phone">${loc.phone}</a></p>
                        <p>${loc.hours}</p>
                    `;
                    locationsList.appendChild(item);

                    const pin = document.createElement('div');
                    pin.className = 'map-pin';
                    pin.dataset.id = loc.id;
                    pin.style.top = `${loc.lat}%`;
                    pin.style.left = `${loc.lng}%`;
                    mapImageContainer.appendChild(pin);
                });
                
                createDecorativeElements();
                addEventListeners();
                updateActiveElements();
            }

            function createDecorativeElements() {
                const decorativeContainer = document.getElementById('decorativeElements');
                
                // Remove existing elements
                decorativeContainer.innerHTML = '';
                
                // Create subtle floating elements
                for (let i = 0; i < 15; i++) {
                    const element = document.createElement('div');
                    element.className = 'floating-icon';
                    element.style.top = Math.random() * 100 + '%';
                    element.style.left = Math.random() * 100 + '%';
                    element.style.animationDelay = Math.random() * 4 + 's';
                    element.style.animationDuration = (3 + Math.random() * 2) + 's';
                    decorativeContainer.appendChild(element);
                }
            }

            function updateActiveElements() {
                document.querySelectorAll('.location-item, .map-pin').forEach(el => {
                    el.classList.toggle('active', el.dataset.id == activeLocationId);
                });
            }

            function setActiveLocation(id) {
                if (!id) return;
                
                if (id === activeLocationId) {
                    resetView();
                    return;
                }
                
                activeLocationId = id;
                updateActiveElements();
                
                const location = locations.find(loc => loc.id == id);
                if (location) {
                    const targetScale = 2.5;
                    const targetX = mapPanel.offsetWidth / 2;
                    const targetY = mapPanel.offsetHeight / 2;
                    const pinX = mapImageContainer.offsetWidth * (location.lng / 100);
                    const pinY = mapImageContainer.offsetHeight * (location.lat / 100);

                    scale = targetScale;
                    panX = targetX - (pinX * scale);
                    panY = targetY - (pinY * scale);

                    applyTransform(true);
                }
            }

            function resetView() {
                activeLocationId = null;
                scale = 1;
                panX = 0;
                panY = 0;
                updateActiveElements();
                applyTransform(true);
            }

            function addEventListeners() {
                document.querySelectorAll('.location-item').forEach(el => {
                    el.addEventListener('click', function() {
                        setActiveLocation(this.dataset.id);
                    });
                });
                
                document.querySelectorAll('.map-pin').forEach(el => {
                    el.addEventListener('click', function(e) {
                        e.stopPropagation();
                        const id = this.dataset.id;
                        const listItem = document.querySelector(`.location-item[data-id="${id}"]`);
                        if(listItem) {
                            listItem.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                        setActiveLocation(id);
                    });
                });
            }

            searchBar.addEventListener('input', (e) => {
                renderLocations(e.target.value);
            });

            resetBtn.addEventListener('click', resetView);

            renderLocations();
        });
    </script>
</body>
</html>