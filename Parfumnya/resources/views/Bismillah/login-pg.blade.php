<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In to Essence Elegance</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600&family=Montserrat:wght@300;400;600&display=swap');

        :root {
            --primary-color: #1a1a1a;
            --secondary-color: #f4f4f4;
            --accent-color: #d4af37;
            --text-color: #333333;
            --bg-color: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            font-family: 'Montserrat', sans-serif;
            height: 100%;
            background-color: var(--bg-color);
            color: var(--text-color);
            line-height: 1.6;
        }

        .container {
            display: flex;
            height: 100%;
            max-width: 1200px;
            margin: 0 auto;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .login-form {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-color: var(--bg-color);
        }

        .login-form h2 {
            font-family: 'Cormorant Garamond', serif;
            color: var(--primary-color);
            margin-bottom: 10px;
            font-size: 36px;
            font-weight: 300;
        }

        .login-form p {
            color: var(--text-color);
            margin-bottom: 30px;
            font-size: 16px;
            font-weight: 300;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type="email"], input[type="password"] {
            margin-bottom: 15px;
            padding: 12px;
            border: 1px solid var(--secondary-color);
            border-radius: 4px;
            font-size: 14px;
            font-family: 'Montserrat', sans-serif;
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            color: var(--text-color);
            font-size: 14px;
        }

        .remember-me input[type="checkbox"] {
            margin-right: 8px;
        }

        button {
            background-color: var(--primary-color);
            color: var(--bg-color);
            border: none;
            padding: 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-family: 'Montserrat', sans-serif;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: var(--accent-color);
        }

        .links {
            margin-top: 20px;
        }

        .links a {
            display: block;
            color: var(--primary-color);
            text-decoration: none;
            margin-bottom: 10px;
            transition: color 0.3s;
            font-size: 14px;
        }

        .links a:hover {
            color: var(--accent-color);
        }

        .video-section {
            flex: 1;
            background-color: var(--secondary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        .video-section video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .quote {
            position: absolute;
            bottom: 40px;
            left: 0;
            right: 0;
            text-align: center;
            color: var(--bg-color);
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
        }

        .quote h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 24px;
            margin-bottom: 10px;
            font-weight: 300;
        }

        .quote p {
            font-size: 14px;
            font-weight: 300;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .video-section {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-form">
            <h2>Sign In to Essence Elegance</h2>
            <p>Immerse yourself in a world of sublime scents</p>
            <form>
                @csrf
                <input type="email" name="email" placeholder="Your email" required>
                <input type="password" name="password" placeholder="Your password" required>
                <a href="{{ route('new-dashboard') }}">
                    <button type="button">Enter Essence Elegance</button>
                </a>
            </form>
        </div>
        <div class="video-section">
            <video autoplay muted loop>
                <source src="{{ asset('images/parfum.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="quote">
                <h3>"Perfume is the art that makes memory speak."</h3>
                <p>- Francis Kurkdjian</p>
            </div>
        </div>
    </div>
</body>
</html>