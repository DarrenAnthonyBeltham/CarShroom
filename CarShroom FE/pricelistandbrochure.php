<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Price List & Brochures - CarShroom</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
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
            background-color: #f4f6f8;
            color: #212529;
            line-height: 1.6;
        }
        
        main {
            padding-bottom: 80px;
        }

        .pricelist-header {
            background: #111;
            color: #ffffff;
            padding: 100px 20px 80px;
            text-align: center;
        }

        .pricelist-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.8rem, 6vw, 4.5rem);
            font-weight: 700;
            margin: 0 0 10px 0;
            letter-spacing: 1px;
        }

        .pricelist-header p {
            font-size: 1.2em;
            color: #ced4da;
            max-width: 700px;
            margin: 0 auto;
            font-weight: 300;
        }

        .pricelist-container {
            max-width: 1100px;
            margin: -40px auto 0 auto; 
            padding: 0 20px;
            position: relative;
            z-index: 2;
        }

        .filter-container {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 40px;
            flex-wrap: wrap;
            padding: 15px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .filter-btn {
            padding: 10px 25px;
            border: none;
            background-color: transparent;
            color: #495057;
            border-radius: 50px;
            cursor: pointer;
            font-size: 1em;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .filter-btn:hover {
            background-color: #f1f2f6;
            color: #000;
        }

        .filter-btn.active {
            background-color: #2c3e50;
            color: #fff;
            box-shadow: 0 4px 15px rgba(44, 62, 80, 0.2);
        }
        
        .pricelist-table-wrapper {
            background-color: #fff;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .pricelist-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .pricelist-table th, .pricelist-table td {
            padding: 20px 25px;
            text-align: left;
            border-bottom: 1px solid #e9ecef;
        }
        
        .pricelist-table th {
            font-size: 0.85em;
            font-weight: 600;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .pricelist-table tbody tr {
            transition: background-color 0.2s ease;
        }
        .pricelist-table tbody tr:last-child td {
            border-bottom: none;
        }
        .pricelist-table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .vehicle-name {
            font-weight: 600;
            font-size: 1.1em;
            color: #2c3e50;
        }
        
        .vehicle-spec {
            font-size: 0.9em;
            color: #6c757d;
        }

        .vehicle-price {
            font-weight: 700;
            font-size: 1.1em;
            color: #2c3e50;
        }
        
        .download-btn {
            display: inline-block;
            padding: 10px 22px;
            background-color: #34495e;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.9em;
            transition: all 0.2s ease;
            text-align: center;
        }
        .download-btn:hover {
            background-color: #2c3e50;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        @media (max-width: 768px) {
            .pricelist-table {
                display: block;
                width: 100%;
            }
            .pricelist-table thead { display: none; }
            .pricelist-table tr, .pricelist-table td { display: block; }
            
            .pricelist-table tr {
                padding: 20px;
                border-bottom: 1px solid #e9ecef;
            }
             .pricelist-table tbody tr:last-child {
                border-bottom: none;
            }
            
            .pricelist-table td {
                padding: 8px 0;
                border: none;
                display: flex;
                justify-content: space-between;
                align-items: center;
                text-align: right;
            }
            .pricelist-table td::before {
                content: attr(data-label);
                font-weight: 600;
                color: #6c757d;
                text-align: left;
                margin-right: 15px;
            }
            .vehicle-name { text-align: right; }
            .vehicle-spec { display: none; } 
            .pricelist-table td[data-label="Vehicle"] .vehicle-spec { display: block; }
        }

    </style>
</head>
<body>

    <?php 
        if (file_exists("./inc/navbar.php")) { 
            include "./inc/navbar.php";
        }
        
        $vehicles = [
            ['category' => 'Hypercars', 'name' => 'Hennessey Venom F5', 'spec' => '6.6L Twin-Turbo V8', 'price' => '3000000', 'brochure' => '#'],
            ['category' => 'Hypercars', 'name' => 'Ferrari LaFerrari', 'spec' => '6.3L V12 Hybrid', 'price' => '2200000', 'brochure' => '#'],
            ['category' => 'Hypercars', 'name' => 'Aston Martin Valkyrie', 'spec' => '6.5L V12 Hybrid', 'price' => '3500000', 'brochure' => '#'],
            ['category' => 'Supercars', 'name' => 'Ferrari F8 Tributo', 'spec' => '3.9L Twin-Turbo V8', 'price' => '350000', 'brochure' => '#'],
            ['category' => 'Supercars', 'name' => 'McLaren 765LT', 'spec' => '4.0L Twin-Turbo V8', 'price' => '400000', 'brochure' => '#'],
            ['category' => 'Supercars', 'name' => 'Porsche 911 Turbo S', 'spec' => '3.7L Twin-Turbo Flat-6', 'price' => '230000', 'brochure' => '#'],
            ['category' => 'SUVs', 'name' => 'Mercedes-AMG G 63', 'spec' => '4.0L Twin-Turbo V8', 'price' => '180000', 'brochure' => '#'],
            ['category' => 'SUVs', 'name' => 'Rolls-Royce Cullinan', 'spec' => '6.75L Twin-Turbo V12', 'price' => '350000', 'brochure' => '#'],
            ['category' => 'SUVs', 'name' => 'Lexus LX 600', 'spec' => '3.4L Twin-Turbo V6', 'price' => '90000', 'brochure' => '#'],
            ['category' => 'Muscle Cars', 'name' => 'Ford Mustang Shelby GT500', 'spec' => '5.2L Supercharged V8', 'price' => '80000', 'brochure' => '#'],
            ['category' => 'Muscle Cars', 'name' => 'Dodge Challenger SRT Hellcat', 'spec' => '6.2L Supercharged V8', 'price' => '75000', 'brochure' => '#'],
        ];
    ?>

    <header class="pricelist-header">
        <h1>Price List & Brochures</h1>
        <p>Explore our current vehicle pricing and download detailed brochures for the models that capture your imagination.</p>
    </header>

    <main>
        <div class="pricelist-container">
            <div class="filter-container" id="filterContainer">
                <button class="filter-btn active" data-filter="all">All Models</button>
                <button class="filter-btn" data-filter="Hypercars">Hypercars</button>
                <button class="filter-btn" data-filter="Supercars">Supercars</button>
                <button class="filter-btn" data-filter="SUVs">SUVs</button>
                <button class="filter-btn" data-filter="Muscle Cars">Muscle Cars</button>
            </div>

            <div class="pricelist-table-wrapper">
                <table class="pricelist-table" id="pricelistTable">
                    <thead>
                        <tr>
                            <th>Vehicle</th>
                            <th>Specification</th>
                            <th>Price (USD)</th>
                            <th>Brochure</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($vehicles as $vehicle): ?>
                            <tr data-category="<?php echo htmlspecialchars($vehicle['category']); ?>">
                                <td data-label="Vehicle">
                                    <div class="vehicle-name"><?php echo htmlspecialchars($vehicle['name']); ?></div>
                                    <div class="vehicle-spec"><?php echo htmlspecialchars($vehicle['spec']); ?></div>
                                </td>
                                <td data-label="Specification" class="vehicle-spec"><?php echo htmlspecialchars($vehicle['spec']); ?></td>
                                <td data-label="Price" class="vehicle-price">$<?php echo number_format((float) str_replace(',', '', $vehicle['price']), 2); ?></td>
                                <td data-label="Brochure">
                                    <a href="<?php echo htmlspecialchars($vehicle['brochure']); ?>" class="download-btn" download>Download</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
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
            const filterButtons = document.querySelectorAll('.filter-btn');
            const tableRows = document.querySelectorAll('#pricelistTable tbody tr');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    const filter = this.dataset.filter;

                    tableRows.forEach(row => {
                        if (filter === 'all' || row.dataset.category === filter) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>