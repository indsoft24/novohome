<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #eef2f7;
            padding: 40px;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            background: #fff;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0,0,0,0.08);
        }

        /* HEADER */
        .invoice-header {
            background: linear-gradient(135deg, #111, #333);
            color: #fff;
            padding: 25px 30px;
            display: flex;
            justify-content: space-between;
        }

        .invoice-header h2 {
            margin: 0;
            font-size: 24px;
        }

        .invoice-header small {
            opacity: 0.8;
        }

        /* BODY */
        .invoice-body {
            padding: 30px;
        }

        .section {
            margin-bottom: 25px;
        }

        .section h4 {
            margin-bottom: 10px;
            color: #333;
        }

        .section p {
            margin: 4px 0;
            color: #555;
        }

        /* TABLE */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .table th {
            background: #f1f5f9;
            text-align: left;
            padding: 10px;
            font-size: 13px;
            color: #555;
        }

        .table td {
            padding: 10px;
            border-bottom: 1px solid #eee;
            font-size: 14px;
        }

        /* TOTAL */
        .total-box {
            margin-top: 20px;
            text-align: right;
        }

        .total-box h3 {
            background: #111;
            color: #fff;
            display: inline-block;
            padding: 10px 20px;
            border-radius: 8px;
        }

        /* STATUS */
        .status {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            background: #dcfce7;
            color: #166534;
            font-weight: 600;
        }

        /* BUTTON */
        .print-btn {
            margin-top: 25px;
            padding: 12px 20px;
            border: none;
            background: linear-gradient(135deg, #0d6efd, #20c997);
            color: #fff;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
        }

        .print-btn:hover {
            opacity: 0.9;
        }

        /* FOOTER */
        .footer {
            text-align: center;
            font-size: 13px;
            color: #888;
            padding: 15px;
            border-top: 1px solid #eee;
        }

        @media print {
            .print-btn {
                display: none;
            }
        }

    </style>
</head>

<body>

<div class="invoice-box">

    <!-- HEADER -->
    <div class="invoice-header">
        <div>
            <h2>🧾 Invoice</h2>
            <small>Order #{{ $order->id }}</small>
        </div>

        <div style="text-align:right;">
            <strong>NOVAHOMZ</strong><br>
            India<br>
            <small>{{ date('d M Y') }}</small>
        </div>
    </div>

    <!-- BODY -->
    <div class="invoice-body">

        <!-- CUSTOMER -->
        <div class="section">
            <h4>Customer Details</h4>
            <p><strong>Name:</strong> {{ $order->name }}</p>
            <p><strong>Phone:</strong> {{ $order->phone }}</p>
            <p><strong>Address:</strong> {{ $order->address }}</p>
        </div>

        <!-- PAYMENT -->
        <div class="section">
            <h4>Payment Details</h4>
            <p><strong>Payment ID:</strong> {{ $order->payment_id ?? 'N/A' }}</p>
            <p>
                <strong>Status:</strong> 
                <span class="status">{{ ucfirst($order->status) }}</span>
            </p>
        </div>

        <!-- ORDER TABLE -->
        <div class="section">
            <h4>Order Summary</h4>

            <table class="table">
                <tr>
                    <th>Order ID</th>
                    <th>Amount</th>
                </tr>
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>₹{{ $order->total }}</td>
                </tr>
            </table>
        </div>

        <!-- TOTAL -->
        <div class="total-box">
            <h3>Total: ₹{{ $order->total }}</h3>
        </div>

        <!-- PRINT -->
        <button class="print-btn" onclick="window.print()">
            🖨 Print Invoice
        </button>

    </div>

    <!-- FOOTER -->
    <div class="footer">
        Thank you for shopping with NOVAHOMZ ❤️
    </div>

</div>

</body>
</html>