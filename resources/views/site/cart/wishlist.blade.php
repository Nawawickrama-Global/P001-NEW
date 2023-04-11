@extends('site.layout.main-2')
@section('content')
    <!-- ======= product Section ======= -->
    <br>
    <section id="product" class="product mt-5">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-12">
                    <!--Product sort-->
                    <div class="sort mb-1 mb-0">
                        <div class="row justify-content-between mb-0 pb-0">
                            <div class="col-md-3 col-sm-6">
                                <h3>Wishlist <span id="productCount">({{ $wishes->count() }})</span></h3>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <a href="#" class="greenBtn" style="color: #fff !important">ADD ALL TO CART</a>
                            </div>
                        </div>
                        <hr />
                        {{-- <div class="row justify-content-between mt-5">
            <div class="col-md-3 col-sm-6">
              <p>Showing Results</p>
            </div>
            <div class="col-md-3 col-sm-6">
              <form>
                 <div class="form-group">
                      <select class="form-control" id="exampleInputSelect1">
                        <option value="option1">Default Sorting</option>
                        <option value="option2">Option 2</option>
                        <option value="option3">Option 3</option>
                      </select>
                      <i class="bi bi-chevron-down"></i>
                    </div> 
              </form>
            </div>
          </div> --}}
                    </div>
                </div>
                <div class="text-center text-danger mt-5">
                    @if ($wishes->count() == 0)
                        <p><b>You haven't saved any items to your wishlist yet. Start shopping and add your favorite items
                                to your wishlist.</b></p>
                    @endif
                </div>

                @foreach ($wishes as $wish)
                    <!-- nme -->
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-3">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                                <a href="{{ route('view-item', $wish->product->product_id) }}">
                                    <img src="{{ asset('storage/images/' . $wish->product->feature_image) }}"
                                        class="img-fluid" alt="" />
                                </a>
                                <div class="wishlist">
                                  <button
                                  class="wish-list-button {{ Auth::check() && $wish->product->wishList->where('user_id', Auth::user()->id)->count() != 0 ? 'active' : '' }}"
                                  data-id="{{ $wish->product->product_id }}">
                                  <i class="bi bi-heart"></i>
                                  <i class="bi bi-heart-fill"></i>
                              </button>
                                </div>
                            </div>
                            <a href="{{ route('view-item', $wish->product->product_id) }}">
                                <div class="member-info" style="background-color:#000 !important;">
                                    <h4 class="text-white">{{ $wish->product->title }}</h4>
                                    <span>{{ $wish->product->variant->count() > 1 ? Config::get('app.currency_code') . $wish->product->variant->min('sales_price') . ' - ' . Config::get('app.currency_code') . $wish->product->variant->max('sales_price') : Config::get('app.currency_code') . ' ' . $wish->product->variant->min('sales_price') }}</span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach




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
                    @foreach ($suggestions as $suggestion)
                    <div class="swiper-slide col-lg-3">
                        <div class="card">
                            <div class="card-img">
                                <div class="wishlist">
                                    <button class="wish-list-button" data-id="{{ $suggestion->product_id }}">
                                        {!! Auth::check() && $suggestion->wishList->where('user_id',
                                        Auth::user()->id)->count() != 0 ? '<i class="bi bi-heart-fill"></i>' : '<i
                                            class="bi bi-heart"></i>' !!}
                                    </button>
                                </div>
                                <a href="{{ route('view-item', $suggestion->product_id) }}">
                                    <img src="{{ asset('storage/images/' . $suggestion->feature_image) }}" alt=""
                                        class="img-fluid" />
                                </a>

                            </div>
                            <div class="content">
                                <a href="{{ route('view-item', $suggestion->product_id) }}">
                                    <p>{{ $suggestion->title }}</p>
                                    <p>
                                        <span>{{ $suggestion->variant->count() > 1 ? Config::get('app.currency_code') .
                                            $suggestion->variant->min('sales_price') . ' - ' .
                                            Config::get('app.currency_code') . $suggestion->variant->max('sales_price') :
                                            Config::get('app.currency_code') . $suggestion->variant->min('sales_price')
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
@endsection

@push('scripts')
    <script>
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
