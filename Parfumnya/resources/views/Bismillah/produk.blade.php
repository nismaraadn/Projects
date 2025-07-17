@extends('layouts.app')
<style>
    h1 {
        font-family: 'Cormorant Garamond', serif;
        font-size: 32px;
        margin-bottom: 20px;
        color: var(--primary-color);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid var(--secondary-color);
    }

    th {
        background-color: var(--secondary-color);
        color: var(--primary-color);
        font-weight: 600;
        text-transform: uppercase;
    }

    tr:hover {
        background-color: rgba(0, 0, 0, 0.02);
    }

    .btn {
        background-color: var(--primary-color);
        color: var(--bg-color);
        padding: 10px 20px;
        text-decoration: none;
        font-weight: 400;
        display: inline-block;
        border: none;
        cursor: pointer;
        transition: all 0.3s;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 14px;
        border-radius: 30px;
    }

    .btn:hover {
        background-color: var(--accent-color);
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    .add-stock, #add-new-item {
        background-color: transparent;
        color: var(--primary-color);
        border: 2px solid var(--primary-color);
    }

    .add-stock:hover, #add-new-item:hover {
        background-color: var(--primary-color);
        color: var(--bg-color);
    }


    .modal {
        display: none;
        position: fixed;
        z-index: 1002;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        overflow: auto; /* Pastikan overflow diatur untuk scroll */
    }

    .modal-content {
        background-color: var(--bg-color);
        margin: 10% auto;
        padding: 20px; /* Ubah padding jika perlu */
        border: 1px solid var(--secondary-color);
        width: 90%;
        max-width: 500px;
        max-height: 80%; /* Tambahkan batas tinggi */
        overflow-y: auto; /* Tambahkan overflow-y untuk scroll secara vertikal */
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        border-radius: 15px;
        position: relative;
    }

    .close {
        position: absolute;
        right: 20px;
        top: 15px;
        color: var(--primary-color);
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
        transition: color 0.3s;
    }

    .close:hover,
    .close:focus {
        color: var(--accent-color);
    }
    #update-item-form {
        display: flex;
        flex-direction: column;
    }

    #update-item-form h2 {
        font-family: 'Cormorant Garamond', serif;
        font-weight: 300;
        color: var(--primary-color);
        font-size: 32px;
        margin-bottom: 20px;
        text-align: center;
    }

    #update-product-name {
        font-family: 'Montserrat', sans-serif;
        font-weight: 600;
        color: var(--primary-color);
        font-size: 18px;
        margin-bottom: 20px;
        text-align: center;
    }

    #update-item-form input[type="number"] {
        padding: 12px;
        margin-bottom: 20px;
        border: 1px solid var(--secondary-color);
        border-radius: 8px;
        font-size: 16px;
        transition: border-color 0.3s;
    }

    #update-item-form input[type="number"]:focus {
        outline: none;
        border-color: var(--accent-color);
    }

    #update-item-form .btn {
        background-color: var(--primary-color);
        color: var(--bg-color);
        padding: 12px 20px;
        text-decoration: none;
        font-weight: 600;
        display: inline-block;
        border: none;
        cursor: pointer;
        transition: all 0.3s;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 16px;
        border-radius: 30px;
        width: 100%;
        text-align: center;
    }

    #update-item-form .btn:hover {
        background-color: var(--accent-color);
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }

    @media (max-width: 768px) {
        .modal-content {
            width: 95%;
            padding: 30px;
        }
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
    }
    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
    }
    .form-group textarea {
        height: 100px;
    }
</style>
@section('content')
<div class="container">
    <h1>---</h1>
    <h1>Product Inventory</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->ProductID }}</td>
                <td>{{ $product->ProductName }}</td>
                <td>{{ number_format($product->Price, 2) }}</td>
                <td>{{ $product->Stock }}</td>
                <td>{{ $product->Description }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
</div>

@endsection