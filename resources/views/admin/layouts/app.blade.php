<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f2ed;
        }

        .sidebar {
            width: 220px;
            height: 100vh;
            background: #2f3e46;
            color: #fff;
            position: fixed;
        }

        .sidebar a {
            display: block;
            padding: 15px;
            color: #fff;
            text-decoration: none;
        }

        .sidebar a:hover {
            background: #9c6b4f;
        }

        .main {
            margin-left: 220px;
            padding: 20px;
        }
    </style>

</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h4 class="text-center py-3">Admin</h4>

    <a href="/admin/dashboard">Dashboard</a>
    <a href="/admin/products">Products</a>
    <a href="/admin/products/create">Add Product</a>
    <a href="/admin/categories">Categories</a>
    <a href="/admin/reviews">Reviews</a>
</div>

<!-- Main Content -->
<div class="main">
    @yield('content')
</div>

</body>
</html>