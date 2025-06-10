<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Careers - CarShroom</title>
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
            background-color: #ffffff;
            color: #1a1a1a;
            line-height: 1.7;
        }
        
        main {
            padding-bottom: 80px;
        }

        .careers-hero {
            position: relative;
            height: 70vh;
            min-height: 500px;
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
            background: linear-gradient(to top, rgba(0,0,0,0.7), rgba(0,0,0,0.3));
        }

        .hero-content {
            position: relative;
            z-index: 1;
            padding: 20px;
            animation: fadeIn 1.5s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hero-content h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.8rem, 7vw, 5rem);
            font-weight: 700;
            line-height: 1.2;
            margin: 0 0 15px 0;
            text-shadow: 0 4px 15px rgba(0,0,0,0.5);
        }

        .hero-content p {
            font-size: clamp(1rem, 2.5vw, 1.25rem);
            font-weight: 300;
            max-width: 700px;
            margin: 0 auto;
            text-shadow: 0 2px 8px rgba(0,0,0,0.6);
        }

        .careers-container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 80px 20px 0;
        }
        
        .section {
            margin-bottom: 80px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }
        .section-title h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.8em;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 10px;
        }
        .section-title p {
            font-size: 1.1em;
            color: #6c757d;
            max-width: 750px;
            margin: 0 auto;
        }
        
        .culture-section {
            background-color: #f8f9fa;
            padding: 60px 40px;
            border-radius: 16px;
            margin-top: -120px;
            position: relative;
            z-index: 2;
            box-shadow: 0 15px 40px rgba(0,0,0,0.08);
        }
        .culture-section p {
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
            font-size: 1.15em;
            color: #343a40;
        }

        .job-listing {
            background-color: #fff;
            border: 1px solid #e9ecef;
            border-radius: 12px;
            padding: 25px 30px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            transition: all 0.3s ease;
        }
        .job-listing:hover {
            transform: translateY(-5px) scale(1.01);
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            border-color: #adb5bd;
        }

        .job-title {
            font-size: 1.3em;
            font-weight: 600;
            color: #2c3e50;
            margin: 0 0 5px 0;
        }
        
        .job-meta {
            font-size: 0.95em;
            color: #7f8c8d;
            font-weight: 500;
        }
        .job-meta span {
            margin: 0 5px;
        }

        .apply-btn {
            display: inline-block;
            padding: 12px 28px;
            background-color: #34495e;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.2s ease;
            white-space: nowrap;
        }
        .apply-btn:hover {
            background-color: #2c3e50;
            box-shadow: 0 4px 15px rgba(52, 73, 94, 0.2);
            transform: translateY(-2px);
        }
        
        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }
        
        .benefit-item {
            text-align: center;
        }

        .benefit-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 20px auto;
            border-radius: 16px;
            background: linear-gradient(135deg, #34495e 0%, #2c3e50 100%);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 15px rgba(44, 62, 80, 0.2);
        }
        .benefit-icon svg {
            width: 28px;
            height: 28px;
        }

        .benefit-item h3 {
            font-size: 1.25em;
            margin-bottom: 10px;
            color: #343a40;
            font-weight: 600;
        }
        
        .benefit-item p {
            font-size: 1em;
            color: #6c757d;
        }

        @media (max-width: 768px) {
            .job-listing {
                flex-direction: column;
                align-items: flex-start;
            }
            .job-listing-info {
                margin-bottom: 15px;
            }
            .apply-btn {
                width: 100%;
                text-align: center;
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
            ['title' => 'Master Automotive Technician', 'location' => 'Jakarta Service Center', 'department' => 'After-Sales & Service'],
            ['title' => 'Luxury Sales Advisor', 'location' => 'Bali Showroom', 'department' => 'Sales'],
            ['title' => 'Digital Marketing Specialist', 'location' => 'Head Office, Jakarta', 'department' => 'Marketing'],
            ['title' => 'Client Relations Manager', 'location' => 'Surabaya Prestige', 'department' => 'Customer Experience'],
        ];
    ?>

    <header class="careers-hero">
        <div class="hero-content">
            <h1>Join The A-Team</h1>
            <p>Drive your career forward with a team fueled by passion, precision, and the pursuit of automotive perfection.</p>
        </div>
    </header>

    <main>
        <div class="careers-container">
            <section class="culture-section section">
                <p>At CarShroom, we are more than just a dealership; we are a community of enthusiasts, innovators, and experts dedicated to delivering an unparalleled luxury experience. We foster a collaborative environment where excellence is rewarded, passion is encouraged, and every team member plays a vital role in our success.</p>
            </section>

            <section class="benefits-section section">
                <div class="section-title">
                    <h2>Perks & Benefits</h2>
                </div>
                <div class="benefits-grid">
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                        </div>
                        <h3>Competitive Compensation</h3>
                        <p>We offer attractive salary packages and performance-based bonuses.</p>
                    </div>
                     <div class="benefit-item">
                        <div class="benefit-icon">
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                        </div>
                        <h3>Health & Wellness</h3>
                        <p>Comprehensive health insurance for you and your family.</p>
                    </div>
                     <div class="benefit-item">
                        <div class="benefit-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                        </div>
                        <h3>Professional Growth</h3>
                        <p>Access to world-class training and career development programs.</p>
                    </div>
                     <div class="benefit-item">
                        <div class="benefit-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                        </div>
                        <h3>Employee Discounts</h3>
                        <p>Exclusive discounts on vehicles, parts, and merchandise.</p>
                    </div>
                </div>
            </section>

             <section class="job-openings-section section">
                <div class="section-title">
                    <h2>Current Openings</h2>
                </div>
                <div class="job-listings">
                    <?php foreach ($job_openings as $job): ?>
                        <div class="job-listing">
                            <div class="job-listing-info">
                                <h3 class="job-title"><?php echo htmlspecialchars($job['title']); ?></h3>
                                <p class="job-meta"><?php echo htmlspecialchars($job['department']); ?><span>&bull;</span><?php echo htmlspecialchars($job['location']); ?></p>
                            </div>
                            <a href="mailto:careers@carshroom.com?subject=Application for <?php echo urlencode($job['title']); ?>" class="apply-btn">Apply Now</a>
                        </div>
                    <?php endforeach; ?>
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
