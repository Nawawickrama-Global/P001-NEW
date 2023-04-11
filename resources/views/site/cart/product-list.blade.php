@extends('site.layout.main')
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">
                <!-- Slide 1 -->
                <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-4.png)">
                    <div class="carousel-container">
                        <div class="container">
                            <div class="row align-items-end">
                                <div class="col-md-9 text-start">
                                    <h2 class="animate__animated animate__fadeInDown">
                                        Discover all <br />
                                        products
                                    </h2>
                                    <p class="animate__animated animate__fadeInUp">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna
                                        aliqua.
                                    </p>
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
                                        Discover all products
                                    </h2>
                                    <p class="animate__animated animate__fadeInUp">
                                        Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea
                                        ut et est quaerat sequi nihil ut aliquam. Occaecati alias
                                        dolorem mollitia ut. Similique ea voluptatem. Esse
                                        doloremque accusamus repellendus deleniti vel. Minus et
                                        tempore modi architecto.
                                    </p>
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
        <!-- ======= Category Section ======= -->
        <section class="category">
            <div class="container">
                <div class="row">
                    <div class="links">
                        @php
                            $subs = '';
                        @endphp
                        @foreach ($parentCategories as $parentCategory)
                            @php
                                $data = '';
                                $selected = $parentCategories->first()->name;
                                if(app('request')->has('parent_category')){
                                    $selected = app('request')->input('parent_category');
                                }
                                
                            @endphp
                            @foreach ($parentCategory->subcategory as $sub)
                                @php
                                    $data .=
                                        '<div class="swiper-slide">
                                <a href="' .
                                        route('products.index') .
                                        '?category=' .
                                        $sub->name .
                                        '" class="active">' .
                                        $sub->name .
                                        '</a>
                            </div>';
                                   
                                @endphp
                            @endforeach
                            @php
                                 if($selected == $parentCategory->name){
                                    $subs = $data;
                                 }
                            @endphp
                            <a class="cat {{ $selected == $parentCategory->name ? 'active' : '' }}"
                                data-sub="{{ $data }}">{{ $parentCategory->name }}</a>
                        @endforeach
              
                    </div>

                    <!--Category Slider-->
                    <div class="clients-slider swiper mt-5">
                        <div class="swiper-wrapper1 align-items-center sub-cat">
                            {!! $subs !!}
                        </div>
                        <div class="swiper-button-prev">
                            <i class="bi bi-caret-left-fill"></i>
                        </div>
                        <div class="swiper-button-next">
                            <i class="bi bi-caret-right-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Category Section -->

        <!-- ======= product Section ======= -->
        <section id="product" class="product mt-2 pt-0">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-12">
                        <!--Product sort-->
                        <div class="sort mb-1 mb-0">
                            <div class="row justify-content-between">
                                <div class="col-md-3 col-sm-6">
                                    <p>Showing {{ $products->firstItem() }} – {{ $products->lastItem() }} of
                                        {{ $products->total() }} results</p>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <form>
                                        {{-- <div class="form-group">
                                            <select class="form-control" id="exampleInputSelect1">
                                                <option value="option1">Default Sorting</option>
                                                <option value="option2">Option 2</option>
                                                <option value="option3">Option 3</option>
                                            </select>
                                            <i class="bi bi-chevron-down"></i>
                                        </div> --}}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach ($products as $product)
                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-3">
                            <div class="member" data-aos="fade-up" data-aos-delay="100">
                                <div class="member-img">
                                    <a href="{{ route('view-item', $product->product_id) }}">
                                        <img src="{{ asset('storage/images/' . $product->feature_image) }}"
                                            class="img-fluid" alt="" />
                                    </a>
                                    <div class="wishlist">
                                        <button
                                            class="wish-list-button {{ Auth::check() && $product->wishList->where('user_id', Auth::user()->id)->count() != 0 ? 'active' : '' }}"
                                            data-id="{{ $product->product_id }}">
                                            <i class="bi bi-heart"></i>
                                            <i class="bi bi-heart-fill"></i>
                                        </button>
                                    </div>
                                    <div class="social">
                                        <a href="{{ route('view-item', $product->product_id) }}">QUICK VIEW</a>
                                    </div>
                                </div>
                                <div class="member-info">
                                    <h4>{{ $product->title }}</h4>
                                    <span>{{ $product->variant->count() > 1 ? Config::get('app.currency_code') . $product->variant->min('sales_price') . ' - ' . Config::get('app.currency_code') . $product->variant->max('sales_price') : Config::get('app.currency_code') . $product->variant->min('sales_price') }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-lg-12 d-flex justify-content-center mt-4">
                        {{ $products->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>
        </section>
        <!-- End product Section -->
    </main>
@endsection

@push('scripts')
    <script>
        $('.wish-list-button').click(function() {
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
                    if (data.wishlist) {
                        $(this).addClass('active');
                    } else {
                        $(this).removeClass('active');
                    }
                }
            })
        });

        $('.cat').click(function() {
            $('.cat').removeClass('active');
            $('.sub-cat').html($(this).data('sub'));
            $(this).addClass('active');
        });

    </script>
@endpush
