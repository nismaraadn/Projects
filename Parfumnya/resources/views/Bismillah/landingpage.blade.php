<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Essence Elegance - Perfume Manufacture</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600&family=Montserrat:wght@300;400;600&display=swap');

        :root {
            --primary-color: #1a1a1a;
            --secondary-color: #f4f4f4;
            --accent-color: #d4af37;
            --text-color: #333333;
            --bg-color: #ffffff;
        }

        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Montserrat', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        header {
            background-color: var(--bg-color);
            padding: 20px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .logo {
            font-family: 'Cormorant Garamond', serif;
            font-size: 28px;
            font-weight: 600;
            color: var(--primary-color);
            text-align: center;
        }

        .login-btn {
            position: absolute;
            right: 20px;
            top: 5px;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 400;
            font-size: 14px;
            padding: 8px 16px;
            border: 1px solid var(--primary-color);
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        .login-btn:hover {
            background-color: var(--primary-color);
            color: var(--bg-color);
        }

        .sidebar {
            position: fixed;
            left: -240px;
            top: 0;
            bottom: 0;
            width: 240px;
            background-color: var(--secondary-color);
            padding: 80px 20px 20px;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            transition: left 0.3s ease-in-out;
            z-index: 900;
        }

        .sidebar.open {
            left: 0;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 15px;
        }

        .sidebar ul li a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 400;
            display: block;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: rgba(0,0,0,0.05);
        }

        #sidebar-toggle {
            position: fixed;
            left: 20px;
            top: 20px;
            z-index: 1001;
            background-color: transparent;
            color: var(--primary-color);
            border: none;
            padding: 10px;
            cursor: pointer;
            font-size: 20px;
        }

        main {
            padding: 100px 20px 20px;
            transition: margin-left 0.3s ease-in-out;
        }

        main.sidebar-open {
            margin-left: 240px;
        }

        .hero {
            background-color: var(--secondary-color);
            padding: 80px 0;
            text-align: center;
            margin-bottom: 60px;
            position: relative;
            overflow: hidden;
        }

        .hero h1 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 48px;
            margin-bottom: 20px;
            color: var(--primary-color);
            font-weight: 300;
        }

        .hero p {
            font-size: 18px;
            max-width: 600px;
            margin: 0 auto;
            color: var(--text-color);
            font-weight: 300;
        }

        .hero-slider {
        position: relative;
        height: 400px;
        margin-top: 40px;
        overflow: hidden;
        }

        .hero-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .hero-slide.active {
            opacity: 1;
        }

        .hero-slide video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .slider-nav {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
        }

        .slider-nav-item {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: var(--bg-color);
            margin: 0 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .slider-nav-item.active {
            background-color: var(--accent-color);
        }

        .welcome-dashboard {
            background-color: var(--bg-color);
            padding: 60px 0;
            text-align: center;
            margin-bottom: 60px;
        }

        .welcome-dashboard h2 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 36px;
            font-weight: 300;
            margin-bottom: 20px;
            color: var(--primary-color);
        }

        .dashboard-cards {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
        }
        .dashboard-card {
            text-decoration: none;
            color: inherit;
        }

        .card-image {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 10px;
        }
        .dashboard-card {
            background-color: var(--secondary-color);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            flex: 1 1 200px;
            max-width: 250px;
            transition: transform 0.3s ease;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
        }

        .dashboard-card h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 24px;
            margin-bottom: 10px;
            color: var(--primary-color);
        }

        .dashboard-card p {
            font-size: 14px;
            color: var(--text-color);
        }

        .elegance-section {
            background-color: var(--secondary-color);
            padding: 60px 0;
            margin-bottom: 60px;
            text-align: center;
        }

        .elegance-section h2 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 36px;
            font-weight: 300;
            margin-bottom: 20px;
            color: var(--primary-color);
        }

        .elegance-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            margin-top: 40px;
        }

        .elegance-item {
            background-color: var(--bg-color);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .elegance-item:hover {
            transform: translateY(-5px);
        }

        .elegance-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .elegance-item h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 24px;
            margin-bottom: 10px;
            color: var(--primary-color);
        }

        .elegance-item p {
            font-size: 14px;
            color: var(--text-color);
        }

        .video-section {
            padding: 60px 0;
            margin-bottom: 60px;
            text-align: center;
        }

        .video-section h2 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 36px;
            font-weight: 300;
            margin-bottom: 20px;
            color: var(--primary-color);
        }

        .video-container {
            max-width: 800px;
            margin: 0 auto;
            background-color: var(--secondary-color);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .video-placeholder {
            width: 100%;
            height: 0;
            padding-bottom: 56.25%; /* 16:9 aspect ratio */
            background-color: var(--primary-color);
            position: relative;
            border-radius: 8px;
            overflow: hidden;
        }

        .video-placeholder::after {
            content: "Your Elegant Video Here";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: var(--bg-color);
            font-family: 'Cormorant Garamond', serif;
            font-size: 24px;
        }
        .our-team-section {
            background-color: var(--secondary-color);
            padding: 60px 0;
            margin-bottom: 60px;
            text-align: center;
        }

        .our-team-section h2 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 36px;
            font-weight: 300;
            margin-bottom: 40px;
            color: var(--primary-color);
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            max-width: 1000px;
            margin: 0 auto;
        }

        .team-member {
            background-color: var(--bg-color);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .team-member:hover {
            transform: translateY(-5px);
        }

        .team-member img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .team-member h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 24px;
            margin-bottom: 5px;
            color: var(--primary-color);
        }

        .team-member p {
            font-size: 14px;
            color: var(--text-color);
        }

        @media (max-width: 768px) {
            .team-grid {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
                gap: 20px;
            }
        }

        footer {
            background-color: var(--primary-color);
            color: var(--bg-color);
            padding: 40px 0;
            text-align: center;
        }

        footer p {
            font-size: 14px;
            font-weight: 300;
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 36px;
            }

            .hero p {
                font-size: 16px;
            }

            .dashboard-cards {
                flex-direction: column;
                align-items: center;
            }

            .dashboard-card {
                max-width: 100%;
            }

            .elegance-grid {
                grid-template-columns: 1fr;
            }
        }

        .sidebar-touch-area {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            width: 20px;
            z-index: 899;
        }

        .sidebar-overlay {
            position: fixed;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0,0,0,0.5);
            z-index: 899;
            display: none;
        }

        .sidebar {
            /* ... (previous sidebar styles remain the same) ... */
            transition: left 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .sidebar.open {
            left: 0;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }

        /* Add a visual indicator for the touch area */
        .sidebar-touch-area::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 5px;
            width: 3px;
            height: 30px;
            background-color: var(--accent-color);
            border-radius: 3px;
            transform: translateY(-50%);
        }

        @media (min-width: 769px) {
            .sidebar-touch-area {
                display: none;
            }
        }

        footer {
            background-color: var(--primary-color);
            color: var(--bg-color);
            padding: 40px 0;
            text-align: center;
            margin-top: 60px;
        }

        footer p {
            font-size: 14px;
            font-weight: 300;
        }
        .login-buttons {
            position: absolute;
            right: 20px;
            top: 20px;
            display: flex;
            gap: 10px;
        }

        .login-button {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            padding: 10px 20px;
            border: 2px solid var(--primary-color);
            border-radius: 25px;
            transition: all 0.3s ease;
            background-color: transparent;
            cursor: pointer;
            outline: none;
        }

        .login-button:hover {
            background-color: var(--primary-color);
            color: var(--bg-color);
        }

        /* Dropdown styles */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: var(--bg-color);
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 8px;
            overflow: hidden;
            top: 100%;
            left: 0;
            margin-top: 5px;
        }

        .dropdown-content a {
            color: var(--primary-color);
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s ease;
        }

        .dropdown-content a:hover {
            background-color: var(--secondary-color);
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Arrow for dropdown */
        .dropdown .login-button::after {
            content: ' ▼';
            font-size: 12px;
            margin-left: 5px;
        }
        .button-container {
            margin: 10px 0; /* Tambahkan jarak sekitar tombol */
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff; /* Warna latar belakang */
            color: white; /* Warna teks */
            text-decoration: none; /* Menghilangkan garis bawah */
            font-weight: bold; /* Membuat teks lebih tebal */
            transition: background-color 0.3s; /* Efek transisi */
        }

        .btn:hover {
            background-color: #0056b3; /* Warna saat hover */
}
    </style>
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <div class="logo">Essence Elegance</div>
            <div class="login-buttons">
            <div class="button-container">
                <a href="{{ route('login.form') }}" class="login-btn ">EMPLOYEE</a>
            </div>
    </div>
        </header>
        <main>
            <section class="hero">
                <div class="container">
                <h1>Unveiling Olfactory Masterpieces</h1>
                <p>Immerse yourself in a world of sublime scents, where each fragrance tells a story of sophistication and allure.</p>
            </div>
            <div class="hero-slider">
                <div class="hero-slide active">
                    <video autoplay loop muted playsinline>
                        <source src="{{ asset('images/perfume8.mp4') }}" type="video/mp4">
                    </video>
                </div>
                <div class="hero-slide">
                    <video autoplay loop muted playsinline>
                        <source src="{{ asset('images/perfume7.mp4') }}" type="video/mp4">
                    </video>
                </div>
                <div class="hero-slide">
                    <video autoplay loop muted playsinline>
                        <source src="{{ asset('images/perfume9.mp4') }}" type="video/mp4">
                    </video>
                </div>
                <div class="slider-nav">
                    <div class="slider-nav-item active"></div>
                    <div class="slider-nav-item"></div>
                    <div class="slider-nav-item"></div>
                </div>
            </div>
            </section>

            <section class="welcome-dashboard">
                <h2>Welcome to Your Fragrance Journey</h2>
                <div class="dashboard-cards">
                    <a href="#" class="dashboard-card">
                        <img src="/images/perfume6.jpg" alt="Best Seller" class="card-image" id="bestSellerImage">
                        <h3>Best Seller</h3>
                        <p>Our most popular fragrances</p>
                    </a>
                    <a href="#" class="dashboard-card">
                        <img src="/images/perfume5.jpg" alt="Latest Collections" class="card-image" id="LatestCollectionsImage">
                        <h3>Latest Collections</h3>
                        <p>Our newest fragrances releases</p>
                    </a>
                    <a href="#" class="dashboard-card">
                        <img src="/images/perfume6.jpg" alt="On Collaboration" class="card-image" id="OnCollaborationImage">
                        <h3>On Collaboration</h3>
                        <p>Our exclusive partnerships with top designers</p>
                    </a>
                    <a href="#" class="dashboard-card">
                        <img src="/images/perfume4.jpg" alt="On Sale" class="card-image" id="OnSaleImage">
                        <h3>On Sale</h3>
                        <p>Our limited time offers on select fragrances</p>
                    </a>
                </div>
            </section>
            <section class="elegance-section">
                <h2>The Essence of Elegance</h2>
                <div class="elegance-grid">
                    <div class="elegance-item">
                        <img src="/images/perfume4.jpg" alt="Vanilla Whisper">
                        <h3>Vanilla Whisper</h3>
                        <p>A warm and inviting scent with creamy vanilla notes and a touch of amber</p>
                    </div>
                    <div class="elegance-item">
                        <img src="/images/perfume5.jpg" alt="Citrus Sunshine">
                        <h3>Citrus Sunshine</h3>
                        <p>A bright and uplifting fragrance with zesty lemon and sweet orange blossom</p>
                    </div>
                    <div class="elegance-item">
                        <img src="/images/perfume6.jpg" alt="Velvet Rose">
                        <h3>Velvet Rose</h3>
                        <p>A luxurious floral fragrance with deep, rich undertones</p>
                    </div>
                </div>
            </section>
            <section class="our-team-section">
                <h2>Our Team</h2>
                <div class="team-grid">
                    <div class="team-member">
                        <img src="/images/amel.jpg" alt="Fradinka Amelia Edyputri">
                        <h3>Fradinka Amelia Edyputri</h3>
                        <p>164221045</p>
                    </div>
                    <div class="team-member">
                        <img src="/images/manda.jpg" alt="Manda Diana Putri">
                        <h3>Manda Diana Putri</h3>
                        <p>164221048</p>
                    </div>
                    <div class="team-member">
                        <img src="/images/nismara.jpg" alt="Nismara Andini">
                        <h3>Nismara Andini</h3>
                        <p>164221075</p>
                    </div>
                    <div class="team-member">
                        <img src="/images/alvin.jpg"" alt="Ananda Alvin Bernerdian">
                        <h3>Ananda Alvin Bernerdian</h3>
                        <p>164221096</p>
                    </div>
                </div>
            </section>

            <footer>
            <p>&copy; 2023 Essence Elegance. All rights reserved.</p>
            </footer>
    </div>
    <script>
        // Handle resize events
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
                closeSidebar();
            }
        });

        // Add this script to your existing JavaScript
        document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('.hero-slide');
            const navItems = document.querySelectorAll('.slider-nav-item');
            let currentSlide = 0;

            function showSlide(index) {
                slides[currentSlide].classList.remove('active');
                navItems[currentSlide].classList.remove('active');
                slides[index].classList.add('active');
                navItems[index].classList.add('active');
                currentSlide = index;
            }

            function nextSlide() {
                let nextIndex = (currentSlide + 1) % slides.length;
                showSlide(nextIndex);
            }

            navItems.forEach((item, index) => {
                item.addEventListener('click', () => showSlide(index));
            });

            setInterval(nextSlide, 5000); // Change slide every 5 seconds
        });

        window.addEventListener('load', () => {
            const bestSellerImage = document.getElementById('bestSellerImage');
            const storedImage = localStorage.getItem('bestSellerImage');
            if (storedImage && bestSellerImage) {
                bestSellerImage.src = storedImage;
            }
        });

        window.addEventListener('load', () => {
            const LatestCollectionsImage = document.getElementById('LatestCollectionsImage');
            const storedImage = localStorage.getItem('LatestCollectionsImage');
            if (storedImage && LatestCollectionsImage) {
                LatestCollectionsImage.src = storedImage;
            }
        });

        window.addEventListener('load', () => {
            const OnCollaborationImage = document.getElementById('OnCollaborationImage');
            const storedImage = localStorage.getItem('OnCollaborationImage');
            if (storedImage && OnCollaborationImage) {
                OnCollaborationImage.src = storedImage;
            }
        });

        window.addEventListener('load', () => {
            const OnSaleImage = document.getElementById('OnSaleImage');
            const storedImage = localStorage.getItem('OnSaleImage');
            if (storedImage && OnSaleImage) {
                OnSaleImage.src = storedImage;
            }
        });
    </script>
</body>
</html>