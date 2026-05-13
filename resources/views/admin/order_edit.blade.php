@extends('admin.layouts.app')

@section('content')

<style>
.edit-wrapper{
    max-width: 750px;
    margin: 30px auto;
}

.edit-card{
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    overflow: hidden;
}

/* Header */
.edit-header{
    background: linear-gradient(135deg, #ffc107, #ffb300);
    padding: 18px 25px;
    color: #fff;
}

.edit-header h3{
    margin: 0;
    font-weight: 700;
    font-size: 20px;
}

/* Body */
.edit-body{
    padding: 25px;
}

/* Inputs */
.form-control{
    border-radius: 10px;
    padding: 10px 12px;
    border: 1px solid #e5e7eb;
    transition: 0.3s;
}

.form-control:focus{
    border-color: #ffc107;
    box-shadow: 0 0 0 0.15rem rgba(255,193,7,.25);
}

/* Button */
.btn-yellow{
    background: #ffc107;
    border: none;
    color: #000;
    font-weight: 600;
    padding: 10px 18px;
    border-radius: 10px;
    transition: 0.3s;
}

.btn-yellow:hover{
    background: #ffb300;
    transform: translateY(-2px);
}

/* Labels */
label{
    font-weight: 600;
    margin-bottom: 5px;
    color: #374151;
}

/* Grid spacing */
.form-group{
    margin-bottom: 15px;
}
</style>

<div class="edit-wrapper">

    <div class="edit-card">

        <div class="edit-header">
            <h3>✏️ Edit Order</h3>
        </div>

        <div class="edit-body">

            <form method="POST" action="{{ url('admin/orders/update/'.$order->id) }}">
                @csrf

                <div class="form-group">
                    <label>Customer Name</label>
                    <input type="text" name="name" value="{{ $order->name }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" value="{{ $order->phone }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" value="{{ $order->address }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" name="qty" value="{{ $order->qty }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>Total Amount</label>
                    <input type="number" name="total" value="{{ $order->total }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-yellow w-100 mt-3">
                    Update Order
                </button>

            </form>

        </div>

    </div>

</div>

@endsection