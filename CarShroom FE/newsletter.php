<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarShroom Newsletter Subscription</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #ffffff; 
            color: #333333; 
            display: flex;
            flex-direction: column; 
            justify-content: flex-start; 
            min-height: 100vh;
            padding: 0; 
            margin: 0; 
            box-sizing: border-box;
        }
        
        .newsletter-section-wrapper { 
            width: 100%;
            display: flex;
            justify-content: center;
            padding: 40px 20px; 
            box-sizing: border-box;
        }

        .newsletter-section {
            background-color: #ffffff;
            width: 100%;
            max-width: 650px; 
            padding: 0px; 
        }

        .newsletter-section h1 {
            font-size: 2em; 
            font-weight: 600;
            color: #000000;
            margin-bottom: 40px;
            text-align: left;
        }

        .newsletter-section h2 {
            font-size: 1.5em; 
            font-weight: 600;
            color: #000000;
            margin-bottom: 10px;
            text-align: left;
        }

        .newsletter-section h3 {
            font-size: 0.8em; 
            font-weight: 400;
            color: #555555;
            margin-bottom: 30px;
            text-align: left;
        }

        .email-input {
            margin-bottom: 40px;
        }

        .email-input input[type="email"] {
            width: 100%;
            padding: 12px 0; 
            border: none;
            border-bottom: 1px solid #cccccc; 
            font-size: 1em;
            color: #333333;
            background-color: transparent;
        }

        .email-input input[type="email"]::placeholder {
            color: #888888;
        }

        .email-input input[type="email"]:focus {
            outline: none;
            border-bottom-color: #000000; 
        }

        .newsletters-category {
            margin-bottom: 40px;
        }

        .newsletters-category > p:first-child { 
            font-size: 1em;
            font-weight: 500;
            color: #000000;
            margin-bottom: 20px;
        }

        .news-category-grid { 
            display: grid;
            grid-template-columns: repeat(2, 1fr); 
            gap: 15px 30px; 
        }

        .news-category-item {
            display: flex;
            align-items: center;
        }
        
        .news-category-item input[type="checkbox"] {
            margin-right: 10px;
            width: 18px;
            height: 18px;
            accent-color: #000000; 
        }

        .news-category-item label {
            font-size: 0.95em;
            color: #333333;
            cursor: pointer;
        }

        .news-consent {
            margin-bottom: 40px;
        }

        .consent-para > p:first-child { 
            font-size: 1em;
            font-weight: 500;
            color: #000000;
            margin-bottom: 10px;
        }

        .consent-para > p:nth-child(2) { 
            font-size: 0.85em;
            color: #555555;
            line-height: 1.6;
            margin-bottom: 25px;
            text-align: justify;
        }
        
        .consent-para > p:nth-child(2) a { 
            color: #000000;
            text-decoration: underline;
        }

        .newsletters-option {
            display: flex;
            gap: 40px; 
            margin-bottom: 20px;
        }
        
        .newsletter-option-item { 
            display: flex;
            align-items: center;
        }

        .newsletter-option-item input[type="radio"] {
            margin-right: 8px;
            width: 18px;
            height: 18px;
            accent-color: #000000;
        }
        
        .newsletter-option-item label {
            font-size: 0.95em;
            font-weight: 500;
            color: #000000;
            cursor: pointer;
        }

        .subscribe-button {
            width: 100%;
            max-width: 200px; 
            background-color: #ffffff;
            color: #000000;
            border: 1px solid #000000;
            padding: 12px 20px;
            font-size: 0.9em;
            font-weight: 600;
            text-transform: uppercase;
            cursor: pointer;
            transition: background-color 0.2s ease, color 0.2s ease;
            display: block; 
            margin-bottom: 25px;
            text-align: center;
        }

        .subscribe-button:hover {
            background-color: #000000;
            color: #ffffff;
        }

        .manage-consent-link {
            display: block;
            text-align: left;
            font-size: 0.85em;
            color: #000000;
            text-decoration: underline;
            transition: color 0.2s ease;
        }

        .manage-consent-link:hover {
            color: #555555;
        }

        @media (max-width: 480px) {
            .newsletter-section h1 {
                font-size: 1.6em;
                margin-bottom: 30px;
            }
            .newsletter-section h2 {
                font-size: 1.3em;
            }
            .news-category-grid {
                grid-template-columns: 1fr; 
                gap: 10px;
            }
            .newsletters-option {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
            .subscribe-button {
                width: 100%;
                max-width: none;
            }
        }
    </style>
</head>
<body>
    <?php include "inc/navbar.php" ?>

    <div class="newsletter-section-wrapper">
        <section class="newsletter-section">
            <h1>Subscribe to all CarShroom newsletters</h1>
            <h2>Your Data</h2>
            <h3>* Mandatory Fields</h3>

            <form action="#" method="post"> 
                <div class="email-input">
                    <input type="email" id="email" name="email" placeholder="Email*" required>
                </div>

                <div class="newsletters-category">
                    <p>Choose the newsletters you want to receive*</p>
                    <div class="news-category-grid">
                        <div class="news-category-item">
                            <input type="checkbox" id="carsNews" name="newsletter_topics[]" value="cars">
                            <label for="carsNews">Cars</label>
                        </div>
                        <div class="news-category-item">
                            <input type="checkbox" id="esportsNews" name="newsletter_topics[]" value="esports">
                            <label for="esportsNews">E-Sports</label>
                        </div>
                        <div class="news-category-item">
                            <input type="checkbox" id="enginesNews" name="newsletter_topics[]" value="engines">
                            <label for="enginesNews">Engines</label>
                        </div>
                        <div class="news-category-item">
                            <input type="checkbox" id="f1News" name="newsletter_topics[]" value="f1">
                            <label for="f1News">Formula 1</label>
                        </div>
                    </div>
                </div>

                <div class="news-consent">
                    <div class="consent-para">
                        <p>Privacy and Marketing Consent*</p>
                        <p>I have read the <a href="#">Privacy Policy</a> and confirm I want to receive marketing communications from CarShroom S.p.A. regarding the world of Ferrari, as described in the notice. If you select “I do not consent”, you will no longer be kept up-to-date about our latest news, launches of new vehicle models and event invitations.</p>

                        <div class="newsletters-option">
                            <div class="newsletter-option-item">
                                <input type="radio" id="agreeConsent" name="marketing_consent" value="agree" checked required>
                                <label for="agreeConsent">I AGREE</label>
                            </div>
                            <div class="newsletter-option-item">
                                <input type="radio" id="disagreeConsent" name="marketing_consent" value="disagree">
                                <label for="disagreeConsent">I DISAGREE</label>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="subscribe-button">SUBSCRIBE</button>
            </form>

            <a href="#" class="manage-consent-link">Manage your newsletters and GPDR consent</a>
        </section>
    </div>

    <?php 
        if (file_exists("inc/footer.php")) {
            include "inc/footer.php";
        } else {
        }
    ?>
</body>
</html>