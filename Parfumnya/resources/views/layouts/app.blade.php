<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Essence Elegance</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
            top: 20px;
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
            transition: left 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            z-index: 900;
        }

        .sidebar.open {
            left: 0;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
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

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <header>
            <div class="logo">Essence Elegance</div>
            <a href="{{'/'}}" class="login-btn">Log Out</a>
        </header>

        <button id="sidebar-toggle">☰</button>

        <div class="sidebar-touch-area"></div>
        <div class="sidebar-overlay"></div>
        <aside class="sidebar">
            <ul>
                <li><a href="{{'/new-dashboard'}}">Dashboard</a></li>
                <li><a href="{{'/materials'}}">Materials</a></li>
                <li><a href="{{'/hist-materialsorder'}}">History Materials Order</a></li>
                <li><a href="{{'/products'}}">Product</a></li>
            </ul>
        </aside>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebar = document.querySelector('.sidebar');
        const main = document.querySelector('main');
        const sidebarTouchArea = document.querySelector('.sidebar-touch-area');
        const sidebarOverlay = document.querySelector('.sidebar-overlay');

        function openSidebar() {
            sidebar.classList.add('open');
            main.classList.add('sidebar-open');
            sidebarOverlay.style.display = 'block';
        }

        function closeSidebar() {
            sidebar.classList.remove('open');
            main.classList.remove('sidebar-open');
            sidebarOverlay.style.display = 'none';
        }

        sidebarToggle.addEventListener('click', () => {
            if (sidebar.classList.contains('open')) {
                closeSidebar();
            } else {
                openSidebar();
            }
        });

        sidebarTouchArea.addEventListener('click', openSidebar);
        sidebarOverlay.addEventListener('click', closeSidebar);

        sidebar.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 768) {
                    closeSidebar();
                }
            });
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
                closeSidebar();
            }
        });

        // New JavaScript for the "Received" buttons
        document.addEventListener('DOMContentLoaded', function() {
            const receivedButtons = document.querySelectorAll('.btn-done');

            receivedButtons.forEach(button => {
                button.addEventListener('click', function() {
                    if (!this.classList.contains('received')) {
                        this.classList.add('received');
                        this.textContent = 'Received';
                        
                        // Save the state
                        saveButtonState(this);
                    }
                });

                // Check and apply saved state on page load
                loadButtonState(button);
            });
        });

        function saveButtonState(button) {
            const buttonId = button.closest('tr').querySelector('td:first-child').textContent;
            localStorage.setItem('button_' + buttonId, 'received');
        }

        function loadButtonState(button) {
            const buttonId = button.closest('tr').querySelector('td:first-child').textContent;
            const state = localStorage.getItem('button_' + buttonId);
            if (state === 'received') {
                button.classList.add('received');
                button.textContent = 'Received';
            }
        }
    </script>
</body>
</html>