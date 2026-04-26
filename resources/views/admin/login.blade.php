<style>
/* Page Centering */
.login-wrapper {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #f5f6f8;
}

/* Card */
.login-card {
    background: #fff;
    padding: 40px 30px;
    width: 100%;
    max-width: 380px;
    border-radius: 14px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
}

/* Heading */
.login-card h2 {
    text-align: center;
    margin-bottom: 25px;
    color: #111;
    font-weight: 600;
}

/* Inputs */
.login-input {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border-radius: 8px;
    border: 1px solid #ddd;
    transition: 0.3s;
    font-size: 14px;
}

/* Input focus */
.login-input:focus {
    border-color: #000;
    box-shadow: 0 0 0 2px rgba(0,0,0,0.08);
    outline: none;
}

/* Button */
.login-btn {
    width: 100%;
    padding: 12px;
    background: #111;
    color: #fff;
    border: none;
    border-radius: 8px;
    font-weight: 500;
    transition: 0.3s;
}

/* Hover */
.login-btn:hover {
    background: #000;
}

/* Extra text */
.login-footer {
    text-align: center;
    margin-top: 15px;
    font-size: 13px;
    color: #777;
}
</style>

<div class="login-wrapper">

    <div class="login-card">
        <h2>Admin Login</h2>

        <form method="POST" action="/admin/login">
            @csrf

            <input type="email" name="email" placeholder="Enter Email" class="login-input" required>

            <input type="password" name="password" placeholder="Enter Password" class="login-input" required>

            <button type="submit" class="login-btn">Login</button>
        </form>

        <div class="login-footer">
            Secure Admin Panel Access
        </div>
    </div>

</div>