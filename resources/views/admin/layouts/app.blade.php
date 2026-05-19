<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: #f5f7fb;
        }


        /* SIDEBAR */
        .sidebar {
            width: 230px;
            height: 100vh;
            background: #1e293b;
            color: #fff;
            position: fixed;
        }

        .sidebar small {
            display: block;
            margin-top: 10px;
            font-size: 11px;
            letter-spacing: 1px;
            color: #94a3b8;
        }
        
        .sidebar a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 20px;
            color: #cbd5e1;
            font-size: 14px;
            text-decoration: none !important;
        }
        
        .sidebar a:hover {
            background: #334155;
            border-left: 4px solid #f59e0b;
            padding-left: 16px;
        }

        .sidebar h4 {
            padding: 20px;
            color: #f59e0b;
        }


        .sidebar a i {
            margin-right: 10px;
        }
       
        .sidebar a.active {
            background: #334155;
            border-left: 4px solid #f59e0b;
        }

        /* MAIN */
        .main {
            margin-left: 230px;
        }


        .content {
            padding: 30px;
        }
    </style>

</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h4>NOVHOMZ Admin</h4>

    <!-- MAIN -->
    <small class="px-3 text-muted">MAIN</small>
    <a href="/admin/dashboard"><i class="fas fa-home"></i> Dashboard</a>

    <!-- PRODUCTS -->
    <small class="px-3 text-muted mt-2">MANAGE</small>
    <a href="/admin/products"><i class="fas fa-box"></i> Products</a>
    <a href="/admin/products/create"><i class="fas fa-plus"></i> Add Product</a>
    <a href="/admin/categories"><i class="fas fa-list"></i> Categories</a>
    <a href="/admin/orders"><i class="fas fa-shopping-cart"></i> Orders</a>

    <!-- CONTENT -->
    <small class="px-3 text-muted mt-2">CONTENT</small>
    <a href="/admin/blog"><i class="fas fa-blog"></i> Blog</a>
    <a href="/admin/reviews"><i class="fas fa-star"></i> Reviews</a>
    <a href="/admin/explore">
        <i class="fas fa-compass"></i> Explore
    </a>

    <!-- ✅ MARQUEE -->
    <a href="/admin/marquee">
        <i class="fas fa-film"></i> Marquee
    </a>

    <!-- USERS -->
    <small class="px-3 text-muted mt-2">USERS</small>
    <a href="/admin/users"><i class="fas fa-users"></i> Users</a>

    <!-- SETTINGS -->
    <small class="px-3 text-muted mt-2">SYSTEM</small>
    <a href="/admin/settings"><i class="fas fa-cog"></i> Settings</a>
    <form action="/logout" method="POST">
        @csrf
        <button type="submit" class="btn btn-link text-white text-decoration-none">
            <i class="fas fa-sign-out-alt"></i> Logout
        </button>
    </form>
</div>

<!-- Main -->
<div class="main">

    <div class="content">
        @yield('content')
    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.querySelectorAll('.auto-expand').forEach(textarea => {

    // default height
    textarea.style.height = textarea.scrollHeight + 'px';

    // 🔥 auto expand while typing
    textarea.addEventListener('input', function () {
        if (!this.classList.contains('collapsed')) {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        }
    });

    // ✅ click → expand
    textarea.addEventListener('focus', function () {
        this.classList.remove('collapsed');
        this.style.height = this.scrollHeight + 'px';
    });

    // ✅ double click → collapse
    textarea.addEventListener('dblclick', function () {
        this.classList.add('collapsed');
        this.style.height = '150px';
    });

});

const ctx = document.getElementById('salesChart');

new Chart(ctx, {
    type: 'line',

    data: {
        labels: ['Jan','Feb','Mar','Apr','May','Jun'],

        datasets: [{
            label: 'Sales',
            data: [12,19,8,15,22,30],
            borderWidth: 3,
            tension: 0.4,
            fill: false
        }]
    },

    options: {
        responsive:true,
        maintainAspectRatio:false,

        plugins:{
            legend:{
                display:false
            }
        },

        scales:{
            x:{
                display:false
            },
            y:{
                display:false
            }
        }
    }
});
</script>
</body>
</html>