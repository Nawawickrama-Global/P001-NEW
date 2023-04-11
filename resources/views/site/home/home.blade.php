@extends('site.layout.main')
@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">
            <!-- Slide 1 -->
            <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.png)">
                <div class="carousel-container">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 text-start">
                                <h2 class="animate__animated animate__fadeInDown">
                                    Luxury FURNITURE <br />
                                    AND FITTINGS
                                </h2>
                                <p class="animate__animated animate__fadeInUp">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua.
                                </p>
                                <a href="/shop"
                                    class="btn-get-started animate__animated animate__fadeInUp scrollto">SHOP NOW</a>
                                <a href="#about"
                                    class="btn-get-started2 animate__animated animate__fadeInUp scrollto">BOOK A
                                    DESIGNER <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.png)">
                <div class="carousel-container">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 text-start">
                                <h2 class="animate__animated animate__fadeInDown">
                                    Lorem Ipsum Dolor
                                </h2>
                                <p class="animate__animated animate__fadeInUp">
                                    Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea
                                    ut et est quaerat sequi nihil ut aliquam. Occaecati alias
                                    dolorem mollitia ut. Similique ea voluptatem. Esse
                                    doloremque accusamus repellendus deleniti vel. Minus et
                                    tempore modi architecto.
                                </p>
                                <a href="/shop"
                                    class="btn-get-started animate__animated animate__fadeInUp scrollto">SHOP NOW</a>
                                <a href="#about"
                                    class="btn-get-started2 animate__animated animate__fadeInUp scrollto">BOOK A
                                    DESIGNER <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.png)">
                <div class="carousel-container">
                    <div class="container">
                        <div class="row">
                            <dv class="col-md-9 text-start">
                                <h2 class="animate__animated animate__fadeInDown">
                                    Sequi ea ut et est quaerat
                                </h2>
                                <p class="animate__animated animate__fadeInUp">
                                    Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea
                                    ut et est quaerat sequi nihil ut aliquam. Occaecati alias
                                    dolorem mollitia ut. Similique ea voluptatem. Esse
                                    doloremque accusamus repellendus deleniti vel. Minus et
                                    tempore modi architecto.
                                </p>
                                <a href="/shop"
                                    class="btn-get-started animate__animated animate__fadeInUp scrollto">SHOP NOW</a>
                                <a href="#about"
                                    class="btn-get-started2 animate__animated animate__fadeInUp scrollto">BOOK A
                                    DESIGNER <i class="bi bi-arrow-right"></i></a>
                            </dv>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Hero -->

<main id="main">
    <!-- ======= chose section ======= -->
    <section class="choose">
        <div class="container d-flex justify-content-center">
            <div class="col-lg-9 text-center pt-3 pb-3">
                <h2>WHAT WE CHOOSE REVEALS SOMETHING DEEPER</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem
                    ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum
                    dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit
                    amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit
                    amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua.
                </p>
                <p class="white">Tell your story with us</p>
            </div>
        </div>
    </section>
    <!-- End chose section  -->

    <!-- ======= products Section ======= -->
    <section class="products">
        <div class="container">
            <div class="row content">
                <header class="text-center mb-3">
                    <h3 class="mb-0">
                        <strong>SHOP LUXURY FURNITURE AND FITTINGS</strong>
                    </h3>
                    <div class="line mt-0"></div>
                    <p class="mt-3">Unique, modern designs and craftsmenship.</p>
                </header>
                @foreach ($categories as $category)
                <div class="col-lg-4 mt-4">
                    <div class="card"
                        style="background-image: url('{{ asset('storage/images/' . $category->category_image) }}');">
                        <div class="content">
                            <h4>{{ $category->name }}</h4>
                            <a href="{{ route('products.index') }}?parent_category={{ $category->name }}">discover more</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End products Section -->

    <!-- ======= Brand Section ======= -->
    <section class="brand section-bg">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-9 text-center">
                    <header>
                        <h3 class="mb-0">OUR BRANDS</h3>
                        <div class="line"></div>
                        <p class="mt-3">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                            do eiusmod tempor incididunt ut labore et dolore magna
                            aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit, sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua.
                        </p>
                    </header>
                </div>
            </div>
            <div class="row align-items-center">
                @foreach ($brands as $brand)
                <div class="col-lg-3">
                    <a href="">
                        <img src="{{ asset('storage/images/' . $brand->brand_image) }}" alt="" class="img-fluid" width="250px;" />
                    </a>
                </div>
                @endforeach
            </div>
            <div class="btn mt-5">
                <a href="/shop">SHOP BY BRANDS</a>
            </div>
        </div>
    </section>
    <!-- End Brand Section -->

    <!-- ======= Popular Section ======= -->
    <section class="popular pt-5">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <header class="text-center mb-3">
                        <h3 class="mb-0">OUR MOST POPULAR PIECES</h3>
                        <div class="line mt-0"></div>
                        <p class="mt-3">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                            do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                    </header>
                </div>
            </div>

            <div class="row product-slider swiper" data-aos="fade-up" data-aos-delay="200">
                <div class="swiper-wrapper">
                    @foreach ($products as $product)
                    <div class="swiper-slide col-lg-3">
                        <div class="card">
                            <div class="card-img">
                                <div class="wishlist">
                                    <button class="wish-list-button" data-id="{{ $product->product_id }}">
                                        {!! Auth::check() && $product->wishList->where('user_id',
                                        Auth::user()->id)->count() != 0 ? '<i class="bi bi-heart-fill"></i>' : '<i
                                            class="bi bi-heart"></i>' !!}
                                    </button>
                                </div>
                                <a href="{{ route('view-item', $product->product_id) }}">
                                    <img src="{{ asset('storage/images/' . $product->feature_image) }}" alt=""
                                        class="img-fluid" />
                                </a>

                            </div>
                            <div class="content">
                                <a href="{{ route('view-item', $product->product_id) }}">
                                    <p>{{ $product->title }}</p>
                                    <p>
                                        <span>{{ $product->variant->count() > 1 ? Config::get('app.currency_code') .
                                            $product->variant->min('sales_price') . ' - ' .
                                            Config::get('app.currency_code') . $product->variant->max('sales_price') :
                                            Config::get('app.currency_code') . $product->variant->min('sales_price')
                                            }}</span>
                                    </p>
                                </a>
                            </div>

                        </div>
                    </div>
                    @endforeach
                    <!-- End product item -->
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!-- End popuar Section -->

        <!-- ======= Experience Section ======= -->
        <section class="brand section-bg">
            <div class="container text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-9 text-center">
                        <header>
                            <h3 class="mb-0">THE AURA EXPERIENCE</h3>
                            <div class="line"></div>
                            <p class="mt-3">
                                Even more reason to choose us.
                            </p>
                        </header>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="text-center content">
                            <h4 class="mt-5 mb-3">
                                WORRYFREE SHIPPING
                            </h4>
                            <p>
                                We use reputable international shippers so your purchase is safely packed and carefully transported.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="text-center content">
                            <h4 class="mt-5 mb-3">
                                UNIQUE SELECTION
                            </h4>
                            <p>
                                We only choose items that meet our expectations of unique design, bold elegance and supreme quality.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="text-center content">
                            <h4 class="mt-5 mb-3">
                                HIGH STANDARDS
                            </h4>
                            <p>
                                We interact directly with designers and manufacturers to ensure quality requirements are met and all items are examined at source.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="text-center content">
                            <h4 class="mt-5 mb-3" style="visibility: hidden">
                                WORRYFREE SHIPPING
                            </h4>
                            <p>
                                You receive regular updates from us as your item makes it way through each stage of its journey, with progress accurately tracked online
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Brand Section -->

    <!-- ======= Blog Section ======= -->
    <section class="blog pb-4">
        <div class="container">
            <dv class="row justify-content-center">
                <div class="col-md-9">
                    <header class="text-center mb-3">
                        <h3 class="mb-0">BLOG</h3>
                        <div class="line mt-0"></div>
                        <p class="mt-3">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                            do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                    </header>
                </div>
            </dv>
            <div class="row">
                <div class="col-lg-4">
                    <div class="blog text-center">
                        <img src="assets/img/blog/blog-1.jpg" alt="Blog Image" class="img-fluid mb-2" />
                        <p class="mb-0">
                            Making a statement with exclusive door Hardware
                        </p>
                        <a href="#" class="mt-0">21 Nov 2022</a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="blog text-center">
                        <img src="assets/img/blog/blog-2.jpg" alt="Blog Image" class="img-fluid mb-2" />
                        <p class="mb-0">
                            Complement a hotel lobby, a foyer, or to elevate any modern
                            retail space
                        </p>
                        <a href="#" class="mt-0">21 Nov 2022</a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="blog text-center">
                        <img src="assets/img/blog/blog-3.jpg" alt="Blog Image" class="img-fluid mb-2" />
                        <p class="mb-0">
                            These modern items are a great way to elevate your porch or
                            balcony to achieve a relatex ambiance
                        </p>
                        <a href="#" class="mt-0">21 Nov 2022</a>
                    </div>
                </div>
                <div class="text-center btn mt-4">
                    <a href="#">SEE OUR BLOG</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End blog Section -->

    <!-- ======= Testimonials Section ======= -->
    <section class="testimonials mt-5">
        <div class="container" data-aos="zoom-in">
            <header class="text-center mb-5">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
            </header>
            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">
                    <!-- start testimonial item -->
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-6 img-section text-center" style="
                          background-image: url(assets/img/testimonials/testimonials-1.jpg);
                        ">
                                    <div class="top">
                                        <a href="/" class="white-btn">AURA OF INT</a>
                                        <p class="mt-3">FURNITURE COLLECTION</p>
                                    </div>

                                    <a href="#" class="green-btn">VIEW CATALOGUE</a>
                                </div>
                                <div class="col-lg-6 text-start content">
                                    <h3>
                                        CONNECTING PERSONAL TOUCH AND MODERN DESIGN WITH BOLD
                                        FURNITURE
                                    </h3>
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore
                                        magna aliqua.Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit, sed do eiusmod tempor incididunt ut
                                        labore et dolore magna aliqua.Lorem ipsum dolor sit
                                        amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.
                                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End testimonial item -->
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-6 img-section text-center" style="
                          background-image: url(assets/img/testimonials/testimonials-1.jpg);
                        ">
                                    <div class="top">
                                        <a href="/" class="white-btn">AURA OF INT</a>
                                        <p class="mt-3">FURNITURE COLLECTION</p>
                                    </div>

                                    <a href="#" class="green-btn">VIEW CATALOGUE</a>
                                </div>
                                <div class="col-lg-6 text-start content">
                                    <h3>
                                        CONNECTING PERSONAL TOUCH AND MODERN DESIGN WITH BOLD
                                        FURNITURE
                                    </h3>
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore
                                        magna aliqua.Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit, sed do eiusmod tempor incididunt ut
                                        labore et dolore magna aliqua.Lorem ipsum dolor sit
                                        amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.
                                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-6 img-section text-center" style="
                          background-image: url(assets/img/testimonials/testimonials-1.jpg);
                        ">
                                    <div class="top">
                                        <a href="/" class="white-btn">AURA OF INT</a>
                                        <p class="mt-3">FURNITURE COLLECTION</p>
                                    </div>

                                    <a href="#" class="green-btn">VIEW CATALOGUE</a>
                                </div>
                                <div class="col-lg-6 text-start content">
                                    <h3>
                                        CONNECTING PERSONAL TOUCH AND MODERN DESIGN WITH BOLD
                                        FURNITURE
                                    </h3>
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore
                                        magna aliqua.Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit, sed do eiusmod tempor incididunt ut
                                        labore et dolore magna aliqua.Lorem ipsum dolor sit
                                        amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.
                                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- End testimonial item -->
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-6 img-section text-center" style="
                          background-image: url(assets/img/testimonials/testimonials-1.jpg);
                        ">
                                    <div class="top">
                                        <a href="/" class="white-btn">AURA OF INT</a>
                                        <p class="mt-3">FURNITURE COLLECTION</p>
                                    </div>

                                    <a href="#" class="green-btn">VIEW CATALOGUE</a>
                                </div>
                                <div class="col-lg-6 text-start content">
                                    <h3>
                                        CONNECTING PERSONAL TOUCH AND MODERN DESIGN WITH BOLD
                                        FURNITURE
                                    </h3>
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore
                                        magna aliqua.Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit, sed do eiusmod tempor incididunt ut
                                        labore et dolore magna aliqua.Lorem ipsum dolor sit
                                        amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.
                                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!-- End Testimonials Section -->

    <!-- ======= Instagram  Section ======= -->
    <section class="insta">
        <div class="container">
            <dv class="row justify-content-center">
                <div class="col-md-9">
                    <header class="text-center mb-3">
                        <h3 class="mb-0">We are on INSTAGRAM</h3>
                        <div class="line mt-0"></div>
                        <p class="mt-3">
                            Follow us on instagram:
                            <a href="https://www.instagram.com/@auraof_ky" target="_blank">@auraof_ky</a>
                        </p>
                    </header>
                </div>
            </dv>
            <div class="row">
                <div class="col-lg-3">
                    <div class="blog text-center">
                        <img src="assets/img/ig/ig-1.png" alt="Blog Image" class="img-fluid mb-2" />
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="blog text-center">
                        <img src="assets/img/ig/ig-2.png" alt="Blog Image" class="img-fluid mb-2" />
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="blog text-center">
                        <img src="assets/img/ig/ig-3.png" alt="Blog Image" class="img-fluid mb-2" />
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="blog text-center">
                        <img src="assets/img/ig/ig-4.png" alt="Blog Image" class="img-fluid mb-2" />
                    </div>
                </div>
                <div class="text-center btn mt-4">
                    <a href="#">View on Instagram</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Instagram Section -->
</main>
<!-- End #main -->
@endsection
@push('scripts')
<script>
    $('.wish-list-button').click(function(){
            let product_id = $(this).data('id');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: "{{ route('add-to-wish') }}",
                method: "POST",
                data: {
                    id: product_id
                },
                success: function(data) {
                    if(data.wishlist){
                        $(this).html('<i class="bi bi-heart-fill"></i>');
                    }else{
                        $(this).html('<i class="bi bi-heart"></i>');
                    }
                }
            })
        });
</script>
@endpush