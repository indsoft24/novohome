<!DOCTYPE html>
<html>
<head>
    <title>Furniture</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body {
            background: #f5f2ed;
            font-family: 'Segoe UI', sans-serif;
            padding-top: 5px;
            /* padding-top: 70px; */
        }

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

         
                /* 🔥 HERO SECTION */
        .hero-section {
            padding: 20px 0;
            background: #f5f2ed;
        }
        
        /* Title */
        .hero-title {
            font-size: 60px;
            font-weight: bold;
            color: #9c6b4f;
            line-height: 1.1;
        }
        
        /* Text */
        .hero-text {
            margin-top: 20px;
            font-size: 18px;
            color: #555;
        }
        
        /* Button */
        .hero-btn {
            background: #2f3e46;
            color: #fff;
            border: none;
            padding: 12px 25px;
            border-radius: 10px;
            font-weight: 600;
            transition: 0.3s;
        }
        
        .hero-btn:hover {
            background: #1b262c;
        }
        
        /* Image */
        .hero-img {
            max-width: 100%;
            height: auto;
            max-height: 500px;
        }
        
        /* 🔥 SLIDER */
.slider-wrapper {
    overflow-x: auto;
    scrollbar-width: none;
}

.slider-wrapper::-webkit-scrollbar {
    display: none;
}

.slider {
    display: flex;
    gap: 20px;
}

/* Card */
.slide-card {
    min-width: 250px;
    height: 300px;
    border-radius: 20px;
    overflow: hidden;
    position: relative;
    flex-shrink: 0;
    background: #fff;
    transition: 0.3s;
}

/* Image */
.slide-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Hover */
.slide-card:hover {
    transform: scale(1.05);
}

/* NEW badge */
.badge-new {
    position: absolute;
    top: 10px;
    left: 10px;
    background: #9c6b4f;
    color: #fff;
    padding: 5px 10px;
    border-radius: 8px;
    font-size: 12px;
}

/* 🔥 CATEGORY SECTION */
.category-section {
    padding: 40px 0;
}

/* Left Box */
.category-box {
    background: #fff;
    padding: 30px;
    border-radius: 20px;
}

.small-title {
    font-size: 12px;
    letter-spacing: 2px;
    color: #777;
}

.main-title {
    color: #9c6b4f;
    font-weight: bold;
}

/* Category Cards */
.cat-card {
    background: #f5f2ed;
    border-radius: 15px;
    padding: 20px;
    text-align: center;
    transition: 0.3s;
    cursor: pointer;
}

.cat-card .icon {
    font-size: 25px;
    margin-bottom: 10px;
}

.cat-card:hover {
    background: #9c6b4f;
    color: #fff;
}

/* Right Promo Box */
.promo-box {
    background: linear-gradient(rgba(156,107,79,0.7), rgba(156,107,79,0.7)),
                url('{{ asset("images/chair3.jpg") }}');
    background-size: cover;
    background-position: center;
    border-radius: 20px;
    color: #fff;
    padding: 40px 20px;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.promo-small {
    font-size: 12px;
    letter-spacing: 2px;
}

.arrow-btn {
    margin-top: 20px;
    display: inline-block;
    background: #fff;
    color: #9c6b4f;
    padding: 10px 15px;
    border-radius: 50%;
    text-decoration: none;
}

/* 🔥 SECTION */
.brand-section {
    padding: 40px 0;
}

/* LEFT BOX */
.highlight-box {
    background: linear-gradient(rgba(47,62,70,0.8), rgba(47,62,70,0.8)),
                url('{{ asset("images/chair3.jpg") }}');
    background-size: cover;
    background-position: center;
    border-radius: 20px;
    color: #fff;
    padding: 40px 20px;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

/* TEXT */
.small-text {
    font-size: 12px;
    letter-spacing: 2px;
    color: #ddd;
}

.main-heading {
    color: #9c6b4f;
    font-weight: bold;
}

/* RIGHT BOX */
.brand-box {
    background: #fff;
    padding: 30px;
    border-radius: 20px;
}

/* BRAND CARDS */
.brand-card {
    background: #f5f2ed;
    border-radius: 15px;
    padding: 25px;
    text-align: center;
    font-weight: 600;
    color: #555;
    transition: 0.3s;
}

.brand-card:hover {
    background: #9c6b4f;
    color: #fff;
}

/* BUTTON */
.circle-btn {
    margin-top: 20px;
    display: inline-block;
    background: #fff;
    color: #2f3e46;
    padding: 10px 15px;
    border-radius: 50%;
    text-decoration: none;
}

.follow-section {
  background: #f6f2ec;
  padding: 60px 60px;
}

.follow-container {
  display: flex;
  justify-content: left; 
  align-items: center;
  gap: 40px;
  flex-wrap: wrap;
}

.follow-text {
  max-width: 400px;
}

.small-line {
  width: 30px;
  height: 2px;
  background: #c49a6c;
  margin-bottom: 15px;
}

.follow-text h2 {
  font-size: 24px;
  margin-bottom: 10px;
}

.follow-text p {
  font-size: 14px;
  color: #666;
  margin-bottom: 15px;
}

.follow-text button {
  background: #c49a6c;
  color: #fff;
  border: none;
  padding: 10px 18px;
  cursor: pointer;
}

.follow-image img {
  width: 450px;
  border-radius: 20px;
    object-fit: cover;
}

.marquee-wrapper {
  overflow: hidden;
  margin-top: 40px;
}

.marquee-track {
  display: flex;
  width: 200%; /* 🔥 IMPORTANT */
  animation: scroll 15s linear infinite;
}

.marquee-content {
  display: flex;
  gap: 15px;
  width: 50%; /* 🔥 IMPORTANT */
}

.marquee-content span {
  background: #fff;
  padding: 8px 14px;
  border-radius: 20px;
  font-size: 13px;
  border: 1px solid #ddd;
  white-space: nowrap;
}

/* smooth infinite */
@keyframes scroll {
  0% {
    transform: translateX(0);
  }
  100% {
    transform: translateX(-50%);
  }
}

.customer-section {
  background: #f5f2ed;
  padding: 60px 0;
}

/* Card */
.review-card {
  background: #fff;
  border-radius: 20px;
  overflow: hidden;
  transition: 0.3s;
}

.review-card:hover {
  transform: translateY(-10px);
}

/* Image */
.review-img {
  width: 100%;
  height: 220px;
  object-fit: cover;
}

/* Content */
.review-content {
  padding: 20px;
}

.review-text {
  font-size: 14px;
  color: #555;
  margin-bottom: 10px;
}

/* Stars */
.stars {
  color: #9c6b4f; /* 🔥 same theme color */
  font-size: 18px;
  margin-bottom: 10px;
}

/* Name */
.review-name {
  font-weight: bold;
  color: #2f3e46;
}

.bottom-marquee {
  background: #f6f2ec;
  padding: 40px 0;
}

.footer-section {
  background: #2f3e46; /* 🔥 dark theme */
  color: #ddd;
  padding: 60px 0 20px;
}

/* Titles */
.footer-title {
  color: #9c6b4f;
  font-size: 22px;
  font-weight: bold;
}

.footer-heading {
  color: #fff;
  margin-bottom: 15px;
}

/* Text */
.footer-text {
  font-size: 14px;
  color: #ccc;
}

/* Links */
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

/* Contact */
.footer-contact {
  font-size: 14px;
  margin-bottom: 6px;
}

/* Social */
.footer-social span {
  margin-right: 10px;
  font-size: 18px;
  cursor: pointer;
  transition: 0.3s;
}

.footer-social span:hover {
  color: #9c6b4f;
}

/* Bottom */
.footer-bottom {
  border-top: 1px solid #555;
  padding-top: 15px;
  font-size: 13px;
  color: #aaa;
}
    </style>

</head>

<body>


@extends('layouts.app')

@section('content')

<!-- 🔥 HERO SECTION -->
<div class="hero-section">
    <div class="container">
        <div class="row align-items-center">

            <!-- Left Content -->
            <div class="col-md-6">
                <h1 class="hero-title">
                    PREMIUM <br> DESIGNER <br> FURNITURE
                </h1>

                <p class="hero-text">
                    Curated Designer Furniture from Across the World,
                    Crafted for Elegance and Comfort
                </p>

                <div class="d-flex align-items-center mt-4">
                    <button class="hero-btn">DISCOVER CATEGORIES</button>
                    <p class="ms-3 mb-0">More than <b>700+</b> premium pieces.</p>
                </div>
            </div>

            <!-- Right Image -->
            <div class="col-md-6 text-center">
                <img src="{{ asset('images/chair3.jpg') }}" class="hero-img">
            </div>

        </div>
    </div>
</div>

<div class="container mt-5">

    <h4 class="mb-3">All Categories</h4>

<div class="slider-wrapper" id="sliderWrapper">

        <div class="slider">

            <!-- Card -->
            <div class="slide-card">
                <span class="badge-new">NEW</span>
                <img src="{{ asset('images/table.jpg') }}">
            </div>

            <div class="slide-card">
                <span class="badge-new">NEW</span>
                <img src="{{ asset('images/chair.jpg') }}">
            </div>

            <div class="slide-card">
                <span class="badge-new">NEW</span>
                <img src="{{ asset('images/sofa.jpg') }}">
            </div>

            <div class="slide-card">
                <span class="badge-new">NEW</span>
                <img src="{{ asset('images/bed.jpg') }}">
            </div>

            <div class="slide-card">
                <span class="badge-new">NEW</span>
                <img src="{{ asset('images/table.jpg') }}">
            </div>

            <div class="slide-card">
                <span class="badge-new">NEW</span>
                <img src="{{ asset('images/sofa.jpg') }}">
            </div>

            <div class="slide-card">
                <span class="badge-new">NEW</span>
                <img src="{{ asset('images/bed.jpg') }}">
            </div>

            <div class="slide-card">
                <span class="badge-new">NEW</span>
                <img src="{{ asset('images/table.jpg') }}">
            </div>

        </div>

    </div>

</div>


<!-- 🔥 CATEGORY SECTION -->
<div class="category-section mt-5">
    <div class="container">
        <div class="row g-4">

            <!-- LEFT SIDE -->
            <div class="col-md-8">

                <div class="category-box">

                    <p class="small-title">SHOP BY STYLE</p>
                    <h2 class="main-title">Browse Our Collections</h2>

                    <div class="row mt-4">

                        <div class="col-md-3">
                            <div class="cat-card">
                                <div class="icon">🛋️</div>
                                <p>Sofas</p>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="cat-card">
                                <div class="icon">🪑</div>
                                <p>Chairs</p>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="cat-card">
                                <div class="icon">🛏️</div>
                                <p>Beds</p>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="cat-card">
                                <div class="icon">🖼️</div>
                                <p>Decor</p>
                            </div>
                        </div>

                        <div class="col-md-3 mt-3">
                            <div class="cat-card">
                                <div class="icon">🪟</div>
                                <p>Tables</p>
                            </div>
                        </div>

                        <div class="col-md-3 mt-3">
                            <div class="cat-card">
                                <div class="icon">🧺</div>
                                <p>Storage</p>
                            </div>
                        </div>

                        <div class="col-md-3 mt-3">
                            <div class="cat-card">
                                <div class="icon">🌿</div>
                                <p>Outdoor</p>
                            </div>
                        </div>

                        <div class="col-md-3 mt-3">
                            <div class="cat-card">
                                <div class="icon">💡</div>
                                <p>Lighting</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- RIGHT SIDE -->
            <div class="col-md-4">

                <div class="promo-box">
                    <p class="promo-small">LATEST COLLECTION</p>
                    <h3>Fresh Designs 2026</h3>

                    <a href="#" class="arrow-btn">→</a>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- 🔥 BRAND / FEATURE SECTION -->
<div class="brand-section mt-5">
    <div class="container">
        <div class="row g-4">

            <!-- LEFT SIDE -->
            <div class="col-md-4">
                <div class="highlight-box">
                    <p class="small-text">TOP PICKS</p>
                    <h3>Exclusive Furniture Range</h3>
                    <a href="#" class="circle-btn">→</a>
                </div>
            </div>

            <!-- RIGHT SIDE -->
            <div class="col-md-8">
                <div class="brand-box">

                    <p class="small-text">SHOP BY COLLECTION</p>
                    <h2 class="main-heading">Explore Our Brands</h2>

                    <div class="row mt-4">

                        <div class="col-md-4">
                            <div class="brand-card">UrbanWood</div>
                        </div>

                        <div class="col-md-4">
                            <div class="brand-card">CasaStyle</div>
                        </div>

                        <div class="col-md-4">
                            <div class="brand-card">EliteLiving</div>
                        </div>

                        <div class="col-md-4 mt-3">
                            <div class="brand-card">HomeCraft</div>
                        </div>

                        <div class="col-md-4 mt-3">
                            <div class="brand-card">DecoraHub</div>
                        </div>

                        <div class="col-md-4 mt-3">
                            <div class="brand-card">ModernNest</div>
                        </div>

                        <div class="col-md-4 mt-3">
                            <div class="brand-card">FurniArt</div>
                        </div>

                        <div class="col-md-4 mt-3">
                            <div class="brand-card">StyleSpace</div>
                        </div>

                        <div class="col-md-4 mt-3">
                            <div class="brand-card">WoodAura</div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>


<section class="follow-section">
  <div class="follow-container">
    
    <!-- LEFT CONTENT -->
     <div class="follow-image">
      <img id="phoneImg" src="{{ asset('images/phone.jpg') }}" alt="phone">
    </div>

    <!-- RIGHT IMAGE -->
    <div class="follow-text">
      <p class="small-line"></p>
      <h2 id="heading">FOLLOW ON WHATSAPP</h2>
      <p id="subtext">
        Join our WhatsApp Channel and follow the latest news.
      </p>
      <button id="btnText">FOLLOW ON WHATSAPP</button>
    </div>

  </div>

  <!-- MARQUEE -->
  <div class="marquee-wrapper">
    <div class="marquee-track">
      <div class="marquee-content"></div>
      <div class="marquee-content"></div>
    </div>
  </div>
</section>


<section class="customer-section">
  <div class="container">

    <p class="small-title text-center">TESTIMONIALS</p>
    <h2 class="main-title text-center mb-5">Happy Customers</h2>

    <div class="row g-4">

      <!-- Card 1 -->
      <div class="col-md-4">
        <div class="review-card">
          <img src="{{ asset('images/sofa.jpg') }}" class="review-img">

          <div class="review-content">
            <p class="review-text">
              Amazing quality furniture. My living room looks premium now!
            </p>

            <!-- Stars -->
            <div class="stars">★★★★★</div>

            <h6 class="review-name">Rohit Sharma</h6>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-md-4">
        <div class="review-card">
          <img src="{{ asset('images/chair.jpg') }}" class="review-img">

          <div class="review-content">
            <p class="review-text">
              Fast delivery and great design. Totally worth it.
            </p>

            <div class="stars">★★★★★</div>

            <h6 class="review-name">Priya Singh</h6>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-md-4">
        <div class="review-card">
          <img src="{{ asset('images/table.jpg') }}" class="review-img">

          <div class="review-content">
            <p class="review-text">
              Stylish and comfortable furniture. Highly recommended!
            </p>

            <div class="stars">★★★★★</div>

            <h6 class="review-name">Amit Verma</h6>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<section class="bottom-marquee">
  
  <div class="container text-center mb-4">
    <h3 class="main-title">Stay Updated</h3>
    <p>Latest trends, offers & updates</p>
  </div>

  <div class="marquee-wrapper">
    <div class="marquee-track">

      <div class="marquee-content"></div>
      <div class="marquee-content"></div>

    </div>
  </div>

</section>

@endsection


@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {

    // 🔥 SLIDER
    const slider = document.getElementById('sliderWrapper');
    let scrollAmount = 0;

    function autoSlide() {
        if (!slider) return; // safety
        scrollAmount += 1;
        slider.scrollLeft = scrollAmount;

        if (scrollAmount >= slider.scrollWidth / 2) {
            scrollAmount = 0;
        }
    }
    setInterval(autoSlide, 20);


    // 🔥 MEGA MENU CLICK
    document.querySelectorAll(".mega-item").forEach(item => {
        item.addEventListener("click", function () {
            const link = this.getAttribute("data-link");
            if (link) window.location.href = link;
        });
    });

    function goTo(link) {
        window.location.href = link;
    }


    // 🔥 ACTIVE NAV LINK
    const links = document.querySelectorAll(".nav-menu a");
    links.forEach(link => {
        link.addEventListener("click", function () {
            links.forEach(l => l.classList.remove("active"));
            this.classList.add("active");
        });
    });


    // 🔥 DATA
    const data = {
        heading: "FOLLOW ON WHATSAPP",
        subtext: "Join our WhatsApp Channel and follow the latest news.",
        button: "FOLLOW ON WHATSAPP",
        image: "/images/phone.jpg",

        marqueeItems: [
            "Trends",
            "News from IOTA",
            "Offers",
            "New Arrivals",
            "Announcements"
        ]
    };


    // 🔥 TEXT UPDATE
    const heading = document.getElementById("heading");
    const subtext = document.getElementById("subtext");
    const btnText = document.getElementById("btnText");
    const phoneImg = document.getElementById("phoneImg");

    if (heading) heading.innerText = data.heading;
    if (subtext) subtext.innerText = data.subtext;
    if (btnText) btnText.innerText = data.button;
    if (phoneImg) phoneImg.src = data.image;


    // 🔥 MARQUEE
    const marquee = document.querySelectorAll(".marquee-content");

    marquee.forEach(container => {
        container.innerHTML = data.marqueeItems
            .map(item => `<span>${item}</span>`)
            .join("");
    });

});
</script>
@endpush

</body>
</html>