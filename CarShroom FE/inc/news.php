    <div class="newsletter">
        <h1>Newsletter</h1>
        <p>Stay up to date with the latest news from CarShroom.</p>
        <button>
            <a href="../newsletter.php" style="color: #fff; text-decoration: none;">Subscribe</a>
        </button>
    </div>

    <style>
        .newsletter {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            gap: 25px;
            width: 100%;
            padding: 50px 30px;
            background: linear-gradient(135deg, #4A4A4A 0%, #383838 100%);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            font-family: 'Space Mono', monospace;
        }

        @keyframes fadeInSlideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .newsletter h1 {
            font-size: 28px;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 5px;
            animation: fadeInSlideUp 0.6s ease-out 0.2s;
        }

        .newsletter p {
            font-size: 18px;
            font-weight: 400;
            color: #e0e0e0;
            line-height: 1.7;
            max-width: 700px;
            margin-bottom: 15px;
            animation: fadeInSlideUp 0.6s ease-out 0.4s;
        }

        .newsletter button {
            cursor: pointer;
            background-color: #E74C3C;
            padding: 18px 40px;
            font-size: 20px;
            font-weight: 600;
            color: #fff;
            border: none;
            border-radius: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.3);
            animation: fadeInSlideUp 0.6s ease-out 0.6s;
        }

        .newsletter button:hover {
            background-color: #C0392B;
            transform: translateY(-3px) scale(1.03);
            box-shadow: 0 8px 20px rgba(192, 57, 43, 0.4);
        }

        .newsletter button:active {
            transform: translateY(-1px) scale(0.98);
            box-shadow: 0 3px 10px rgba(192, 57, 43, 0.3);
        }
    </style>