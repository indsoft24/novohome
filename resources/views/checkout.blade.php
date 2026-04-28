<div class="container mt-5">
    <h3>Checkout</h3>

    <form action="/checkout/place-order" method="POST">
        @csrf

        <input type="text" name="name" placeholder="Your Name" class="form-control mb-2" required>
        <input type="text" name="phone" placeholder="Phone" class="form-control mb-2" required>
        <textarea name="address" placeholder="Address" class="form-control mb-2" required></textarea>

        <button class="btn btn-success w-100">Place Order</button>
    </form>
</div>