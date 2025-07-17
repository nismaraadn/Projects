<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reproduction Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1, h2 {
            text-align: center;
            color: #343a40;
            margin-bottom: 20px;
        }

        canvas {
            margin: 20px auto;
            display: block;
            max-width: 800px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #dee2e6;
            padding: 10px;
            text-align: center;
        }

        table th {
            background-color: #007bff;
            color: #fff;
            text-transform: uppercase;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #d0ebff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Reproduction Dashboard</h1>

        <!-- Chart for Reproduction Status -->
        <h2>Reproduction Status Summary</h2>
        <canvas id="reproductionStatusChart"></canvas>

        <!-- Reproduction Amount Table -->
        <h2>Reproduction Amount Details</h2>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Date</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reproductionData as $data)
                <tr>
                    <td>{{ $data->ProductName }}</td>
                    <td>{{ $data->Tanggal }}</td>
                    <td>{{ $data->amount }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        // Data from Controller
        const reproductionChartData = @json($reproductionChartData);
        const reproductionLabels = reproductionChartData.map(data => data.status);
        const reproductionCounts = reproductionChartData.map(data => data.count);

        // Reproduction Status Chart
        const ctxReproductionStatus = document.getElementById('reproductionStatusChart').getContext('2d');
        new Chart(ctxReproductionStatus, {
            type: 'doughnut',
            data: {
                labels: reproductionLabels,
                datasets: [{
                    data: reproductionCounts,
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#FF9F40']
                }]
            }
        });
    </script>

</body>
</html>
