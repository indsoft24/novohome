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
          <img src="{{ asset('images/image.png') }}">
        </a>
      </div>

      <!-- Search -->
      <input type="text" placeholder="Search..." class="search-box">

      <!-- Cart -->
      <div class="cart-icon">🛒</div>
    </div>

    <!-- Menu -->
    <div class="menu-wrapper">
      <div class="container">
        <ul class="nav-menu">

          <!-- 🔥 Categories -->
          <li class="mega-parent">
            <a href="/categories">Categories</a>

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
          $brands = [
            'IKEA',
            'Godrej Interio',
            'Durian',
            'Nilkamal',
            'Urban Ladder',
            'Pepperfry',
            'Hometown',
            'Evok',
            'RoyalOak',
            'WoodenStreet',
            'FabIndia Furniture',
            'Stanley',
            'Home Centre',
            'Spacewood'
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
$sectionProducts = isset($products) ? $products->filter(function($p) use ($key) {
    return strtolower(trim($p->section)) == strtolower($key);
}) : collect();
@endphp

{{-- 🔥 BRANDS --}}
@if($key == 'brands')
<li class="mega-parent">
  <a href="#">{{ $label }}</a>

  <div class="mega-menu">
    <div class="container">
      <div class="mega-grid">
        @foreach($brands as $brand)
          <div class="mega-item">{{ $brand }}</div>
        @endforeach
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

        <!-- LEFT -->
        <div class="mega-left">
          <img src="{{ asset('images/' . ($sectionProducts->count() ? $sectionProducts->first()->image : 'sofa.jpg')) }}">
          <p>{{ $label }} Collection</p>
          <p class="mega-quote">
            {{ $quotes[$key] ?? '' }}
          </p>
        </div>

        <!-- RIGHT -->
        <div class="mega-right">
          <div class="mega-grid">

            @foreach($sectionProducts->take(4) as $item)
              <div class="mega-item"
                   onclick="window.location.href='/product/{{ $item->id }}'">
                <p>{{ $item->name }}</p>
              </div>
            @endforeach

            <div class="mega-item"
                 style="font-weight:bold; color:#8b5e3c;"
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