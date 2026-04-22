<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
         }
         
         /* Item */
         .mega-item {
           background: #eee;
           padding: 20px;
           border-radius: 15px;
           text-align: center;
           cursor: pointer;
           transition: 0.3s;
         }
         
         .mega-item:hover {
           background: #9c6b4f;
           color: #fff;
         }


         .mega-parent:hover .mega-menu {
          opacity: 1;
          visibility: visible;
        }


        /* Layout */
        .mega-layout {
          display: flex;
          gap: 40px;
          align-items: center;
        }
        
        /* LEFT SIDE */
        .mega-left {
          width: 30%;
        }
        
        .mega-left img {
          width: 100%;
          border-radius: 15px;
          margin-bottom: 10px;
        }
        
        .mega-left p {
          font-size: 14px;
          color: #555;
        }
        
        /* RIGHT SIDE */
        .mega-right {
          width: 70%;
        }
        
        /* GRID */
        .mega-grid {
          display: grid;
          grid-template-columns: repeat(8, 1fr);
          gap: 20px;
        }
        
        /* ITEM */
        .mega-item {
          background: #eee;
          padding: 20px;
          border-radius: 15px;
          text-align: center;
          cursor: pointer;
          transition: 0.3s;
        }
        
        .mega-item:hover {
          background: #9c6b4f;
          color: #fff;
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
<body>

    @include('partials.navbar')

    {{-- Page Content --}}
    @yield('content')

    @include('partials.footer')

    @stack('scripts')
</body>
</html>