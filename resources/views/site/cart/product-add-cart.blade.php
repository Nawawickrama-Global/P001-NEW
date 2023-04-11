@extends('site.layout.main-2')
@section('content')
<!-- ======= product Section ======= -->
<section class="product-single">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div id="productCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets/img/products/product-5.png" class="d-block w-100" alt="Image 1" />
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/products/product-6.png" class="d-block w-100" alt="Image 2" />
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/products/product-7.png" class="d-block w-100" alt="Image 3" />
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/products/product-8.png" class="d-block w-100" alt="Image 3" />
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#productCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next" href="#productCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
            <div class="col-lg-1">
                <div id="thumbnailCarousel">
                    <div class="overflow-auto thumbnailClass">
                        <div class="thumbnail" data-target="#productCarousel" data-slide-to="0">
                            <img src="assets/img/products/product-5.png" class="d-block w-100" />
                        </div>

                        <div class="thumbnail" data-target="#productCarousel" data-slide-to="1">
                            <img src="assets/img/products/product-6.png" class="d-block w-100" />
                        </div>

                        <div class="thumbnail" data-target="#productCarousel" data-slide-to="2">
                            <img src="assets/img/products/product-7.png" class="d-block w-100" />
                        </div>

                        <div class="thumbnail" data-target="#productCarousel" data-slide-to="3">
                            <img src="assets/img/products/product-8.png" class="d-block w-100" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="_product-detail-content">
                    <a href="#">Aura / </a>
                    <a href="#">Door Hardware / </a>
                    <a href="#">Door levers / </a>
                    <a><span>Liberty Door Lever</span></a>

                    <br />
                    <h3>Liberty Door Lever</h3>
                    <div class="_p-price-box">
                        <div class="p-list mb-4 pb-2">
                            <strong>
                                <span> Price: </span>
                                <span class="price"> $699 </span>
                            </strong>
                        </div>

                        <div class="_p-features">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                            do eiusmod tempor incididunt ut labore et dolore magna
                            aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit, sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua.Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua.
                        </div>

                        <div class="color bb pb-3 mt-5">
                            <p><strong>Finishes : </strong> Aged brass</p>
                            <div class="row">
                                <div class="col-lg-2 mt-2">
                                    <button>
                                        <img src="assets/img/products/color-1.png" alt="Color" class="img-fluid" />
                                    </button>
                                </div>

                                <div class="col-lg-2 mt-2">
                                    <button>
                                        <img src="assets/img/products/color-2.png" alt="Color" class="img-fluid" />
                                    </button>
                                </div>

                                <div class="col-lg-2 mt-2">
                                    <button>
                                        <img src="assets/img/products/color-3.png" alt="Color" class="img-fluid" />
                                    </button>
                                </div>

                                <div class="col-lg-2 mt-2">
                                    <button>
                                        <img src="assets/img/products/color-5.png" alt="Color" class="img-fluid" />
                                    </button>
                                </div>

                                <div class="col-lg-2 mt-2">
                                    <button>
                                        <img src="assets/img/products/color-7.png" alt="Color" class="img-fluid" />
                                    </button>
                                </div>

                                <div class="col-lg-2 mt-2">
                                    <button>
                                        <img src="assets/img/products/color-8.png" alt="Color" class="img-fluid" />
                                    </button>
                                </div>

                                <div class="col-lg-2 mt-2">
                                    <button>
                                        <img src="assets/img/products/color-2.png" alt="Color" class="img-fluid" />
                                    </button>
                                </div>

                                <div class="col-lg-2 mt-2">
                                    <button>
                                        <img src="assets/img/products/color-3.png" alt="Color" class="img-fluid" />
                                    </button>
                                </div>

                                <div class="col-lg-2 mt-2">
                                    <button>
                                        <img src="assets/img/products/color-4.png" alt="Color" class="img-fluid" />
                                    </button>
                                </div>

                                <div class="col-lg-2 mt-2">
                                    <button>
                                        <img src="assets/img/products/color-5.png" alt="Color" class="img-fluid" />
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="_p-qty-and-cart mt-4 d-flex">
                            <div class="_p-add-cart">
                                <div class="_p-qty">
                                    <span>Qty:</span>

                                    <input type="number" name="qty" id="number" value="1" />
                                </div>
                            </div>
                            <button class="btn btn-buy" tabindex="0">
                                <i class="fa fa-shopping-cart"></i> Buy Now
                            </button>
                            <button class="btn btn-cart" type="button" data-bs-toggle="modal"
                                data-bs-target="#addToCart" tabindex="0">
                                <i class="fa fa-shopping-cart"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product Hero -->

<main id="main">
    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
        <div class="container" data-aos="fade-up">
            <!-- Feature Tabs -->
            <div class="row feture-tabs justify-content-center" data-aos="fade-up">
                <div class="col-lg-9">
                    <!-- Tabs -->
                    <ul class="nav nav-pills mb-3">
                        <li>
                            <a class="nav-link active" data-bs-toggle="pill" href="#tab1">Specifications</a>
                        </li>
                        <li>
                            <a class="nav-link" data-bs-toggle="pill" href="#tab2">Product Sheet</a>
                        </li>
                        <li>
                            <a class="nav-link" data-bs-toggle="pill" href="#tab3">Enquire / Customize</a>
                        </li>
                    </ul>
                    <!-- End Tabs -->

                    <!-- Tab Content -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab1">
                            <ul>
                                <li>MATERIAL:</li>
                                <li>Brass FINISHES:</li>
                                <li>
                                    Gold Plated ( Also available in Aged & Brushed Brass)
                                </li>
                                <li>DIMENSIONS: Height: 50 mm | 1,97 in</li>
                                <li>Length: 150 mm | 59,06 in</li>
                                <li>Depth: 60 mm | 23,62 in</li>
                                <li>WEIGHT: 392 g / 0,86 Lbs</li>
                            </ul>
                        </div>
                        <!-- End Tab 1 Content -->

                        <div class="tab-pane fade show" id="tab2">
                            <p>
                                Consequuntur inventore voluptates consequatur aut vel et.
                                Eos doloribus expedita. Sapiente atque consequatur minima
                                nihil quae aspernatur quo suscipit voluptatem.
                            </p>
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-check2"></i>
                                <h4>
                                    Repudiandae rerum velit modi et officia quasi facilis
                                </h4>
                            </div>
                            <p>
                                Laborum omnis voluptates voluptas qui sit aliquam
                                blanditiis. Sapiente minima commodi dolorum non eveniet
                                magni quaerat nemo et.
                            </p>
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-check2"></i>
                                <h4>Incidunt non veritatis illum ea ut nisi</h4>
                            </div>
                            <p>
                                Non quod totam minus repellendus autem sint velit. Rerum
                                debitis facere soluta tenetur. Iure molestiae assumenda sunt
                                qui inventore eligendi voluptates nisi at. Dolorem quo
                                tempora. Quia et perferendis.
                            </p>
                        </div>
                        <!-- End Tab 2 Content -->

                        <div class="tab-pane fade show" id="tab3">
                            <p>
                                Consequuntur inventore voluptates consequatur aut vel et.
                                Eos doloribus expedita. Sapiente atque consequatur minima
                                nihil quae aspernatur quo suscipit voluptatem.
                            </p>
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-check2"></i>
                                <h4>
                                    Repudiandae rerum velit modi et officia quasi facilis
                                </h4>
                            </div>
                            <p>
                                Laborum omnis voluptates voluptas qui sit aliquam
                                blanditiis. Sapiente minima commodi dolorum non eveniet
                                magni quaerat nemo et.
                            </p>
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-check2"></i>
                                <h4>Incidunt non veritatis illum ea ut nisi</h4>
                            </div>
                            <p>
                                Non quod totam minus repellendus autem sint velit. Rerum
                                debitis facere soluta tenetur. Iure molestiae assumenda sunt
                                qui inventore eligendi voluptates nisi at. Dolorem quo
                                tempora. Quia et perferendis.
                            </p>
                        </div>
                        <!-- End Tab 3 Content -->
                    </div>
                </div>
            </div>
            <!-- End Feature Tabs -->
        </div>
    </section>
    <!-- End Features Section -->

    <!-- ======= Recoment products Section ======= -->
    <section class="popular pt-5">
        <div class="container" data-aos="fade-up">
            <dv class="row justify-content-center">
                <div class="col-md-9">
                    <header class="text-center mb-3">
                        <h3 class="mb-0">YOU MAY ALSO LIKE...</h3>
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
    </section>
    <!-- End  Section -->

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
    </section>
    <!-- End popuar Section -->

    <!-- ======= Add to cart popap ======= -->
    <div class="modal fade" id="addToCart" tabindex="-1" aria-labelledby="addtocart1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>SUCCESSFULLY ADDED TO CART!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="row">
                    <div class="col-lg-7 text-center left-content mb-2">
                        <img src="assets/img/products/product-1.png" alt="Product Image" class="img-fluid mb-2" />
                        <h3>NEEDLE TABLE LAMP</h3>
                        <p>
                            METALS: BLACK NICKEL PLATED WOOD: EBONY GEOMETRIC MOSAIC
                            FABRIC VELVET: Ambar
                        </p>
                    </div>
                    <div class="col-lg-5 right-content">
                        <p>Your cart:</p>
                        <p><span id="countItems">1</span> Item</p>
                        <p class="price-table">
                            <span>Total product cost</span>
                            <span id="productsPrice">$2599</span>
                        </p>
                        <p class="price-table">
                            <span>Total delivery cost</span>
                            <span id="deliveryCost">Free</span>
                        </p>
                        <hr />
                        <p class="price-table">
                            <span><b>Total</b></span>
                            <span id="subTotal"><b>$2599</b></span>
                        </p>
                        <div class="btn green mb-1">
                            <a href="#">VIEW YOUR CART</a>
                        </div>
                        <div class="btn primary">
                            <a href="#">QUICK CHECKOUT <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Add to cart popap Section -->
</main>
<!-- End #main -->

@endsection