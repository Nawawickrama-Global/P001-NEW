<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Luxury Furniture</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="{{ url('assets/img/favicon.png') }}" rel="icon" />
    <link href="{{ url('assets/img/apple-touch-icon.png" rel="apple-touch-icon') }}" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="{{ url('https://fonts.googleapis.com') }}" />
    <link rel="preconnect" href="{{ url('https://fonts.gstatic.com') }}" crossorigin />
    <link href="{{ url('https://fonts.googleapis.com/css2?family=Cormorant+Unicase:wght@400;500;600;700&family=Inter:wght@400;500;600;700;800&family=Montserrat:wght@400;500;600;700;800&display=swap') }}" rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="{{ url('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="{{ url('assets/css/style.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
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
</head>

<body>
    @include('sweetalert::alert')
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center" style="background-color: #000">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="">
                <a href="{{ url('/') }}" class="getstarted">AURA OF INT</a>
            </div>
            <nav id="navbar" class="navbar">
                <ul>
                    <li class="nav-link"><a href="{{ url('/shop') }}">Shop All</a></li>
                    <li class="nav-link"><a href="{{ url('/about-us') }}">About Us</a></li>
                    <li class="nav-link"><a href="{{ url('/why-us') }}">Why Us?</a></li>
                    <li class="nav-link"><a href="{{ url('/partners') }}">Partners</a></li>
                    <li class="nav-link"><a href="{{ url('/contact') }}">Contact Us</a></li>
                </ul>

                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <div class="icons">
                <button data-toggle="tooltip" class="search" title="Search"><i class="bi bi-search"></i></button>
                <button data-toggle="tooltip" title="Wishlist"><i class="bi bi-heart"></i></button>
                <button data-toggle="tooltip" title="Login / Register" onclick="window.location='{{ url('/login') }}';"><i class="bi bi-person-circle"></i></button>
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

    <main id="main">
        <!-- ======= Login Section ======= -->
        <section class="form-section">
            @yield('content')

        </section>
        <!-- End Login -->
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
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
                                <a href="#" class="facebook" title="View on Facebook"><i class="bx bxl-facebook"></i></a>
                                <a href="#" class="instagram" title="View on Instagram"><i class="bx bxl-instagram"></i></a>
                                <a href="#" class="google-plus" title="View on Tik Tok"><i class="bi bi-tiktok"></i></a>
                                <a href="#" class="linkedin" title="View on Pinterest"><i class="bi bi-pinterest"></i></a>
                                <a href="#" class="linkedin" title="View on LinkedIn"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col footer-links">
                        <h4>Products</h4>
                        <ul>
                            <li>
                                <a href="#">All Products</a>
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
                                <a href="#">Terms and Conditions</a>
                            </li>
                            <li>
                                <a href="#">Privacy Policy</a>
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
    <script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ url('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ url('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ url('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ url('https://code.jquery.com/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ url('https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js') }}"></script>
    <script src="{{ url('https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <!-- Template Main JS File -->
    <script src="{{ url('assets/js/main.js') }}"></script>
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

    @stack('scripts')
</body>

</html>