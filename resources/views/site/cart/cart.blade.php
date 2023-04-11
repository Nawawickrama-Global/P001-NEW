@extends('site.layout.main-2')
@section('content')
    <!-- ======= product Section ======= -->
    @php
        $subTotal = 0;
    @endphp
    <section class="cart pt-5 mt-5">
        <div class="container" data-aos="fade-up">
          <div class="row mt-4">
            <div class="col-lg-12">
            <div class="sort mb-1 mb-0">
              <div class="row justify-content-between mb-0 pb-0">
                <div class="col-md-4 col-sm-4">
                  <h3>Cart <span id="productCount">(1)</span></h3>
                </div>
                <div class="col-md-4 col-sm-4">
                  <h3 class="text-center">Total <span id="productCount">(1)</span></h3>
                </div>
                <div class="col-md-4 col-sm-4">
                  <a href="#" class="greenBtn" style="color: #fff !important; float:right;">CHECKOUT ALL</a>
                </div>
              </div>
            </div>
            <hr>
            <div class="col-lg-12">
              <div class="text-center text-danger mt-5">
                <p><b>
                  You haven't saved any items to your wishlist yet. Start shopping and add your favorite items to your wishlist.
                </b></p>
              </div>
            </div>
            
            </div>
          </div>
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    @foreach ($items as $item)
                        @php
                            $image = $item->product->feature_image;
                            $price = 0;
                            $price += $item->variant->sales_price;
                            foreach ($item->cartVariation as $key => $variation) {
                                $price += ($price * $variation->variation->percentage) / 100;
                            }
                            $subTotal += $price * $item->qty;
                        @endphp

                        <div class="card mt-3">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-5 img-content">
                                    <img src="{{ asset('storage/images/' . $image) }}" alt="Product img" class="img-fluid" />
                                </div>
                                <div class="col-7 text-contet">
                                    <div class="cross" >
                                        <button class="remove" data-id="{{ $item->cart_id }}" style="border: 1px solid #9D875C">
                                            <i class="bi bi-x"></i>
                                        </button>
                                    </div>
                                    <h4><a
                                            href="{{ route('view-item', $item->product->product_id) }}"><span style="color: black">{{ $item->product->title }}</span></a>
                                    </h4>
                                    <p>
                                        {{ $item->product->short_description }}
                                        <br />
                                    </p>
                                    <p style="font-size: 20px"><strong>{{ Config::get('app.currency_code') . $price }}</strong></p>
                                    <p class="buttonChange" style="font-size: 18px">
                                        <button><i data-id="{{ $item->cart_id }}" class="bi bi-dash-square"></i></button>
                                        <span class="amount" id="cart-qty{{ $item->cart_id }}"
                                            data-total="{{ $price * $item->qty }}"
                                            data-amount="{{ $price }}">{{ $item->qty }}</span>
                                        <button><i data-id="{{ $item->cart_id }}" class="bi bi-plus-square"></i></button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-6">
                    <div class="form-section mt-3">
                        <p>Do you have a coupon code?</p>
                        <form action="{{ route('apply-coupon') }}" method="POST">
                            @csrf
                            <div class="row align-items-center justify-content-center">
                                <div class="col-lg-7">
                                    <input type="text" id="couponCode" class="@error('couponCode') is-invalid @enderror"
                                        name="couponCode" placeholder="Coupon code" /><br />
                                    @error('couponCode')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-lg-5">
                                    <button class="m-0">APPLY COUPON</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="form-section mt-3">
                        <h3 class="mb-3 h4">ORDER SUMMARY</h3>
                        @php
                            $total = $subTotal;
                            if (session()->has('coupon')) {
                                $value = session()->get('coupon')['amount'];
                                if (session()->get('coupon')['type'] == 'fixed') {
                                    $total = $subTotal - $value;
                                    $couponAmount = Config::get('app.currency_code') . $value;
                                } else {
                                    $total = $subTotal - ($subTotal * $value) / 100;
                                    $couponAmount = Config::get('app.currency_code') . ($subTotal * $value) / 100;
                                }
                            }
                        @endphp
                        <p class="d-flex justify-content-between">
                            <span>Sub total</span> <span
                                id="subTotal">{{ Config::get('app.currency_code') . number_format($subTotal, 2) }}</span>
                        </p>
                        <p class="d-flex justify-content-between">
                            <span>Coupon</span> <span
                                id="couonCost">{{ session()->has('coupon') ? $couponAmount : '-' }}</span>
                        </p>
                        <p class="d-flex justify-content-between">
                            <span>Discount </span> <span id="discuntCost">-</span>
                        </p>
                        <hr />
                        <p class="d-flex justify-content-between">
                            <span><strong>Total</strong></span>
                            <span ><strong id="total">{{ Config::get('app.currency_code') . number_format($total, 2) }}</strong></span>
                        </p>
                    </div>

                    <div class="btn-section mt-3 text-center">
                        <button onclick="window.location.href='{{ route('checkout') }}'" class="green" type="button"
                            {{-- data-bs-toggle="modal"
              data-bs-target="#checkOut" --}}>
                            CHECKOUT
                        </button>
                        <br />
                        <p class="mt-3">OR</p>
                        <button class="primary">ADD TO QUOTE</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End product Section -->

    <!-- ======= Popular Section ======= -->
    <section class="popular pt-5">
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
                <div class="row product-slider swiper" data-aos="fade-up" data-aos-delay="200">
                    <div class="swiper-wrapper">
                        @foreach ($products as $product)
                            <div class="swiper-slide col-lg-3">
                                <div class="card">
                                    <div class="card-img">
                                        <div class="wishlist">
                                            <button class="wish-list-button" data-id="{{ $product->product_id }}">
                                                {!! Auth::check() && $product->wishList->where('user_id', Auth::user()->id)->count() != 0
                                                    ? '<i class="bi bi-heart-fill"></i>'
                                                    : '<i class="bi bi-heart"></i>' !!}
                                            </button>
                                        </div>
                                        <a href="{{ route('view-item', $product->product_id) }}">
                                            <img src="{{ asset('storage/images/' . $product->feature_image) }}"
                                                alt="" class="img-fluid" />
                                        </a>

                                    </div>
                                    <div class="content">
                                        <a href="{{ route('view-item', $product->product_id) }}">
                                            <p>{{ $product->title }}</p>
                                            <p>
                                                <span>{{ $product->variant->count() > 1 ? Config::get('app.currency_code') . $product->variant->min('sales_price') . ' - ' . Config::get('app.currency_code') . $product->variant->max('sales_price') : Config::get('app.currency_code') . $product->variant->min('sales_price') }}</span>
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
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!-- End popuar Section -->

    <!-- ======= Checehout Section ======= -->
    {{-- <div
    class="modal fade"
    id="checkOut"
    tabindex="-1"
    aria-labelledby="checkOutLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="row">
          <div class="col-lg-7 text-area">
            <h4>How would you like to get your order?</h4>
            <form
              action="forms/contact.php"
              method="post"
              class="php-email-form"
            >
              <div class="row gy-4">
                <div class="col-md-6">
                  <input
                    type="text"
                    name="fname"
                    class="form-control"
                    placeholder="First Name"
                    required
                  />
                </div>
                <div class="col-md-6">
                  <input
                    type="text"
                    name="lname"
                    class="form-control"
                    placeholder="Last Name"
                    required
                  />
                </div>

                <div class="col-md-12">
                  <input
                    type="text"
                    name="streetAddress"
                    class="form-control"
                    placeholder="Street address"
                    required
                  />
                </div>

                <div class="col-md-4 mr-0">
                  <input
                    type="text"
                    name="town"
                    class="form-control"
                    placeholder="Town"
                    required
                  />
                </div>

                <div class="col-md-4">
                  <input
                    type="text"
                    name="city"
                    class="form-control"
                    placeholder="City"
                    required
                  />
                </div>

                <div class="col-md-4">
                  <input
                    type="text"
                    name="pcode"
                    class="form-control"
                    placeholder="Postal Code"
                    required
                  />
                </div>

                <div class="col-md-12 mt-2">
                  <input
                    type="email"
                    class="form-control"
                    name="email"
                    placeholder="Your email adress"
                    required
                  />
                </div>

                <div class="col-md-12 mt-2">
                  <input
                    type="tel"
                    class="form-control"
                    name="phone"
                    placeholder="Phone Number"
                    required
                  />
                </div>

                <div class="col-md-12 next-btn">
                  <button class="active">Delivery</button>
                  <button>Shipping</button>
                  <button>Payment</button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-lg-5 img-part">
            <div class="close-btn">
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <p>Modal body text goes here.</p>
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-secondary"
            data-bs-dismiss="modal"
          >
            Close
          </button>
          <button type="button" class="btn btn-primary">
            Save changes
          </button>
        </div>
      </div>
    </div>
  </div> --}}
    <!-- End checkout Section -->
    <!-- End #main -->
@endsection

@push('scripts')
    <script>
        let id = null;
        let $this = null;
        let url = null;
        let total = {{ $subTotal }};

        $('.remove').click(function() {
            url = "{{ route('remove-cart') }}";
            id = $(this).data('id');
            $this = $(this);
            submitData();
            calculateTotal();
        });

        $('.bi-plus-square').click(function() {
            url = "{{ route('plus-qty') }}";
            id = $(this).data('id');
            $this = $(this);
            submitData('plus');
        });

        $('.bi-dash-square').click(function() {
            url = "{{ route('minus-qty') }}";
            id = $(this).data('id');
            $this = $(this);
            submitData('minus');
        });

        function submitData(method) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: url,
                method: "POST",
                data: {
                    id: id
                },
                success: function(data) {
                    let coupon = {{ session()->has('coupon') ? $couponAmount : 0 }};
                    if (data.remove) {
                        $this.parent().parent().parent().parent().remove();
                        $('.count-indicator').text(data.count);
                    } else if (data.qty > 0) {
                        $('#cart-qty' + id).html(data.qty);
                        let amount = $('#cart-qty' + id).data('amount');
                        $('#cart-qty' + id).attr('data-total', data.qty * amount);
                        
                        if(method == 'plus'){
                          total += amount;
                        }else{
                          total -= amount;
                        }
                    }
                    $('#subTotal').text('{{ Config::get('app.currency_code') }}' + (data.total_price).toFixed(2));
                    $('#total').text('{{ Config::get('app.currency_code') }}'+(data.total_price - coupon).toFixed(2));
                }
            })
        }

        $('.wish-list-button').click(function() {
            let product_id = $(this).data('id');
            let $this = $(this);
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
                    if (data.wishlist) {
                        $this.html('<i class="bi bi-heart-fill"></i>');
                    } else {
                        $this.html('<i class="bi bi-heart"></i>');
                    }
                }
            })
        });
    </script>
@endpush
