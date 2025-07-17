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
    <h1>Materials</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h2 class="mt-4">Material Available</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Material ID</th>
                <th>Material Name</th>
                <th>Price</th>
                <th>Measure</th>
                <th>Quantity</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($materials as $material)
    <tr>
        <td>{{ $material->MaterialID }}</td>
        <td>{{ $material->MaterialName }}</td>
        <td>{{ number_format($material->Price, 2) }}</td>
        <td>{{ $material->Measure }}</td>
        <td>{{ $material->Quantity }}</td>
        <td>{{ $material->Description }}</td>
    </tr>
@endforeach
        </tbody>
    </table>
    {{ $materials->links() }}
    
    <button class="btn btn-primary" id="add-new-item">Add Materials Order</button>

    <!-- Add New Item Modal -->
    <div id="new-item-modal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Add New Material Order</h2>
            <form id="add-item-form" method="POST" action="{{ route('materialsorder.store') }}">
                @csrf
                <div class="form-group">
                    <label for="material-id">Material ID:</label>
                    <input type="text" name="MaterialID" id="material-id" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="material-name">Material Name:</label>
                    <input type="text" name="MaterialName" id="material-name" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" name="Price" id="price" min="0" step="0.01" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="measure">Measure:</label>
                    <input type="text" name="Measure" id="measure" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" name="Quantity" id="quantity" min="1" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="Description" id="description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Add Item</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    // Modal functionality
    const addItemModal = document.getElementById('new-item-modal');
    const addNewItemBtn = document.getElementById('add-new-item');
    const closeButton = document.querySelector('.close');

    addNewItemBtn.onclick = function() {
        addItemModal.style.display = "block";
    }

    closeButton.onclick = function() {
        addItemModal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == addItemModal) {
            addItemModal.style.display = "none";
        }
    }
    document.addEventListener('DOMContentLoaded', function() {
        const materialIdInput = document.getElementById('material-id');
        const materialNameInput = document.getElementById('material-name');
        const priceInput = document.getElementById('price');
        const measureInput = document.getElementById('measure');
        const form = document.getElementById('add-item-form');

        materialIdInput.addEventListener('blur', function() {
            const materialId = this.value;
            if (materialId) {
                fetch(`/check-material/${materialId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.exists) {
                            materialNameInput.value = data.MaterialName;
                            priceInput.value = data.Price;
                            measureInput.value = data.Measure;
                        } else {
                            // Clear fields if MaterialID doesn't exist
                            materialNameInput.value = '';
                            priceInput.value = '';
                            measureInput.value = '';
                        }
                    });
            }
        });

        
    });
</script>
@endsection