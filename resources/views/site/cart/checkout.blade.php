@extends('site.layout.main-2')
@section('content')
    <!-- ======= product Section ======= -->
    <section class="cart mt-5 pt-5">
        <form action="{{ route('place-order') }}" method="POST">
            @csrf
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-section mt-3">
                            <div class="form-group mt-2">
                                <label for="exampleFormControlInput1">First Name</label>
                                <input type="text" name="first_name"
                                    class="form-control @error('first_name') is-invalid @enderror" placeholder="">
                                @error('first_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="exampleFormControlInput1">Last Name</label>
                                <input type="text" name="last_name"
                                    class="form-control  @error('last_name') is-invalid @enderror" placeholder="">
                                @error('last_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="exampleFormControlInput1">Address</label>
                                <input type="text" name="address"
                                    class="form-control  @error('address') is-invalid @enderror" placeholder="">
                                @error('address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group mt-2">
                                        <label for="exampleFormControlInput1">Town</label>
                                        <input type="text" name="town"
                                            class="form-control  @error('town') is-invalid @enderror" placeholder="">
                                        @error('town')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group mt-2">
                                        <label for="exampleFormControlInput1">City</label>
                                        <input type="text" name="city"
                                            class="form-control  @error('city') is-invalid @enderror" placeholder="">
                                        @error('city')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group mt-2">
                                        <label for="exampleFormControlInput1">Postal Code</label>
                                        <input type="text" name="postal_code"
                                            class="form-control  @error('postal_code') is-invalid @enderror" placeholder="">
                                        @error('postal_code')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <label for="exampleFormControlInput1">Email Address</label>
                                <input type="text" name="email"
                                    class="form-control  @error('email') is-invalid @enderror" placeholder="">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="exampleFormControlInput1">Contact Number</label>
                                <input type="text" name="contact_number"
                                    class="form-control  @error('contact_number') is-invalid @enderror" placeholder="">
                                @error('contact_number')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-section mt-3">
                            <p>Shiping Method</p>
                            <form action="">
                                <div class="shiping-btn">
                                    <center>
                                        @foreach ($shippingMethods as $index => $shippingMethod)
                                            <input type="radio" data-price="{{ $shippingMethod->price }}"
                                                value="{{ $shippingMethod->shipping_method_id }}"
                                                id="radio{{ $index }}"
                                                class="shiping @error('shipping_method_id') is-invalid @enderror"
                                                name="shipping_method_id">
                                            <label for="radio{{ $index }}">
                                                <span class="shiping-text">{{$shippingMethod->name}}</span> -
                                                <small>{{$shippingMethod->description}}</small>
                                            </label>
                                        @endforeach

                                        @error('shipping_method_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </center>
                                </div>
                            </form>

                        </div>
                        @php
                            $total = $total_price;
                            $couponAmount = '-';
                            $coupon = 0;
                            if (session()->has('coupon')) {
                                $value = session()->get('coupon')['amount'];
                                if (session()->get('coupon')['type'] == 'fixed') {
                                    $total = $total_price - $value;
                                    $couponAmount = Config::get('app.currency_code') . $value;
                                    $coupon = $value;
                                } else {
                                    $total = $total_price - ($total_price * $value) / 100;
                                    $couponAmount = Config::get('app.currency_code') . ($total_price * $value) / 100;
                                    $coupon = ($total_price * $value) / 100;
                                }
                            }
                        @endphp
                        <div class="form-section mt-3">
                            <h3 class="mb-3 h4">ORDER SUMMARY</h3>
                            <p class="d-flex justify-content-between">
                                <span>Sub total</span> <span
                                    id="subTotal">{{ Config::get('app.currency_code') . number_format($total_price,2) }}</span>
                            </p>
                            <p class="d-flex justify-content-between">
                                <span>Coupon</span> <span id="couonCost">{{ $couponAmount }}</span>
                            </p>
                            <p class="d-flex justify-content-between">
                                <span>Discount </span> <span id="discuntCost">-</span>
                            </p>
                            <p class="d-flex justify-content-between">
                                <span>Delivery</span> <span id="deliveryCost">Free</span>
                            </p>
                            <hr />
                            <p class="d-flex justify-content-between">
                                <span><strong>Total</strong></span>
                                <span><strong
                                        id="total">{{ Config::get('app.currency_code') . number_format($total_price - $coupon, 2) }}</strong></span>
                            </p>
                        </div>

                        <div class="btn-section mt-3 text-center">
                            <button class="green" type="submit">
                                PAY NOW
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!-- End product Section -->

    <!-- ======= Popular Section ======= -->
    {{-- <section class="popular pt-5">
        <div class="container" data-aos="fade-up">
            <dv class="row justify-content-center">
                <div class="col-md-9">
                    <header class="text-center mb-3">
                        <h3 class="mb-0">YOU MAY INTERESTED IN</h3>
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
                    <div class="swiper-slide col-lg-3">
                        <div class="card">
                            <div class="card-img">
                                <div class="wishlist">
                                    <button>
                                        <i class="bi bi-heart"></i>
                                        <i class="bi bi-heart-fill d-none"></i>
                                    </button>
                                </div>
                                <img src="/assets/img/products/product-1.png" alt="" class="img-fluid" />
                            </div>
                            <div class="content">
                                <a href="#">
                                    <p>Empire Mirror</p>
                                    <p><span>$ 15,630</span></p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End product item -->

                    <div class="swiper-slide col-lg-3">
                        <div class="card">
                            <div class="card-img">
                                <div class="wishlist">
                                    <button>
                                        <i class="bi bi-heart"></i>
                                        <i class="bi bi-heart-fill d-none"></i>
                                    </button>
                                </div>
                                <img src="/assets/img/products/product-2.png" alt="" class="img-fluid" />
                            </div>
                            <div class="content">
                                <a href="#">
                                    <p>Empire Mirror</p>
                                    <p><span>$ 15,630</span></p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End product item -->

                    <div class="swiper-slide col-lg-3">
                        <div class="card">
                            <div class="card-img">
                                <div class="wishlist">
                                    <button>
                                        <i class="bi bi-heart"></i>
                                        <i class="bi bi-heart-fill d-none"></i>
                                    </button>
                                </div>
                                <img src="/assets/img/products/product-3.png" alt="" class="img-fluid" />
                            </div>
                            <div class="content">
                                <a href="#">
                                    <p>Empire Mirror</p>
                                    <p><span>$ 15,630</span></p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End product item -->

                    <div class="swiper-slide col-lg-3">
                        <div class="card">
                            <div class="card-img">
                                <div class="wishlist">
                                    <button>
                                        <i class="bi bi-heart"></i>
                                        <i class="bi bi-heart-fill d-none"></i>
                                    </button>
                                </div>
                                <img src="/assets/img/products/product-4.png" alt="" class="img-fluid" />
                            </div>
                            <div class="content">
                                <a href="#">
                                    <p>Empire Mirror</p>
                                    <p><span>$ 15,630</span></p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End product item -->

                    <div class="swiper-slide col-lg-3">
                        <div class="card">
                            <div class="card-img">
                                <div class="wishlist">
                                    <button>
                                        <i class="bi bi-heart"></i>
                                        <i class="bi bi-heart-fill d-none"></i>
                                    </button>
                                </div>
                                <img src="/assets/img/products/product-4.png" alt="" class="img-fluid" />
                            </div>
                            <div class="content">
                                <a href="#">
                                    <p>Empire Mirror</p>
                                    <p><span>$ 15,630</span></p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End product item -->
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section> --}}
    <!-- End popuar Section -->
    <!-- End checkout Section -->
    <!-- End #main -->
@endsection
@push('scripts')
    <script>
        $('.shiping').click(function() {
            let shippingPrice = $(this).data('price');
            let subTotal = {{ $total_price }};
            let coupon = {{ $coupon}};
            let Total = subTotal + shippingPrice - coupon;
            if (shippingPrice == 0) {
                $('#deliveryCost').html('Free');
            } else {
                $('#deliveryCost').html("{{ Config::get('app.currency_code') }}" + shippingPrice);
            }
            $('#total').text("{{ Config::get('app.currency_code') }}" + Total.toFixed(2));
        });
    </script>
@endpush
