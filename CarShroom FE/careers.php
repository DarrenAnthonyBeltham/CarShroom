<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Careers - CarShroom</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
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
            background-color: #f8f9fa;
            color: #212529;
            line-height: 1.6;
        }
        
        main {
            padding-bottom: 60px;
        }

        .careers-hero {
            position: relative;
            height: 60vh;
            min-height: 450px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            background: url('assets/careers.webp') no-repeat center center/cover;
        }

        .careers-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5));
        }

        .hero-content {
            position: relative;
            z-index: 1;
            padding: 20px;
        }

        .hero-content h1 {
            font-family: 'Space Mono', monospace;
            font-size: clamp(2.5rem, 6vw, 4.5rem);
            font-weight: 700;
            line-height: 1.2;
            margin: 0 0 10px 0;
            text-shadow: 0 3px 10px rgba(0,0,0,0.5);
            text-transform: uppercase;
        }

        .hero-content p {
            font-size: 1.2rem;
            font-weight: 300;
            max-width: 650px;
            margin: 0 auto;
            text-shadow: 0 2px 8px rgba(0,0,0,0.6);
        }

        .careers-container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 60px 20px;
        }
        
        .section {
            margin-bottom: 60px;
        }

        .section-title {
            font-family: 'Space Mono', monospace;
            font-size: 2.2em;
            font-weight: 700;
            text-align: center;
            color: #2c3e50;
            margin-bottom: 40px;
            text-transform: uppercase;
        }
        
        .culture-section p {
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
            font-size: 1.1em;
            color: #495057;
        }

        .job-listing {
            background-color: #fff;
            border-radius: 12px;
            padding: 25px 30px;
            margin-bottom: 20px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 20px;
            align-items: center;
            transition: all 0.3s ease;
        }
        .job-listing:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .job-title {
            font-size: 1.3em;
            font-weight: 600;
            color: #34495e;
            margin: 0 0 5px 0;
        }
        
        .job-meta {
            font-size: 0.9em;
            color: #7f8c8d;
            font-weight: 500;
        }

        .apply-btn {
            display: inline-block;
            padding: 12px 28px;
            background-color: #e74c3c;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: background-color 0.2s ease;
            text-align: center;
        }
        .apply-btn:hover {
            background-color: #c0392b;
        }
        
        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            text-align: center;
        }
        
        .benefit-item {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
        }

        .benefit-icon {
            font-size: 2.5em;
            color: #e74c3c;
            margin-bottom: 15px;
        }

        .benefit-item h3 {
            font-size: 1.2em;
            margin-bottom: 10px;
            color: #34495e;
        }
        
        .benefit-item p {
            font-size: 0.95em;
            color: #6c757d;
        }

        @media (max-width: 768px) {
            .job-listing {
                grid-template-columns: 1fr;
                text-align: center;
            }
            .job-listing-info {
                margin-bottom: 15px;
            }
        }
    </style>
</head>
<body>

    <?php 
        if (file_exists("./inc/navbar.php")) { 
            include "./inc/navbar.php";
        }
        
        $job_openings = [
            [
                'title' => 'Master Automotive Technician',
                'location' => 'Jakarta Service Center',
                'department' => 'After-Sales & Service'
            ],
            [
                'title' => 'Luxury Sales Advisor',
                'location' => 'Bali Showroom',
                'department' => 'Sales'
            ],
            [
                'title' => 'Digital Marketing Specialist',
                'location' => 'Head Office, Jakarta',
                'department' => 'Marketing'
            ],
            [
                'title' => 'Client Relations Manager',
                'location' => 'Surabaya Prestige',
                'department' => 'Customer Experience'
            ],
        ];
    ?>

    <header class="careers-hero">
        <div class="hero-content">
            <h1>Drive Your Career Forward</h1>
            <p>Join a team fueled by passion, precision, and the pursuit of automotive perfection. Your journey starts here.</p>
        </div>
    </header>

    <main>
        <div class="careers-container">
            <section class="culture-section section">
                <h2 class="section-title">Our Culture</h2>
                <p>At CarShroom, we are more than just a dealership; we are a community of enthusiasts, innovators, and experts dedicated to delivering an unparalleled luxury experience. We foster a collaborative environment where excellence is rewarded, passion is encouraged, and every team member plays a vital role in our success.</p>
            </section>

            <section class="job-openings-section section">
                <h2 class="section-title">Current Openings</h2>
                <div class="job-listings">
                    <?php foreach ($job_openings as $job): ?>
                        <div class="job-listing">
                            <div class="job-listing-info">
                                <h3 class="job-title"><?php echo htmlspecialchars($job['title']); ?></h3>
                                <p class="job-meta"><?php echo htmlspecialchars($job['department']); ?> &ndash; <?php echo htmlspecialchars($job['location']); ?></p>
                            </div>
                            <a href="mailto:careers@carshroom.com?subject=Application for <?php echo urlencode($job['title']); ?>" class="apply-btn">Apply Now</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
            
            <section class="benefits-section section">
                <h2 class="section-title">Perks & Benefits</h2>
                <div class="benefits-grid">
                    <div class="benefit-item">
                        <div class="benefit-icon">&#128170;</div>
                        <h3>Competitive Compensation</h3>
                        <p>We offer attractive salary packages and performance-based bonuses.</p>
                    </div>
                     <div class="benefit-item">
                        <div class="benefit-icon">&#127979;</div>
                        <h3>Health & Wellness</h3>
                        <p>Comprehensive health insurance for you and your family.</p>
                    </div>
                     <div class="benefit-item">
                        <div class="benefit-icon">&#127891;</div>
                        <h3>Professional Growth</h3>
                        <p>Access to world-class training and career development programs.</p>
                    </div>
                     <div class="benefit-item">
                        <div class="benefit-icon">&#128663;</div>
                        <h3>Employee Discounts</h3>
                        <p>Exclusive discounts on vehicles, parts, and merchandise.</p>
                    </div>
                </div>
            </section>
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
</body>
</html>
