<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

        .header-wrapper {
         position: sticky;
         top: 0;
         z-index: 1000;
         transition: 0.3s;
         box-shadow: 0 2px 10px rgba(0,0,0,0.05);
       }
       
       .header-wrapper.scrolled {
         background: #fff;
       }

       .cart-icon {
         font-size: 28px;
         background: #f1f1f1;
         padding: 10px 15px;
         border-radius: 50%;
         display: inline-block;
         transition: 0.3s;
       }
       
       .cart-icon:hover {
         background: #9c6b4f;
         color: #fff;
       }
        /* Top bar */
        .top-bar {
            background: #9c6b4f;
            color: white;
            text-align: center;
            padding: 8px;
            font-size: 14px;
        }

        /* Navbar */
        .navbar {
            background: #fff;
            border-bottom: 1px solid #eee;
            display: block !important;
        }

        .nav-link {
            color: #333 !important;
            font-weight: 500;
            margin: 0 10px;
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
            color: #9c6b4f;
        }

        .logo img {
            height: 100px;
        }
        
        .search-wrapper{
            flex: 1;
            display: flex;
            justify-content: center;
        }
        
        .search-box{
            width: 450px;   
            max-width: 100%;
            background: #f1f1f1;
            border-radius: 25px;
            padding: 10px 18px;
            border: none;
            outline: none;
        }


        /* Wrapper for menu */
         .menu-wrapper {
           border-top: 1px solid #eee;
           padding: 10px 0;
           background: #fff;
           width: 100%;   /* full width */
         }
         
         /* Menu center */
         .nav-menu {
           display: flex;
           justify-content: center;  /* 👈 center */
           align-items: center;
           gap: 25px;
           list-style: none;
           margin: 0;
           padding: 0;
         }
       
       /* =========================
          EXPLORE MENU
       ========================= */
       
       .explore-grid{
           display:grid;
           grid-template-columns:repeat(3,1fr);
           gap:40px;
           padding:25px 10px;
       }
       
       .explore-title{
           font-size:18px;
           font-weight:700;
           margin-bottom:18px;
           color:#111;
           border-bottom:2px solid #eee;
           padding-bottom:10px;
       }
       
       .explore-item{
           display:block;
           padding:12px 15px;
           margin-bottom:12px;
           border-radius:12px;
           text-decoration:none;
           color:#333;
           background:#f8f8f8;
           transition:0.3s;
           font-size:15px;
           font-weight:500;
       }
       
       .explore-item:hover{
           color:#fff;
           transform:translateX(5px);
       }
       
       /* =========================
          MOBILE RESPONSIVE
       ========================= */
       
       @media(max-width:768px){
       
           .explore-grid{
               grid-template-columns:1fr;
               gap:20px;
           }
       
           .explore-title{
               font-size:16px;
           }
       
           .explore-item{
               font-size:14px;
               padding:10px 12px;
           }
       
       }

        .explore-item-link{
            text-decoration:none;
        }
        
        .nav-menu li a {
          text-decoration: none;
          color: #333;
          font-weight: 500;
          position: relative;
          padding: 5px 0;
          transition: 0.3s;
        }
        
        /* Hover Effect */
        .nav-menu li a::after {
          content: "";
          position: absolute;
          width: 0%;
          height: 2px;
          background: #8b5e3c; /* premium brown */
          left: 0;
          bottom: 0;
          transition: 0.3s;
        }
        
        .nav-menu li a:hover::after {
          width: 100%;
        }
        
        .nav-menu li a:hover {
          color: #8b5e3c;
        }
        
        /* Active Menu */
        .nav-menu li a.active {
          color: #8b5e3c;
          font-weight: 600;
        }
        
        .nav-menu li a.active::after {
          width: 100%;
        }

        .mega-parent {
           position: static;
         }
         
         .mega-menu {
           position: absolute;
           top: 100%;
           left: 0;
           width: 100%;
         
           background: #f5f2ed;
           padding: 40px 0;
         
           opacity: 0;
           visibility: hidden;
           transition: 0.3s;
           z-index: 999;
        transform: translateY(10px);
         }

         .cart-modal {
    position: fixed;
    top: 50%;
    left: 50%;   
    transform: translate(-50%, -50%) scale(0.9); /* 🔥 perfect center */
    width: 320px;
    max-height: 80vh;
    background: #fff;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    border-radius: 12px;
    opacity: 0;
    visibility: hidden;
    transition: 0.3s;
    z-index: 9999;
    overflow: hidden;
}

.cart-modal.active {
    opacity: 1;
    visibility: visible;
    transform: translate(-50%, -50%) scale(1);
}


.cart-box {
    display: flex;
    flex-direction: column;
    height: 100%;
}

.cart-header {
    padding: 15px;
    border-bottom: 1px solid #eee;
    display: flex;
    justify-content: space-between;
    font-weight: 600;
    background: #f8f8f8;
    cursor: pointer;
}

.cart-body {
    flex: 1;
    padding: 15px;
    overflow-y: auto;
    max-height: 50vh; 
}

.cart-item {
    display: flex;
    gap: 10px;
    margin-bottom: 15px;
}

.cart-item img {
    width: 60px;
    border-radius: 8px;
}

.cart-footer {
    padding: 15px;
    border-top: 1px solid #eee;
}

.cart-footer button {
    width: 100%;
    padding: 10px;
    color: #fff;
    border: none;
    border-radius: 8px;
    background: #9c6b4f;
}
            
.cart-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    display: none;
    z-index: 999;
}

.cart-overlay.active {
    display: block;
}
         /* Hover pe open */
         .mega-parent:hover .mega-menu {
           opacity: 1;
           visibility: visible;
           transform: translateY(0);
         }
        

         /* Grid */
         .mega-grid {
           display: grid;
           grid-template-columns: repeat(6, 1fr);
           gap: 25px;
           align-items: start;
           justify-items: stretch;  
         }

                 /* ITEM */
        .mega-item {
          background: #eee;
          padding: 0 12px;
          border-radius: 10px;
          cursor: pointer;
          transition: 0.3s;
          text-align: left;
          height: 60px;        
          display: flex;
          align-items: center;      
          justify-content: center;   
          text-align: center;

        }
        
        .mega-item:hover {
          background: #9c6b4f;
          color: #fff;  
        }

         .mega-item:last-child {
           margin-top: 10px;
           font-weight: bold;
           color: #8b5e3c;
         }
         
         .mega-item:hover {
           background: #f5f1ea;
           color: #8b5e3c;
           transform: translateX(5px);
         }


         .mega-parent:hover .mega-menu {
          opacity: 1;
          visibility: visible;
        }


        /* Layout */
        .mega-layout {
         display: flex;
         gap: 15px;
         align-items: flex-start;
       }
      

        /* LEFT SIDE */
        .mega-left {
          width: 35%;
        }
        
        .mega-left img {
          width: 300px;
          border-radius: 15px;
          margin-bottom: 10px;
          height: 220px;
          object-fit: cover;
        }

        
        .mega-left p {
          font-size: 14px;
          color: #555;
        }
        
        /* RIGHT SIDE */
        .mega-right {
          width: 65%;
          margin-left: 0;
          display: flex;
          align-items: flex-start;  
          justify-content: flex-start;
        }

        .mega-item p {
          margin: 0;        
        }
        
        /* GRID */
        .mega-grid {
         display: grid;
         grid-template-columns: repeat(5, 1fr);
         gap: 12px;
         align-items: start;    
         justify-items: start;  
       }
        

       /* 🔥 Collection Title */
       .mega-left p {
         font-size: 15px;
         color: #222;            
         font-weight: 600;
         margin-bottom: 5px;
         letter-spacing: 0.5px;
         overflow: hidden;
         text-overflow: ellipsis;
         white-space: nowrap;
       }
       
       /* 🔥 Quote Styling */
       .mega-quote {
         font-size: 13px;
         color: #8b5e3c;         
         font-style: italic;
         line-height: 1.5;
         position: relative;
         padding-left: 12px;
       }
       
       /* 🔥 Quote Highlight Line */
       .mega-quote::before {
         content: "";
         position: absolute;
         left: 0;
         top: 4px;
         height: 70%;
         width: 3px;
         background: #8b5e3c;    
         border-radius: 2px;
       }

        .view-all {
          font-weight: bold;
          color: #8b5e3c;
        }
        
        /* 🔥 Hover fix */
        .mega-item.view-all:hover {
          color: #fff;
        }
        
        .mega-item.view-all:hover p {
          color: #fff;
        }

         
        /* 🔥 Explore Grid */
       .explore-grid {
         display: grid;
         grid-template-columns: repeat(3, 1fr);
         gap: 30px;
       }
       
       /* 🔥 Column Title */
       .explore-title {
         color: #8b5e3c;
         font-weight: 600;
         margin-bottom: 10px;
       }
       
       /* 🔥 Links */
       .explore-item {
         padding: 5px 0;
         cursor: pointer;
         color: #444;
         transition: 0.3s;
       }
       
       /* 🔥 Hover effect */
       .explore-item:hover {
         color: #8b5e3c;
         transform: translateX(3px);
       }

        /* 🔥 Footer CSS */
        .footer-section {
            background: #2f3e46;
            color: #ddd;
            padding: 60px 0 20px;
        }

        .footer-title {
            color: #9c6b4f;
            font-size: 22px;
            font-weight: bold;
        }

        .footer-heading {
            color: #fff;
            margin-bottom: 15px;
        }

        .footer-text {
            font-size: 14px;
            color: #ccc;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 8px;
        }

        .footer-links a {
            text-decoration: none;
            color: #ccc;
            transition: 0.3s;
        }

        .footer-links a:hover {
            color: #9c6b4f;
        }

        .footer-contact {
            font-size: 14px;
            margin-bottom: 6px;
        }

        .footer-social span {
            margin-right: 10px;
            font-size: 18px;
            cursor: pointer;
        }

        .footer-bottom {
            border-top: 1px solid #555;
            padding-top: 15px;
            font-size: 13px;
            color: #aaa;
        }

        .footer-social{
    display:flex;
    gap:15px;
    margin-top:15px;
}

.social-icon{
    width:42px;
    height:42px;
    border-radius:50%;
    background:rgba(255,255,255,0.08);

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:18px;
    color:#fff;

    transition:0.3s;
}

.social-icon:hover{
    background:#c49a6c;
    transform:translateY(-4px);
    color:#fff;
}

    </style>
</head>

<body class="font-sans antialiased" style="display:flex; flex-direction:column; min-height:100vh;">

    <div class="min-h-screen bg-gray-100">

        {{-- NAVBAR --}}
        @include('partials.navbar')

        {{-- HEADER (optional Jetstream) --}}
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        {{-- PAGE CONTENT --}}
        <main style="flex:1;">
            @yield('content')
        </main>

    </div>

    {{-- FOOTER --}}
    @include('partials.footer')

    {{-- CART MODAL --}}
    <div id="cartOverlay" class="cart-overlay" onclick="closeCartModal()"></div>

    <div id="cartModal" class="cart-modal">
        <div class="cart-body" id="cart-items">
            <p>No items</p>
        </div>
    </div>

    {{-- JS --}}
    <script>
        function addToCart(productId, btn) {

    fetch('/cart/add', {

        method: 'POST',

        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },

        body: JSON.stringify({
            product_id: productId
        })

    })

    .then(async res => {

        const data = await res.json();

        if(res.status === 401){
            alert("Please Login First Then Continue Shopping 🛒");
            window.location.href = "/login";
            return;
        }

        return data;
    })

    .then(data => {

        if(!data) return;

        btn.innerText = "Added ✅";

        document.getElementById('cart-count').innerText = data.count;

        openCartModal();

    })

    .catch(err => console.log(err));
}
        
        function openCartModal() {
            document.getElementById('cartModal').classList.add('active');
            document.getElementById('cartOverlay').classList.add('active');
            loadCartItems();
        }
        
        function closeCartModal() {
            document.getElementById('cartModal').classList.remove('active');
            document.getElementById('cartOverlay').classList.remove('active');
        }
        
        
        function goToCart() {
            window.location.href = "/cart";
        }
        
        function loadCartItems() {
            fetch('/cart-data')
                .then(res => res.json())
                .then(data => {
        
                    let html = '';
        
                    if(data.length === 0){
                        html = "<p>No items found</p>";
                    } else {
                        data.forEach(item => {

                            if(!item.product) return;
                        
                            html += `
                            <div class="cart-item d-flex align-items-center gap-3">
                        
                                <img src="/images/${item.product.image}"
                                     class="cart-img"
                                     style="width:60px;height:60px;object-fit:cover;">
                        
                                <div>
                                    <p>${item.product.name}</p>
                                    <p>₹${item.product.price}</p>
                                </div>
                        
                            </div>`;
                        });
                    }
        
                    document.getElementById('cart-items').innerHTML = html;
                });
        }
        
        function updateQty(id, qty) {
        
            if(qty < 1){
                removeItem(id);
                return;
            }
        
            fetch('/cart/update', {
           
               method: 'POST',
           
               credentials: 'same-origin',
           
               headers: {
                   'Content-Type': 'application/json',
                   'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
               },
           
               body: JSON.stringify({
                   id: id,
                   qty: qty
               })
            })
            .then(res => res.json())
            .then(() => location.reload());
        }
        
        window.addEventListener('DOMContentLoaded', function () {
            fetch('/cart-data')
                .then(res => res.json())
                .then(data => {
                    let total = 0;
                    data.forEach(item => {
                        total += item.qty;
                    });
        
                    document.getElementById('cart-count').innerText = total;
                });
        });
        
        function removeItem(id) {

            fetch('/cart/remove/' + id, {
                credentials: 'same-origin'
            })
            .then(() => location.reload());
        }
        
            // window.onload = function () {
//     updateCartCount();
// };

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>