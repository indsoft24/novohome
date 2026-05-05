<!DOCTYPE html>
<html>
<head>
    <title>Secure Payment</title>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .payment-card {
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(15px);
            padding: 35px;
            border-radius: 20px;
            width: 360px;
            text-align: center;
            color: #fff;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            animation: fadeIn 0.6s ease;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }

        .payment-card h2 {
            margin-bottom: 10px;
            font-weight: 600;
        }

        .payment-card p {
            font-size: 14px;
            opacity: 0.8;
            margin-bottom: 25px;
        }

        .amount {
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 25px;
            color: #00ffcc;
        }

        #payBtn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 30px;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        #payBtn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.3);
        }

        .secure {
            font-size: 12px;
            margin-top: 15px;
            opacity: 0.8;
        }

        .logo {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
            letter-spacing: 1px;
        }
    </style>
</head>

<body>

<div class="payment-card">

    <div class="logo">🪑 NOVAHOMZ Store</div>

    <h2>Complete Payment</h2>
    <p>Secure checkout powered by Razorpay</p>

    <div class="amount">
        ₹{{ $amount }}
    </div>
    
    <button id="payBtn">Pay Now</button>

    <div class="secure">
        🔒 100% Secure Payment
    </div>

</div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
document.getElementById('payBtn').onclick = function (e) {

    var options = {
        "key": "{{ env('RAZORPAY_KEY') }}",
        "amount": "{{ $amount * 100 }}", // ✅ FIX
        "currency": "INR",
        "name": "Furniture Store",
        "description": "Order Payment",
        "order_id": "{{ $razorpayOrderId }}",

        handler: function (response){

            fetch('/payment-success', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    razorpay_payment_id: response.razorpay_payment_id,
                    razorpay_order_id: response.razorpay_order_id,
                    razorpay_signature: response.razorpay_signature
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    window.location.href = '/order-success';
                }
            })
            .catch(() => {
                alert("Payment done but backend failed ❌");
            });
        }
    };

    var rzp = new Razorpay(options);
    rzp.open();
    e.preventDefault();
}
</script>

</body>
</html>