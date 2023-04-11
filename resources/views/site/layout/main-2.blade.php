<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Luxury Furniture</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="{{url('assets/img/favicon.png')}}" rel="icon" />
    <link href="{{url('assets/img/apple-touch-icon.png" rel="apple-touch-icon')}}" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="{{url('https://fonts.googleapis.com')}}" />
    <link rel="preconnect" href="{{url('https://fonts.gstatic.com')}}" crossorigin />
    <link href="{{url('https://fonts.googleapis.com/css2?family=Cormorant+Unicase:wght@400;500;600;700&family=Inter:wght@400;500;600;700;800&family=Montserrat:wght@400;500;600;700;800&display=swap')}}" rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="{{url('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet" />
    <link href="{{url('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{url('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet" />
    <link href="{{url('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet" />
    <link href="{{url('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet" />
    <link href="{{url('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet" />
    <link href="{{url('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{url('assets/css/style.css')}}" rel="stylesheet" />
</head>

<body>
    @include('sweetalert::alert')
    <!-- ======= Header ======= -->
    <header id="header-2" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
          <nav id="navbar" class="navbar">
            <ul>
              <li class="dropdown">
                <a href="#"
                  ><span>Shop Now</span> <i class="bi bi-chevron-down"></i
                ></a>
                <ul style="width: 1080px">
                  <div class="container">
                    <div class="row my-4">
                      <div class="col-md-3">
                        <li>
                          <p><span>Shop By Brands</span></p>
                        </li>
                        <li><a href="" style="padding-left: 0">Pullcasts </a></li>
                        <li><a href="" style="padding-left: 0">Luxxu Loomiosa </a></li>
                        <li><a href="" style="padding-left: 0">Bocadolobo</a></li>
                        <li>
                          <a href="/shop" class="green-btn" style="margin-left: 0">Shop All</a>
                        </li>
                        
                      </div>
                      @foreach ($parentCategories as $category)
                      <div class="col-md-2">
                        <li>
                          <p><span>{{ $category->name }}</span></p>
                        </li>
                        @foreach ($category->subcategory as $subcategory)
                        <li><a href="{{ route('products.index') }}?category={{ $subcategory->name }}" style="padding-left: 0">{{ $subcategory->name }} </a></li>
                        @endforeach
                      </div>  
                      @endforeach
                    </div>
                  </div>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#"
                  ><span>EXPLORE</span> <i class="bi bi-chevron-down"></i
                ></a>
                <ul style="width: 800px">
                  <div class="container">
                    <div class="row my-4">
                      <div class="col-md-4">
                        <li>
                          <p><span>ABOUT US</span></p>
                        </li>
                        <li><a href="/about-us" style="padding-left: 0">OUR STORY</a></li>
                        <li><a href="/why-us" style="padding-left: 0">WHY BUY FROM US?</a></li>
                        <li><a href="/partners" style="padding-left: 0">OUR PARTNER BRANDS</a></li>
                      </div>
                      <div class="col-md-4">
                        <li>
                          <p><span>INSPIRATIONS</span></p>
                        </li>
                        <li><a href="#" style="padding-left: 0">MOODBOARDS</a></li>
                        <li><a href="#" style="padding-left: 0">EBOOKS</a></li>
                        <li><a href="/contact" style="padding-left: 0">CONNECT</a></li>
                      </div>
                      <div class="col-md-4">
                        <li>
                          <p><span>SUPPORT</span></p>
                        </li>
                        <li><a href="#" style="padding-left: 0">EBOOKS</a></li>
                        <li><a href="#" style="padding-left: 0">FACEBOOK</a></li>
                        <li><a href="#" style="padding-left: 0">INSTAGRAM</a></li>
                        <li><a href="#" style="padding-left: 0">LINKEDIN</a></li>
                        <li><a href="#" style="padding-left: 0">TIKTOK</a></li>
                      </div>
                    </div>
                  </div>
                </ul>
              </li>
            </ul>
  
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav>
          <div class="get">
            <a href="/" class="getstarted">AURA OF INT</a>
          </div>
          <div class="icons">
            <button data-toggle="tooltip" class="search" title="Search"><i class="bi bi-search"></i></button>
            <button data-toggle="tooltip" onclick="window.location='{{ url('/wishlist') }}';" title="Wishlist"><i class="bi bi-heart"></i></button>
            @guest
            <button data-toggle="tooltip" title="Login / Register"
            onclick="window.location='{{ url('/login') }}';"><i class="bi bi-person-circle"></i></button>
            @else
            <button data-toggle="tooltip" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" title="Logout"><i class="bi bi-box-arrow-in-left"></i></button>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
            @endguest

            @auth
            <button onclick="window.location.href='{{ route('cart') }}';" data-toggle="tooltip" title="Cart"><i class="bi bi-bag"></i><span
              class="count-indicator">
                  {{ Auth::user()->cart->count() }}
          </span></button>
          @else
          <button onclick="window.location.href='{{ route('cart') }}';" data-toggle="tooltip" title="Cart"><i class="bi bi-bag"></i></button>
          @endauth
        </div>
          <!-- .navbar -->
        </div>
      </header>
    <!-- End Header -->

    @yield('content')
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top gold-border-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12">
                        <div class="footer-info">
                            <a href="#" class="brand">AURA OF INT</a>
                            <br />
                            <br />
                            <br />
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </p>
                            <br />
                            <p><span>CONNECT ON SOCIALS</span></p>
                            <div class="social-links mt-3">
                                <a href="#" class="facebook" title="view on Facebook"><i class="bx bxl-facebook"></i></a>
                                <a href="#" class="instagram" title="view on Instagram"><i class="bx bxl-instagram"></i></a>
                                <a href="#" class="google-plus" title="view on Tik Tok"><i class="bi bi-tiktok"></i></a>
                                <a href="#" class="linkedin" title="view on Pinterest"><i class="bi bi-pinterest"></i></a>
                                <a href="#" class="linkedin" title="view on LinkedIn"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col footer-links">
                        <h4>Products</h4>
                        <ul>
                            <li>
                                <a href="/shop">All Products</a>
                            </li>
                            <li>
                                <a href="#">Door Hardware</a>
                            </li>
                            <li>
                                <a href="#">Furniture</a>
                            </li>

                            <li>
                                <a href="#">Lighting</a>
                            </li>
                            <li>
                                <a href="#">Mirrors</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col footer-links">
                        <h4>Desire</h4>
                        <ul>
                            <li>
                                <a href="#">Inspiration</a>
                            </li>
                            <li>
                                <a href="#">Finishes</a>
                            </li>
                            <li>
                                <a href="#">Your Account</a>
                            </li>

                            <li>
                                <a href="#">Quote Request</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-2 footer-links">
                        <h4>Quick Links</h4>
                        <ul>
                            <li>
                                <a href="#">FAQs</a>
                            </li>
                            <li>
                                <a href="#">About Us</a>
                            </li>
                            <li>
                                <a href="#">Contact Us</a>
                            </li>

                            <li>
                                <a href="/terms-and-condition">Terms and Conditions</a>
                            </li>
                            <li>
                                <a href="/privacy-policy">Privacy Policy</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Newsletter</h4>
                        <p>
                            Be the first to know about new products, design news, specials
                            offers and promotions.
                        </p>
                        <form action="" method="post">
                            <input id="mail" type="email" name="email" placeholder="Enter your email" /><input type="submit" value="Subscribe" />
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
          <div class="copyright">&copy; 2023 AURA OF INT | All Rights Reserved | Solution By <a href="https://kreative.global">Kreative Global</a></div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{url('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{url('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{url('assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
    <script src="{{url('https://code.jquery.com/jquery-3.5.1.min.js')}}"></script>
    <script src="{{url('https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js')}}"></script>
    <script src="{{url('https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <!-- Template Main JS File -->
    <script src="{{url('assets/js/main.js')}}"></script>
    <script>
        const wishListButtons = document.querySelectorAll(".wish-list-button");
        wishListButtons.forEach(function(wishListButton) {
            wishListButton.addEventListener("click", function() {
                this.classList.toggle("active");
            });
        });
        $(document).ready(function() {
            $('.search').click(function() {
                $(this).removeClass('search');
                $(this).parent().html('<form action="{{ route('products.index') }}"><input type="text" class="form-control" name="search">');
            });
        });
    </script>
    <style>
      .count-indicator {
            position: relative;
            background-color: #004c45;
            color: #ffffff;
            padding: 0 10px;
            border-radius: 10px;
            bottom: 8px;
            left: -5px;
            z-index: 99;
        }
    </style>

    @stack('scripts')
</body>

</html>