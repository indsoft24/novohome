<style>
.checkout-wrapper {
    min-height: 100dvh;
    display: flex;
    align-items: flex-start;
    justify-content: center;
    background: radial-gradient(circle at top, #eef2ff, #f8fafc);
    padding: 20px;
    padding-top: max(20px, env(safe-area-inset-top));
    box-sizing: border-box;
}

/* CARD */
.checkout-box {
    width: 100%;
    max-width: 540px;
    background: rgba(255,255,255,0.95);
    backdrop-filter: blur(12px);
    border-radius: 18px;
    padding: 22px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.08);
}

/* TITLE */
.checkout-title {
    text-align: center;
    font-weight: 800;
    margin-bottom: 18px;
    font-size: 20px;
    color: #1f2937;
}

/* INPUT BOX */
.step-box {
    margin-bottom: 12px;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 10px 12px;
    background: #fff;
}

/* INPUT */
.step-input,
.step-textarea {
    width: 100%;
    border: none;
    outline: none;
    font-size: 14px;
    background: transparent;
}

/* TEXTAREA */
.step-textarea {
    resize: none;
    height: 60px;
}

/* BUTTON */
.checkout-btn {
    width: 100%;
    padding: 12px;
    border-radius: 12px;
    border: none;
    background: linear-gradient(135deg, #6366f1, #4f46e5);
    color: #fff;
    font-weight: 700;
    font-size: 14px;
    margin-top: 10px;
}

/* ERROR */
.error-box {
    background: #fee2e2;
    color: #991b1b;
    padding: 10px;
    border-radius: 10px;
    margin-bottom: 12px;
    font-size: 13px;
    text-align: center;
}

/* iPHONE FIX */
@supports (-webkit-touch-callout: none) {
    .checkout-wrapper {
        min-height: -webkit-fill-available;
    }
}

/* MOBILE */
@media (max-width: 480px) {
    .checkout-box {
        padding: 18px;
    }

    .checkout-title {
        font-size: 18px;
    }
}
</style>

<div class="checkout-wrapper">

    <div class="checkout-box">

        <div class="checkout-title">🛒 Secure Checkout</div>

        @if(session('error'))
            <div class="error-box">
                {{ session('error') }}
            </div>
        @endif

        <form action="/pay" method="POST">
          @csrf

            <div class="step-box">
                <label class="step-label">Full Name</label>
                <input type="text" name="name" class="step-input" placeholder="Enter your name" required>
            </div>

            <div class="step-box">
                <label class="step-label">Phone Number</label>
                <input type="text" name="phone" class="step-input" placeholder="Enter phone number" required>
            </div>

            <div class="step-box">
                <label class="step-label">Delivery Address</label>
                <textarea name="address" class="step-textarea" placeholder="Enter full address" required></textarea>
            </div>

            <button type="submit" class="checkout-btn">
                🚀 Place Order
            </button>

        </form>

    </div>

</div>