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

          <!-- 🔥 Dynamic Sections -->
          @foreach($sections as $key => $label)
                    @php
          $sectionProducts = isset($products) ? $products->filter(function($p) use ($key) {
              return strtolower($p->section) == strtolower($key);
          }) : collect();
          @endphp

          <li class="mega-parent">
            <a href="/section/{{ $key }}">{{ $label }}</a>

            <div class="mega-menu">
              <div class="container">

                <div class="mega-layout">

                  <!-- LEFT IMAGE -->
                  <div class="mega-left">
                    <img src="{{ asset('images/' . ($sectionProducts->first()->image ?? 'sofa.jpg')) }}">
                    <p>{{ $label }} Collection</p>
                  </div>

                  <!-- RIGHT PRODUCTS -->
                  <div class="mega-right">
                    <div class="mega-grid">

                      @foreach($sectionProducts->take(4) as $item)
                        <div class="mega-item"
                             onclick="window.location.href='/product/{{ $item->id }}'">
                          <p>{{ $item->name }}</p>
                        </div>
                      @endforeach

                      <!-- VIEW ALL -->
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

          @endforeach

          <!-- Contact -->
          <li><a href="/contact">Contact</a></li>

        </ul>
      </div>
    </div>

  </nav>

</div>






<script>
/* 🔥 Mega menu click */
document.querySelectorAll(".mega-item").forEach(item => {
  item.addEventListener("click", function () {
    const link = this.getAttribute("data-link");
    if(link){
      window.location.href = link;
    }
  });
});

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