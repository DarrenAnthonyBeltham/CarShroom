<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dealer Locator - CarShroom</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
            overflow: hidden; 
        }

        .locator-container {
            display: flex;
            height: calc(100vh - 70px); 
        }

        .locations-panel {
            width: 400px;
            flex-shrink: 0; 
            height: 100%;
            background-color: #fff;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            z-index: 10;
        }
        
        .locations-header {
            padding: 20px;
            border-bottom: 1px solid #e9ecef;
            flex-shrink: 0;
        }
        
        .locations-header h2 {
            margin: 0 0 15px 0;
            font-size: 1.5em;
            color: #2c3e50;
        }
        
        .search-bar {
            width: 100%;
            padding: 12px;
            font-size: 1em;
            border: 1px solid #ced4da;
            border-radius: 8px;
        }

        .locations-list {
            overflow-y: auto;
            flex-grow: 1;
        }

        .location-item {
            padding: 20px;
            cursor: pointer;
            border-bottom: 1px solid #e9ecef;
            transition: background-color 0.2s ease;
        }
        .location-item:last-child {
            border-bottom: none;
        }

        .location-item.active,
        .location-item:hover {
            background-color: #ecf0f1;
        }

        .location-item h3 {
            margin: 0 0 5px 0;
            font-size: 1.1em;
            color: #34495e;
        }

        .location-item p {
            margin: 0 0 8px 0;
            font-size: 0.9em;
            color: #7f8c8d;
        }
        .location-item .phone {
            color: #2980b9;
            text-decoration: none;
            font-weight: 500;
        }
         .location-item .phone:hover {
            text-decoration: underline;
         }

        .map-panel {
            flex-grow: 1;
            height: 100%;
            position: relative;
            background-color: #ffffff;
            overflow: hidden;
            cursor: default;
        }
        
        .map-image-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            transform-origin: 0 0; 
            transition: transform 0.6s cubic-bezier(0.25, 0.8, 0.25, 1); 
        }
        
        .map-image-container img.map-background {
            width: 100%;
            height: 100%;
            object-fit: contain; 
            object-position: center;
        }

        .map-pin {
            width: 30px;
            height: 30px;
            background-color: #e74c3c;
            border-radius: 50% 50% 50% 0;
            transform: rotate(-45deg);
            position: absolute;
            border: 2px solid white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.3);
            cursor: pointer;
            transition: all 0.2s ease;
            margin-left: -15px; 
            margin-top: -30px; 
        }
        .map-pin:hover {
            transform: rotate(-45deg) scale(1.2);
        }
        .map-pin.active {
            background-color: #3498db;
            transform: rotate(-45deg) scale(1.3);
            z-index: 5;
        }
        
        .map-pin::before {
            content: '';
            width: 10px;
            height: 10px;
            background-color: white;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .reset-view-btn {
            position: absolute;
            bottom: 20px;
            right: 20px;
            z-index: 5;
            background-color: rgba(255, 255, 255, 0.9);
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 8px 12px;
            cursor: pointer;
            font-weight: 500;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: all 0.2s ease;
        }
        .reset-view-btn:hover {
            background-color: #f8f8f8;
            border-color: #bbb;
        }


        @media (max-width: 992px) {
             body {
                overflow: auto; 
            }
            .locator-container {
                flex-direction: column;
                height: auto;
            }
            .locations-panel {
                width: 100%;
                height: 50vh; 
                max-height: 500px; 
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            }
            .map-panel {
                width: 100%;
                height: 50vh; 
                min-height: 300px;
            }
        }
         @media (max-width: 576px) {
             .locations-panel {
                height: 55vh; 
            }
            .map-panel {
                height: 45vh;
            }
            .location-item {
                padding: 15px;
            }
            .locations-header h2 {
                font-size: 1.3em;
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

    <div class="locator-container">
        <div class="locations-panel">
            <div class="locations-header">
                <h2>Our Dealerships</h2>
                <input type="text" id="locationSearch" class="search-bar" placeholder="Search by city or address...">
            </div>
            <div class="locations-list" id="locationsList">
                </div>
        </div>
        <div class="map-panel" id="mapPanel">
            <div class="map-image-container" id="mapImageContainer">
                <img src="./assets/maps.jpg" alt="Map of Indonesia" class="map-background" onerror="this.onerror=null;this.src='https://placehold.co/2000x1500/d5e5e9/abb7b7?text=Map+Image+Not+Found';">
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
            // Corrected coordinates to match the provided map image
            const locations = [
                { id: 1, name: 'CarShroom Jakarta Central', address: '123 Sudirman Avenue, SCBD, Jakarta, Indonesia', phone: '+62 21 555 0101', hours: 'Mon-Sat: 9am - 7pm, Sun: 11am - 5pm', lat: 70, lng: 22 },
                { id: 2, name: 'CarShroom Surabaya Prestige', address: '456 Basuki Rahmat St, Surabaya, Indonesia', phone: '+62 31 555 0202', hours: 'Mon-Sat: 10am - 8pm, Sun: 12pm - 6pm', lat: 73, lng: 30 },
                { id: 3, name: 'CarShroom Bali Showroom', address: '789 Sunset Road, Kuta, Bali, Indonesia', phone: '+62 361 555 0303', hours: 'Mon-Sun: 10am - 9pm', lat: 78, lng: 48 },
                { id: 4, name: 'CarShroom Bandung Heights', address: '101 Dago Pakar Street, Bandung, Indonesia', phone: '+62 22 555 0404', hours: 'Mon-Sat: 9am - 6pm', lat: 85, lng: 55 },
            ];

            const locationsList = document.getElementById('locationsList');
            const mapPanel = document.getElementById('mapPanel');
            const mapImageContainer = document.getElementById('mapImageContainer');
            const searchBar = document.getElementById('locationSearch');
            const resetBtn = document.getElementById('resetViewBtn');
            let activeLocationId = null;

            let scale = 1, panX = 0, panY = 0;

            function applyTransform(withTransition = false) {
                mapImageContainer.style.transition = withTransition ? 'transform 0.6s cubic-bezier(0.25, 0.8, 0.25, 1)' : 'none';
                mapImageContainer.style.transform = `translate(${panX}px, ${panY}px) scale(${scale})`;
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
                
                addEventListeners();
                updateActiveElements();
            }

            function updateActiveElements() {
                 document.querySelectorAll('.location-item, .map-pin').forEach(el => {
                    el.classList.toggle('active', el.dataset.id == activeLocationId);
                });
            }

            function setActiveLocation(id) {
                if (!id) return;
                
                // If clicking the currently active location, reset the view
                if (id === activeLocationId) {
                    resetView();
                    return;
                }
                
                activeLocationId = id;
                updateActiveElements();
                
                const location = locations.find(loc => loc.id == id);
                if (location) {
                    const rect = mapImageContainer.getBoundingClientRect();
                    const targetScale = 2.5; 

                    const targetX = mapPanel.offsetWidth / 2;
                    const targetY = mapPanel.offsetHeight / 2;

                    const pinX = rect.width * (location.lng / 100);
                    const pinY = rect.height * (location.lat / 100);

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

            // Initial render
            renderLocations();
        });
    </script>
</body>
</html>
