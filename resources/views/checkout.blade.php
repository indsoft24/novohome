<style>
.checkout-wrapper {
    min-height: 80vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f4f6fb;
    padding: 30px;
}

.checkout-box {
    width: 100%;
    max-width: 520px;
    background: #fff;
    border-radius: 16px;
    padding: 30px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.08);
}

.checkout-title {
    text-align: center;
    font-weight: 700;
    margin-bottom: 25px;
    font-size: 22px;
}

.step-box {
    margin-bottom: 18px;
    border: 1px solid #e9ecef;
    border-radius: 12px;
    padding: 12px 15px;
    transition: 0.3s;
    background: #fff;
}

.step-box:hover {
    border-color: #4e73df;
    box-shadow: 0 5px 15px rgba(78,115,223,0.1);
}

.step-label {
    font-size: 12px;
    color: #6c757d;
    margin-bottom: 5px;
    display: block;
}

.step-input,
.step-textarea {
    width: 100%;
    border: none;
    outline: none;
    font-size: 14px;
}

.step-textarea {
    resize: none;
    height: 60px;
}

.checkout-btn {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 12px;
    background: linear-gradient(135deg, #28a745, #20c997);
    color: #fff;
    font-weight: 600;
    margin-top: 10px;
    transition: 0.3s;
}

.checkout-btn:hover {
    transform: translateY(-2px);
    opacity: 0.9;
}
</style>

<div class="checkout-wrapper">

    <div class="checkout-box">

        <div class="checkout-title">🛒 Secure Checkout</div>

        <form action="/checkout/place-order" method="POST">
            @csrf

            <!-- Name -->
            <div class="step-box">
                <label class="step-label">Full Name</label>
                <input type="text" name="name" class="step-input" placeholder="Enter your name" required>
            </div>

            <!-- Phone -->
            <div class="step-box">
                <label class="step-label">Phone Number</label>
                <input type="text" name="phone" class="step-input" placeholder="Enter phone number" required>
            </div>

            <!-- Address -->
            <div class="step-box">
                <label class="step-label">Delivery Address</label>
                <textarea name="address" class="step-textarea" placeholder="Enter full address" required></textarea>
            </div>

            <button type="submit" class="checkout-btn">
                Place Order
            </button>

        </form>

    </div>

</div>