<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include "inc/navbar.php" ?>

    <section>
        <h1>Subscribe to all CarShroom newsletters</h1>

        <h2>Your Data</h2>

        <h3>* Mandatory Fields</h3>

        <div class="email-input">
            <input type="email" placeholder="Email*">
        </div>

        <div class="newsletters-category">
            <p>Choose the newsletters you want to receive*</p>
            <div class="news-category">
                <p>Cars</p>
                <p>E-Sports</p>
                <p>Engines</p>
                <p>Formula 1</p>
            </div>
        </div>

        <div class="news-consent">
            <div class="consent-para">
                <p>Privacy and Marketing Consent*</p>
                <p>I have read the Privacy Policy and confirm I want to receive marketing communications from CarShroom S.p.A. regarding the world of Ferrari, as described in the notice. If you select “I do not consent”, you will no longer be kept up-to-date about our latest news, launches of new vehicle models and event invitations.</p>

                <div class="newsletters-option">
                    <p>I AGREE</p>
                    <p>I DISAGREE</p>
                </div>
            </div>
        </div>

        <button>SUBSCRIBE</button>

        <a href="" style="text-decoration: none;">Manage your newsletters and GPDR consent</a>
    </section>

    <style>

    </style>

    <?php include "inc/footer.php" ?>
</body>
</html>