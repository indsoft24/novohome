<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>My Site</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ✅ SAARI CSS YAHI LIKHO -->
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
        /* Search */
        .search-box {
            background: #f1f1f1;
            border-radius: 20px;
            padding: 8px 15px;
            border: none;
            width: 250px;
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
         
         /* Item */
         .mega-item {
           width: 100%;
           border-radius: 10px;
           background: #eee;
           text-align: center;
           transition: 0.3s;
           padding: 0 12px;
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
         align-items: flex-start; /* ✅ only this */
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
          align-items: flex-start;   /* ✅ force top */
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
         align-items: start;     /* ✅ vertical top */
         justify-items: start;   /* ✅ horizontal left */
       }
        

       /* 🔥 Collection Title */
       .mega-left p {
         font-size: 15px;
         color: #222;              /* dark color */
         font-weight: 600;         /* bold */
         margin-bottom: 5px;
         letter-spacing: 0.5px;
         overflow: hidden;
         text-overflow: ellipsis;
         white-space: nowrap;
       }
       
       /* 🔥 Quote Styling */
       .mega-quote {
         font-size: 13px;
         color: #8b5e3c;           /* highlight brown */
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
         background: #8b5e3c;     /* highlight bar */
         border-radius: 2px;
       }
        /* ITEM */
        .mega-item {
          background: #eee;
          padding: 20px;
          border-radius: 15px;
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

    </style>

</head>
<body style="display: flex; flex-direction: column; min-height: 100vh;">

    @include('partials.navbar')

    <main style="flex: 1;">
        @yield('content')
    </main>
    @include('partials.footer')

    @stack('scripts')
<script>
function addToCart(productId, btn) {

    fetch('/cart/add', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            product_id: productId
        })
    })
    .then(res => res.json())
    .then(data => {

    btn.innerText = "Added ✅";

    if(data.success){
        document.getElementById('cart-count').innerText = data.count;
    }

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
                    html += `
                     <div class="cart-item">
                         <img src="/images/${item.product.image}" />
                         <div>
                             <p>${item.product.name}</p>
                             <small>₹${item.product.price}</small>
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
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
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
    fetch('/cart/remove/' + id)
    .then(() => location.reload());
}

// window.onload = function () {
//     updateCartCount();
// };

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>