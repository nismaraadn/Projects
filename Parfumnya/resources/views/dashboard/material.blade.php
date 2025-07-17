<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Material</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .chart-container {
            width: 80%;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="chart-container">
        <h1>Material Available Quantity</h1>
        <canvas id="materialChart"></canvas>
    </div>

    <div class="chart-container2">
        <h1>Product Available Quantity</h1>
        <canvas id="materialChart"></canvas>
    </div>

    <script>
        const chartData = @json($chartData);

        const ctx = document.getElementById('materialChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: chartData.labels, // Nama Material
                datasets: [{
                    label: 'Quantity',
                    data: chartData.data, // Kuantitas
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(231, 74, 59, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(100, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(233, 30, 99, 0.2)',
                        'rgba(66, 135, 245, 0.2)',
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(231, 74, 59, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(100, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(233, 30, 99, 1)',
                        'rgba(66, 135, 245, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    },
                    tooltip: {
                        enabled: true
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        
    </script>
</body>
</html>
