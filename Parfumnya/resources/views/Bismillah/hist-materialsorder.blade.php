@extends('layouts.app')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600&family=Montserrat:wght@300;400;600&display=swap');
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

    .btn-done {
        background-color: #808080; /* Initial grey color */
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

    .btn-done.received {
        background-color: green; /* Green color when received */
        pointer-events: none; /* Prevents further clicks */
    }

    @media (max-width: 768px) {
        .modal-content {
            width: 95%;
            padding: 30px;
        }
    }
</style>
@section('content')
<div class="container">
    <h1>---</h1>
    <h1>History Materials Order</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Material ID</th>
                <th>Material Name</th>
                <th>Price</th>
                <th>Measure</th>
                <th>Quantity</th>
                <th>Description</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($materials as $material)
                <tr>
                    <td>{{ $material->OrderID }}</td>
                    <td>{{ $material->MaterialID }}</td>
                    <td>{{ $material->MaterialName }}</td>
                    <td>{{ number_format($material->Price, 2) }}</td>
                    <td>{{ $material->Measure }}</td>
                    <td>{{ $material->Quantity }}</td>
                    <td>{{ $material->Description }}</td>
                    <td>{{ $material->Status ? 'Received' : 'Not Received' }}</td>
                    <td>
                        <button class="btn-status {{ $material->Status ? 'received' : 'not-received' }}"
                                data-id="{{ $material->OrderID }}"
                                {{ $material->Status ? 'disabled' : '' }}>
                            {{ $material->Status ? 'Received' : 'Mark as Received' }}
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data material order.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    {{ $materials->links() }}
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const statusButtons = document.querySelectorAll('.btn-status');

        statusButtons.forEach(button => {
            button.addEventListener('click', function() {
                if (!this.classList.contains('received')) {
                    const orderId = this.getAttribute('data-id');
                    updateMaterialStatus(orderId, this);
                }
            });
        });
    });

    function updateMaterialStatus(orderId, button) {
        fetch(`/update-material-status/${orderId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            },
            body: JSON.stringify({ status: true })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                button.classList.remove('not-received');
                button.classList.add('received');
                button.textContent = 'Received';
                button.disabled = true;
                
                // Update status text in the table
                const statusCell = button.closest('tr').querySelector('td:nth-child(8)');
                statusCell.textContent = 'Received';

                console.log('Status updated successfully');
            } else {
                console.error('Failed to update status:', data.message);
                alert('Failed to update status. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while updating status. Please try again.');
        });
    }
</script>
@endsection