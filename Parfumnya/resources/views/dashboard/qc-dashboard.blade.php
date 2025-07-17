<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Quality Control Detail - Essence Elegance</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600&family=Montserrat:wght@300;400;600&display=swap');
        :root {
            --primary-color: #1a1a1a;
            --secondary-color: #f4f4f4;
            --accent-color: #d4af37;
            --text-color: #333333;
            --bg-color: #ffffff;
            --success-color: #28a745;
            --danger-color: #dc3545;
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
            max-width: 1000px;
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

        .back-btn, .submit-btn, .change-status-btn {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 400;
            font-size: 14px;
            padding: 8px 16px;
            border: 1px solid var(--primary-color);
            border-radius: 20px;
            transition: all 0.3s ease;
            background-color: transparent;
            cursor: pointer;
            display: inline-block;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .back-btn:hover, .submit-btn:hover, .change-status-btn:hover {
            background-color: var(--primary-color);
            color: var(--bg-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .back-btn, .submit-btn, .change-status-btn {
            margin-top: 20px;
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

        h1 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 36px;
            font-weight: 300;
            color: var(--primary-color);
            margin-top: 100px;
            margin-bottom: 30px;
            text-align: center;
        }
        h2 {
            font-family: 'Cormorant Garamond', serif;
            font-weight: 600;
            font-size: 24px;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        h2 span {
            font-family: 'Cormorant Garamond', serif; /* Untuk efek elegan */
            font-weight: 400;
            font-size: 28px;
        }

        .qc-detail {
            background-color: var(--bg-color);
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 40px;
        }

        .qc-detail p {
            margin-bottom: 10px;
            font-weight: 400;
        }

        .qc-detail strong {
            font-weight: 600;
            color: var(--primary-color);
        }

        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            z-index: 800;
        }

        .qc-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: var(--bg-color);
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .qc-table th, .qc-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .qc-table th {
            background-color: var(--secondary-color);
            font-weight: 600;
            color: var(--primary-color);
        }

        .qc-table tr:last-child td {
            border-bottom: none;
        }

        .qc-table select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-family: 'Montserrat', sans-serif;
        }

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            justify-content: center;
        }

        .submit-to-production, .submit-to-warehouse {
            padding: 10px 20px;
            border-radius: 20px;
            border: none;
            cursor: pointer;
            font-family: 'Montserrat', sans-serif;
            font-weight: 500;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .submit-to-production {
            background-color: var(--danger-color);
            color: white;
        }

        .submit-to-warehouse {
            background-color: var(--success-color);
            color: white;
        }

        .submit-to-production:hover, .submit-to-warehouse:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .rejection-reason {
            margin-top: 20px;
            display: none;
        }

        .rejection-reason textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-family: 'Montserrat', sans-serif;
            margin-top: 10px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 10px;
        }

        .modal-content h2 {
            margin-top: 0;
        }

        .modal-content select, .modal-content textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .modal-content button {
            padding: 10px 20px;
            margin-right: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .modal-content button:last-child {
            margin-right: 0;
        }

        .submit-to-production, .submit-to-warehouse {
            display: none;
            margin-top: 10px;
        }

        .start-qc-btn {
            background-color: var(--accent-color);
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-family: 'Montserrat', sans-serif;
            font-weight: 500;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .start-qc-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        canvas {
            display: block; /* Menghindari masalah ukuran dengan elemen inline */
            max-width: 100%; /* Grafik responsif */
            margin: 0 auto; /* Grafik terpusat */
            height: 300px; /* Atur tinggi grafik */
            width: 100%; /* Grafik mengikuti lebar kontainer */
        }

        .summary-boxes {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 30px;
        }

        .summary-box {
            background-color: var(--secondary-color);
            padding: 20px;
            border-radius: 10px;
            width: 30%;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .summary-box h3 {
            font-size: 20px;
            font-weight: 600;
            color: var(--primary-color);
        }

        .summary-box p {
            font-size: 18px;
            font-weight: 500;
            color: var(--primary-color);
        }

        .chart-container {
            display: flex;
            justify-content: space-between;
            gap: 20px; /* Ensures there's a gap between the charts */
        }

        canvas {
            max-width: 48%; /* Ensure both charts take up 48% of the width */
            height: auto;
        }

    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">Essence Elegance</div>
            <a href="{{'/'}}" class="login-btn">Log Out</a>
        </header>

        <button id="sidebar-toggle">☰</button>

        <div class="sidebar-touch-area"></div>
        <div class="sidebar-overlay"></div>
        <aside class="sidebar">
            <ul>
                <li><a href="{{'/new-dashboard-qc'}}">Home</a></li>
                <li><a href="{{'/qc-dashboard'}}">Dashboard</a></li>
                <li><a href="{{'/qc'}}">Quality Control</a></li>
            </ul>
        </aside>

        <main>
            <h1>Quality Control Dashboard</h1>

            <!-- Informasi Summary: Total New, Approved, Rejected -->
            <div class="summary-boxes">
                <div class="summary-box">
                    <h3>Total New</h3>
                    <p>{{ $totalNew }}</p>
                </div>
                <div class="summary-box">
                    <h3>Total Approved</h3>
                    <p>{{ $totalApproved }}</p>
                </div>
                <div class="summary-box">
                    <h3>Total Rejected</h3>
                    <p>{{ $totalRejected }}</p>
                </div>
            </div>

            <!-- Chart for QC Status -->
            <h2>Status Summary</h2>
            <div class="chart-container">
                <canvas id="qcStatusChart"></canvas>
            </div>

            <!-- Chart for Product Approval -->
            <h2>Product Approval/Rejected</h2>
            <div class="chart-container">
                <canvas id="productChart"></canvas>
            </div>

        </main>



    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebar = document.querySelector('.sidebar');
        const main = document.querySelector('main');
        const sidebarTouchArea = document.querySelector('.sidebar-touch-area');
        const sidebarOverlay = document.querySelector('.sidebar-overlay');

        sidebarToggle.addEventListener('click', toggleSidebar);
        sidebarOverlay.addEventListener('click', closeSidebar);

        let touchStartX = 0;
        let touchEndX = 0;

        sidebarTouchArea.addEventListener('touchstart', e => {
            touchStartX = e.changedTouches[0].screenX;
        });

        sidebarTouchArea.addEventListener('touchend', e => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        });

        function handleSwipe() {
            if (touchEndX - touchStartX > 50) {
                openSidebar();
            }
        }

        sidebar.addEventListener('touchstart', e => {
            touchStartX = e.changedTouches[0].screenX;
        });

        sidebar.addEventListener('touchend', e => {
            touchEndX = e.changedTouches[0].screenX;
            if (touchStartX - touchEndX > 50) {
                closeSidebar();
            }
        });

        function toggleSidebar() {
            sidebar.classList.toggle('open');
            main.classList.toggle('sidebar-open');
            sidebarOverlay.style.display = sidebar.classList.contains('open') ? 'block' : 'none';
        }

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

        // Status Summary Data
        
        const statusData = @json($statusData);
        const statusLabels = statusData.map(data => data.status);
        const statusCounts = statusData.map(data => data.count);

        const ctxStatus = document.getElementById('qcStatusChart').getContext('2d');
        new Chart(ctxStatus, {
            type: 'pie',
            data: {
                labels: statusLabels,
                datasets: [{
                    data: statusCounts,
                    backgroundColor: ['#8B4513', '#D2B48C', '#F5DEB3']
                }]
            }
        });

        // Product Approval/Rejected Data
        const productData = @json($productData);
        const productLabels = productData.map(data => data.nama_produk);
        const approvedCounts = productData.map(data => data.approved);
        const rejectedCounts = productData.map(data => data.rejected);

        const ctxProduct = document.getElementById('productChart').getContext('2d');
        new Chart(ctxProduct, {
            type: 'bar',
            data: {
                labels: productLabels,
                datasets: [
                    {
                        label: 'Approved',
                        data: approvedCounts,
                        backgroundColor: '#8B4513'
                    },
                    {
                        label: 'Rejected',
                        data: rejectedCounts,
                        backgroundColor: '#F5DEB3'
                    }
                ]
            }
        });

       // Menghitung Total Approved dan Rejected
        const totalApproved = productData.reduce((sum, data) => sum + data.approved, 0);
        const totalRejected = productData.reduce((sum, data) => sum + data.rejected, 0);

        // Menampilkan total ke dalam elemen HTML
        document.querySelector('.summary p:nth-child(2)').innerHTML = `<strong>Total Approved:</strong> ${totalApproved}`;
        document.querySelector('.summary p:nth-child(3)').innerHTML = `<strong>Total Rejected:</strong> ${totalRejected}`;
        
    </script>
</body>
</html>
