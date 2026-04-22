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
          <li class="mega-parent">
            <a href="/categories" class="category-link">Categories</a>
          
            <!-- MEGA MENU -->
                 <div class="mega-menu">
                    <div class="container">
                      <div class="mega-grid">
                  
                        @foreach($categories as $cat)
                          <div class="mega-item" data-link="/category/{{ $cat->slug }}">
                            <p>{{ $cat->name }}</p>
                          </div>
                        @endforeach
                  
                      </div>
                    </div>
                  </div>
                </li>
          <li><a href="/collection">Collections</a></li>
          <li class="mega-parent">
            <a href="/living">Living</a>
          
            <div class="mega-menu">
              <div class="container">
          
                <div class="mega-layout">
          
                  <!-- LEFT SIDE -->
                  <div class="mega-left">
                    <img src="{{ asset('images/bed.jpg') }}">
                    <p>Comfort meets elegance in your living space</p>
                  </div>
          
                  <!-- RIGHT SIDE -->
                  <div class="mega-right">
          
                    <div class="mega-grid">
          
                      <div class="mega-item" onclick="goTo('/category/sofa')">
                        <p>Sofa</p>
                      </div>
          
                      <div class="mega-item" onclick="goTo('/category/coffee-table')">
                        <p>Coffee Table</p>
                      </div>
          
                      <div class="mega-item" onclick="goTo('/category/tv-unit')">
                        <p>TV Unit</p>
                      </div>
          
                      <div class="mega-item" onclick="goTo('/category/recliner')">
                        <p>Recliner</p>
                      </div>
          
                    </div>
          
                  </div>
          
                </div>
          
              </div>
            </div>
          </li>
           <li class="mega-parent">
             <a href="/Dining">Dining</a>
           
             <div class="mega-menu">
               <div class="container">
           
                 <div class="mega-layout">
           
                   <!-- LEFT SIDE -->
                   <div class="mega-left">
                     <img src="images/sofa.jpg" alt="">
                     <p>Bring people together with beautiful dining</p>
                   </div>
           
                   <!-- RIGHT SIDE -->
                   <div class="mega-right">
           
                     <div class="mega-grid">
           
                       <div class="mega-item" onclick="goTo('/category/sofa')">
                         <p>Sofa</p>
                       </div>
           
                       <div class="mega-item" onclick="goTo('/category/coffee-table')">
                         <p>Coffee Table</p>
                       </div>
           
                       <div class="mega-item" onclick="goTo('/category/tv-unit')">
                         <p>TV Unit</p>
                       </div>
           
                       <div class="mega-item" onclick="goTo('/category/recliner')">
                         <p>Recliner</p>
                       </div>
           
                     </div>
           
                   </div>
           
                 </div>
           
               </div>
             </div>
           </li>
          <li class="mega-parent">
            <a href="/Bedroom">Bedroom</a>
          
            <div class="mega-menu">
              <div class="container">
          
                <div class="mega-layout">
          
                  <!-- LEFT SIDE -->
                  <div class="mega-left">
                    <img src="images/bed.jpg" alt="">
                    <p>Relax in style with premium comfort</p>
                  </div>
          
                  <!-- RIGHT SIDE -->
                  <div class="mega-right">
          
                    <div class="mega-grid">
          
                      <div class="mega-item" onclick="goTo('/category/sofa')">
                        <p>Sofa</p>
                      </div>
          
                      <div class="mega-item" onclick="goTo('/category/coffee-table')">
                        <p>Coffee Table</p>
                      </div>
          
                      <div class="mega-item" onclick="goTo('/category/tv-unit')">
                        <p>TV Unit</p>
                      </div>
          
                      <div class="mega-item" onclick="goTo('/category/recliner')">
                        <p>Recliner</p>
                      </div>
          
                    </div>
          
                  </div>
          
                </div>
          
              </div>
            </div>
          </li>
          <li><a href="#">Shop</a></li>
          <li><a href="#">Office</a></li>
          <li><a href="#">Decor</a></li>
          <li><a href="#">Brands</a></li>
          <li class="mega-parent">
           <a href="/Explore">Explore</a>
          
            <div class="mega-menu">
              <div class="container">
          
                <div class="mega-layout">
          
                  <!-- LEFT SIDE -->
                  <div class="mega-left">
                    <img src="images/table.jpg" alt="">
                    <p>Discover latest trends & collections</p>
                  </div>
          
                  <!-- RIGHT SIDE -->
                  <div class="mega-right">
          
                    <div class="mega-grid">
          
                      <div class="mega-item" onclick="goTo('/category/sofa')">
                        <p>Sofa</p>
                      </div>
          
                      <div class="mega-item" onclick="goTo('/category/coffee-table')">
                        <p>Coffee Table</p>
                      </div>
          
                      <div class="mega-item" onclick="goTo('/category/tv-unit')">
                        <p>TV Unit</p>
                      </div>
          
                      <div class="mega-item" onclick="goTo('/category/recliner')">
                        <p>Recliner</p>
                      </div>
          
                    </div>
          
                  </div>
          
                </div>
          
              </div>
            </div>
          </li>
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