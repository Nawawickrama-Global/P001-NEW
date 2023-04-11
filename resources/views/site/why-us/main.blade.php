@extends('site.layout.main')
@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero">
  <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    <div class="carousel-inner" role="listbox">
      <!-- Slide 1 -->
      <div class="carousel-item active" style="background-image: url(assets/img/slide/why-buy-from-us.png)">
        <div class="carousel-container" style="top:unset !important">
          <div class="container">
            <div class="row">
              <div class="col-md-9 text-start">
                <h2 class="animate__animated animate__fadeInDown">
                  WHY BUY FROM US
                </h2>
                <p class="animate__animated animate__fadeInUp">
                  Tell your story with timeless pieces of extraordinary design
                </p>
              </div>
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
  <section class="about mt-5">
    <div class="container d-flex justify-content-center">
      <div class="col-lg-9 text-center pt-3">
        <h2>Why US</h2>
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
      </div>
    </div>
  </section>
  <!-- End chose section  -->

  <!-- ======= Popular Section ======= -->
  <section class="popular pt-5">
    <div class="container" data-aos="fade-up">
      <dv class="row justify-content-center">
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
      </dv>

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

  <!-- ======= Popular Section ======= -->
  <section class="why-us">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-9 text-center mb-3">
          <header class="text-center mb-3">
            <h3 class="mb-0">BE INSPIRED</h3>
            <div class="line mt-0"></div>
            <p class="mt-3">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
              do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
          </header>
        </div>
        <div class="row">
          <div class="col-md-3 text-center mt-3">
            <img src="/assets/img/why-1.png" alt="brand" class="img-fluid" />
            <br />
            <a href="/">discover more</a>
          </div>

          <div class="col-md-3 text-center mt-3">
            <img src="/assets/img/why-1.png" alt="brand" class="img-fluid" />
            <br />
            <a href="/">discover more</a>
          </div>

          <div class="col-md-3 text-center mt-3">
            <img src="/assets/img/why-1.png" alt="brand" class="img-fluid" />
            <br />
            <a href="/">discover more</a>
          </div>

          <div class="col-md-3 text-center mt-3">
            <img src="/assets/img/why-1.png" alt="brand" class="img-fluid" />
            <br />
            <a href="/">discover more</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End popuar Section -->
</main>
<!-- End #main -->
@endsection