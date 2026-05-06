<div class="header-wrapper">

  <!-- Top Bar -->
  <div class="top-bar">
    Live Better with NOVAHOMZ
  </div>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg">
    <div class="container d-flex justify-content-between align-items-center">

      <!-- Logo -->
      <div class="logo">
        <a href="/">
          <img src="{{ asset('images/logo.png') }}">
        </a>
      </div>

      <!-- Search -->
      <input 
        type="text" 
        id="search" 
        name="search" 
        placeholder="Search..." 
        class="search-box">

      <!-- Cart -->
      <div class="position-relative" onclick="openCartModal()" style="cursor:pointer;">
    
    <div class="cart-icon">🛒</div>

    <span id="cart-count" 
          class="badge bg-danger position-absolute top-0 start-100 translate-middle">
        0
    </span>

</div>
</div>


<!-- Overlay -->
<div id="cartOverlay" class="cart-overlay" onclick="closeCartModal()"></div>

<!-- CART MODAL -->
<div id="cartModal" class="cart-modal">

    <div class="cart-box">

        <!-- Header -->
        <div class="cart-header">
            <h5>NOVAHOMZ</h5>
            <span onclick="closeCartModal()">✖</span>
        </div>

        <!-- Body -->
        <div id="cart-items" class="cart-body">
            <p>No items found.</p>
        </div>

        <!-- Footer -->
        <div class="cart-footer">
            <button onclick="goToCart()">View Cart</button>
        </div>

    </div>
</div>

    <!-- Menu -->
    <div class="menu-wrapper">
      <div class="container">
        <ul class="nav-menu">

          <!-- 🔥 Categories -->
          <li class="mega-parent">
            <a href="/">Categories</a>

            <div class="mega-menu">
              <div class="container">
                <div class="mega-grid">

                  @foreach($categories as $cat)
                    <a href="/category/{{ $cat->id }}">
                      {{ $cat->name }}
                    </a>
                  @endforeach

                </div>
              </div>
            </div>
          </li>

          <!-- 🔥 Collections -->
          <li><a href="/collection">Collections</a></li>

          @php
          $sections = [
              'living' => 'Living',
              'dining' => 'Dining',
              'bedroom' => 'Bedroom',
              'shop' => 'Shop',
              'office' => 'Office',
              'decor' => 'Decor',
              'brands' => 'Brands',
              'explore' => 'Explore'
          ];
          @endphp
          

          @php
          $quotes = [
            'living' => 'Comfort meets style for everyday living.',
            'dining' => 'Where every meal becomes a memory.',
            'bedroom' => 'Designed for rest, built for dreams.',
            'shop' => 'Discover furniture crafted for you.',
            'office' => 'Work smarter in a stylish space.',
            'decor' => 'Add elegance to every corner.',
            'explore' => 'Find something new and inspiring.'
          ];
          @endphp

          @php
          $explore = [
            'Our Story' => [
              'About Us',
              'Our Journey',
              'Mission & Vision',
              'Careers'
            ],
            'Customer Care' => [
              'Contact Us',
              'Track Order',
              'FAQs',
              'Shipping Info'
            ],
            'Legal' => [
              'Privacy Policy',
              'Terms & Conditions',
              'Return Policy',
              'Refund Policy'
            ]
          ];
          @endphp

          <!-- 🔥 Dynamic Sections -->
        @foreach($sections as $key => $label)

@php
$sectionProducts = \App\Models\Product::whereRaw('LOWER(section) = ?', [strtolower($key)])
                                      ->take(4)
                                      ->get();
@endphp

{{-- 🔥 BRANDS --}}
@if($key == 'brands')
<li class="mega-parent">
  <a href="#">{{ $label }}</a>

  <div class="mega-menu">
    <div class="container">
      <div class="mega-grid">

        @if(isset($brands) && count($brands))
          @foreach($brands as $brand)
            <div class="mega-item">
              {{ $brand->name }}
            </div>
          @endforeach
        @endif

      </div>
    </div>
  </div>
</li>

{{-- 🔥 EXPLORE --}}
@elseif($key == 'explore')
<li class="mega-parent">
  <a href="#">{{ $label }}</a>

  <div class="mega-menu">
    <div class="container">
      <div class="explore-grid">

        @foreach($explore as $title => $links)
          <div>
            <h6 class="explore-title">{{ $title }}</h6>

            @foreach($links as $link)
              <div class="explore-item">{{ $link }}</div>
            @endforeach

          </div>
        @endforeach

      </div>
    </div>
  </div>
</li>

{{-- 🔥 NORMAL SECTIONS --}}
@else
<li class="mega-parent">
  <a href="/section/{{ $key }}">{{ $label }}</a>

  <div class="mega-menu">
    <div class="container">
      <div class="mega-layout">

        <div class="mega-left">
          <img src="{{ asset('images/' . ($sectionProducts->count() ? $sectionProducts->first()->image : 'sofa.jpg')) }}">
          <p>{{ $label }} Collection</p>
          <p class="mega-quote">
            {{ $quotes[$key] ?? '' }}
          </p>
        </div>

        <div class="mega-right">
          <div class="mega-grid">

            @foreach($sectionProducts as $item)
              <div class="mega-item"
                   onclick="window.location.href='/product/{{ $item->id }}'">
                <p>{{ $item->name }}</p>
              </div>
            @endforeach

            <div class="mega-item"
                 onclick="window.location.href='/section/{{ $key }}'">
              View All →
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</li>
@endif

@endforeach

          <!-- Contact -->
          <li><a href="/contact">Contact</a></li>

        </ul>
      </div>
    </div>

  </nav>

</div>






<script>


/* 🔥 Active menu highlight */
const links = document.querySelectorAll(".nav-menu a");

links.forEach(link => {
  link.addEventListener("click", function () {
    links.forEach(l => l.classList.remove("active"));
    this.classList.add("active");
  });
});

/* 🔥 Sticky header background change on scroll */
window.addEventListener("scroll", function () {
  const header = document.querySelector(".header-wrapper");
  if (window.scrollY > 50) {
    header.classList.add("scrolled");
  } else {
    header.classList.remove("scrolled");
  }
});

/* 🔥 goTo function (backup for onclick) */
function goTo(link) {
  window.location.href = link;
}
</script>