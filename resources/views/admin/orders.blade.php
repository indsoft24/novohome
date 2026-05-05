@extends('admin.layouts.app')

@section('content')

<style>
.orders-wrapper {
    width: 100%;
}

.orders-card {
    background: #fff;
    padding: 28px;
    border-radius: 14px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.07);
}

/* Header */
.orders-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 18px;
}

.orders-header h4 {
    font-weight: 600;
    margin: 0;
}

/* Table */
.table thead {
    background: #f8fafc;
}

.table th {
    font-size: 14px;
    text-transform: uppercase;
    color: #64748b;
    letter-spacing: 0.6px;
    border: none;
}

.table td {
    vertical-align: middle;
    font-size: 14px;
    border-color: #f1f5f9;
}

.table tbody tr {
    transition: all 0.25s ease;
}

.table tbody tr:hover {
    background: #f0f7ff;
}

/* Customer */
.customer-info {
    display: flex;
    align-items: center;
    gap: 10px;
}

.customer-avatar {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: linear-gradient(135deg, #20c997, #0d6efd);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
}

/* Price */
.price-badge {
    background: #fff7ed;
    color: #c2410c;
    padding: 6px 12px;
    border-radius: 8px;
    font-weight: 500;
}

/* Status */
.status {
    padding: 6px 14px;
    border-radius: 30px;
    font-size: 12px;
    font-weight: 600;
    display: inline-block;
}

/* Better status colors */
.status.completed {
    background: #dcfce7;
    color: #166534;
}

.status.pending {
    background: #fef9c3;
    color: #854d0e;
}

.status.cancelled {
    background: #fee2e2;
    color: #991b1b;
}

/* Small responsiveness */
@media (max-width: 768px) {
    .orders-card {
        padding: 18px;
    }

    .table th, .table td {
        font-size: 12px;
    }
}
</style>

<div class="orders-wrapper">

    <div class="orders-card">
    
    <div class="orders-header">
     <h4>Orders List</h4>
     </div>
    <table class="table table-hover align-middle">
           <thead>
               <tr>
                   <th>#</th>
                   <th>Customer</th>
                   <th>Total</th>
                   <th>Status</th>
                   <th>Payment ID</th>
                   <th>Action</th> 
                   <th>Date</th>
               </tr>
           </thead>
       
           <tbody>
               @forelse($orders as $order)
               <tr>
                   <td>#{{ $order->id }}</td>
       
                   <td>
                       <div class="customer-info">
                           <div class="customer-avatar">
                               {{ strtoupper(substr($order->name ?? 'U', 0, 1)) }}
                           </div>
                           <div>
                               <strong>{{ $order->name ?? 'User' }}</strong>
                           </div>
                       </div>
                   </td>
       
                   <td>
                       <span class="price-badge">
                           ₹{{ $order->total ?? 0 }}
                       </span>
                   </td>
       
                   <td>
                       @php
                           $status = strtolower($order->status ?? 'pending');
                       @endphp
       
                       <span class="status {{ $status }}">
                           {{ ucfirst($status) }}
                       </span>
                   </td>
       
                   <!-- ✅ Payment ID -->
                   <td>
                       {{ $order->payment_id ?? 'N/A' }}
                   </td>

                  <td>
                       @if($order->status == 'completed')
                           <a href="{{ url('admin/invoice/'.$order->id) }}" class="btn btn-success">
                               🧾 Invoice
                           </a>
                       @elseif($order->status == 'pending')
                           <span class="badge bg-warning text-dark">Pending</span>
                       @else
                           <span class="badge bg-danger">Cancelled</span>
                       @endif
                   </td>
                   <td>{{ $order->created_at->format('d M Y') }}</td>
               </tr>
               @empty
               <tr>
                   <td colspan="7" class="text-center text-muted">
                       No orders found
                   </td>
               </tr>
               @endforelse
           </tbody>
       </table>

    </div>

</div>

@endsection