@extends('layouts.app')
@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600&family=Montserrat:wght@300;400;600&display=swap');
    
    :root {
        --primary-color: #1a1a1a;
        --secondary-color: #f4f4f4;
        --accent-color: #d4af37;
        --text-color: #333333;
        --bg-color: #ffffff;
    }

    .product-dashboard {
        font-family: 'Montserrat', sans-serif;
        background-color: var(--bg-color);
        color: var(--text-color);
    }

    .product-header {
        background-color: var(--secondary-color);
        padding: 40px 0;
        text-align: center;
        margin-bottom: 30px;
    }

    h1, h3 {
        font-family: 'Cormorant Garamond', serif;
        color: var(--primary-color);
        font-weight: 300;
    }

    h1 {
        font-size: 36px;
        margin-top: 100px;
        margin-bottom: 30px;
        text-align: center;
    }

    h3 {
        margin-bottom: 20px;
        text-align: center;
    }

    .inventory-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-bottom: 30px;
    }

    .inventory-stat-card {
        background-color: var(--secondary-color);
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        text-align: center;
        transition: transform 0.3s ease;
    }

    .inventory-stat-card:hover {
        transform: translateY(-5px);
    }

    .inventory-stat-card .stat-icon {
        font-size: 36px;
        color: var(--accent-color);
        margin-bottom: 15px;
    }

    .inventory-stat-card .stat-number {
        font-size: 28px;
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 10px;
    }

    .inventory-stat-card .stat-label {
        font-size: 14px;
        color: var(--text-color);
    }

    .product-inventory-section {
        display: flex;
        gap: 30px;
        margin-bottom: 30px;
    }

    .product-inventory-section > div {
        flex: 1;
    }


    .product-details-table table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }

    .product-details-table thead {
        background-color: var(--primary-color);
        color: var(--bg-color);
    }

    .product-details-table th,
    .product-details-table td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid rgba(0,0,0,0.1);
    }

    .stock-badge {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
    }

    .stock-badge-low {
        background-color: #ff6b6b;
        color: white;
    }

    .stock-badge-medium {
        background-color: #feca57;
        color: var(--primary-color);
    }

    .stock-badge-high {
        background-color: #6bc177;
        color: white;
    }

    @media (max-width: 768px) {
        .inventory-stats {
            grid-template-columns: 1fr;
        }

        .product-inventory-section {
            flex-direction: column;
        }
    }
</style>

<div class="product-dashboard container">
    <h1>Product Dashboard</h1>

    <div class="inventory-stats">
        <div class="inventory-stat-card">
            <div class="stat-icon">📦</div>
            <div class="stat-number">{{ $totalProducts }}</div>
            <div class="stat-label">Total Products</div>
        </div>
        <div class="inventory-stat-card">
            <div class="stat-icon">📊</div>
            <div class="stat-number">{{ $totalStock }}</div>
            <div class="stat-label">Total Stock</div>
        </div>
        <div class="inventory-stat-card">
            <div class="stat-icon">🔄</div>
            <div class="stat-number">{{ $stockDistribution->sum('count') }}</div>
            <div class="stat-label">Stock Distribution</div>
        </div>
    </div>

    <!-- Product Stock Distribution and Product Inventory Details -->
    <div class="product-inventory-section">
        <!-- Bar Chart for Product Stock -->
        <div>
            <h3>Product Stock Distribution</h3>
            <div style="max-width: 600px; margin: 0 auto;">
                <canvas id="stockChart"></canvas>
            </div>
        </div>

        <!-- Product Inventory Details -->
        <div>
            <div class="product-details-table">
                <h3>Product Inventory Details</h3>
                <div style="max-height: 400px; overflow-y: auto;">
                    <table>
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Stock</th>
                                <th>Stock Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->ProductName }}</td>
                                <td>{{ $product->Stock }}</td>
                                <td>
                                    @switch($product->StockStatus)
                                        @case('Low Stock')
                                            <span class="stock-badge stock-badge-low">{{ $product->StockStatus }}</span>
                                            @break
                                        @case('Medium Stock')
                                            <span class="stock-badge stock-badge-medium">{{ $product->StockStatus }}</span>
                                            @break
                                        @case('High Stock')
                                            <span class="stock-badge stock-badge-high">{{ $product->StockStatus }}</span>
                                            @break
                                    @endswitch
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Pass product names and stock values as JavaScript variables
    const productNames = @json($productNames);
    const stockValues = @json($stocks);

    // Create a bar chart to show stock for each product
    const stockChart = new Chart(document.getElementById('stockChart'), {
        type: 'bar',
        data: {
            labels: productNames,  // Use product names as labels
            datasets: [{
                label: 'Stock per Product',
                data: stockValues,  // Use stock values as the data
                backgroundColor: '#D2B48C',
                borderColor: '#8B4513',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
