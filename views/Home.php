<?php require_once 'Layout/Header.php' ?>

<body>
    <?php require_once 'Layout/Navbar.php' ?>
    <!-- end Header Area -->


    <main>
        <!-- hero slider area start -->
        <div class="hero-single-slide hero-overlay" style="max-width: 1400px; margin: 0 auto;">
            <section class="slider-area">
                <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
                    <!-- single slider item start -->
                    <div class="hero-single-slide hero-overlay">
                        <div class="hero-slider-item bg-img" data-bg="./assets/img/slider/slider2.png">
                        </div>
                    </div>
                    <!-- single slider item start -->

                    <!-- single slider item start -->
                    <div class="hero-single-slide hero-overlay">
                        <div class="hero-slider-item bg-img" data-bg="./assets/img/slider/slider3.png">
                        </div>
                    </div>
                    <!-- single slider item start -->

                    <!-- single slider item start -->
                    <div class="hero-single-slide hero-overlay">
                        <div class="hero-slider-item bg-img" data-bg="./assets/img/slider/slider1.png">
                        </div>
                    </div>
                    <!-- single slider item end -->
                </div>
            </section>
            <!-- hero slider area end -->

            <!-- service policy area start -->
            <div class="service-policy section-padding">
                <div class="container">
                    <div class="row mtn-30">
                        <div class="col-sm-6 col-lg-3">
                            <div class="policy-item">
                                <div class="policy-icon">
                                    <i class="pe-7s-plane"></i>
                                </div>
                                <div class="policy-content">
                                    <h6>Free Shipping</h6>
                                    <p>Free shipping all order</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="policy-item">
                                <div class="policy-icon">
                                    <i class="pe-7s-help2"></i>
                                </div>
                                <div class="policy-content">
                                    <h6>Support 24/7</h6>
                                    <p>Support 24 hours a day</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="policy-item">
                                <div class="policy-icon">
                                    <i class="pe-7s-back"></i>
                                </div>
                                <div class="policy-content">
                                    <h6>Money Return</h6>
                                    <p>30 days for free return</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="policy-item">
                                <div class="policy-icon">
                                    <i class="pe-7s-credit"></i>
                                </div>
                                <div class="policy-content">
                                    <h6>100% Payment Secure</h6>
                                    <p>We ensure secure payment</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- service policy area end -->

            <!-- banner statistics area start -->
            <div class="banner-statistics-area">
                <div class="container">
                    <div class="row row-20 mtn-20">
                        <div class="col-sm-6">
                            <figure class="banner-statistics mt-20">
                                <a href="#">
                                    <img src="./assets/img/slider/slider1.png" alt="product banner">
                                </a>
                            </figure>
                        </div>
                        <div class="col-sm-6">
                            <figure class="banner-statistics mt-20">
                                <a href="#">
                                    <img src="./assets/img/slider/slider2.png" alt="product banner">
                                </a>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <!-- banner statistics area end -->

            <!-- product area start -->
            <section class="product-area section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!-- section title start -->
                            <div class="section-title text-center">
                                <h2 class="title">our products</h2>
                                <p class="sub-title">Add our products to weekly lineup</p>
                            </div>
                            <!-- section title start -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="product-container">
                                <!-- product tab menu start -->
                                <!-- product tab menu end -->

                                <!-- product tab content start -->
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tab1">
                                        <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                            <!-- product item start -->
                                            <?php foreach ($productList as $key => $product): ?>
                                                <div class="product-item">
                                                    <figure class="product-thumb">
                                                        <a href="<?= BASE_URL . '?act=Detail-Product&Product-id=' . $product['id'] ?>">
                                                            <img class="pri-img" src="<?= BASE_URL . $product['link_hinh_anh'] ?>" alt="product">
                                                            <img class="sec-img" src="<?= BASE_URL . $product['link_hinh_anh'] ?>" alt="product">
                                                        </a>
                                                        <div class="product-badge">

                                                        </div>
                                                        <div class="cart-hover">
                                                            <a href="<?= BASE_URL . '?act=Detail-Product&Product-id=' . $product['id'] ?>">
                                                                <button class="btn btn-cart">See more</button>
                                                            </a>
                                                        </div>
                                                    </figure>
                                                    <div class="product-caption text-center">

                                                        <h6 class="product-name">
                                                            <a href="<?= BASE_URL . '?act=Detail-Product&Product-id=' . $product['id'] ?>"><?= $product['ten_san_pham'] ?></a>
                                                        </h6>
                                                        <div class="price-box">
                                                            <span class="price-regular"><?= PriceFormat($product['gia_san_pham']) . ' đ' ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- product tab content end -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- product area end -->

            <!-- product banner statistics area start -->
            <section class="product-banner-statistics">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="product-banner-carousel slick-row-10">
                                <!-- banner single slide start -->
                                <?php foreach ($categoryList as $key => $category): ?>
                                    <div class="banner-slide-item">
                                        <figure class="banner-statistics">
                                            <a href="#">
                                                <img style="width:  500px;
                                                        height: 700px;
                                                        object-fit: cover;
                                                        "
                                                    onerror="this.onerror=null; this.src='https://otakuowlet.com/cdn/shop/files/Hatsune_Miku_Figure_-_Fashion_Country_Ver.jpg?v=1734760391&width=1445'"
                                                    src="./assets/img/banner/cate<?= $key + 1 ?>.png" alt="product banner">
                                            </a>
                                            <div class="banner-content banner-content_style2">
                                                <h5 class="banner-text3"><a href="#"><?= $category['ten_danh_muc'] ?></a></h5>
                                            </div>
                                        </figure>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- product banner statistics area end -->

            <!-- featured product area start -->
            <section class="feature-product section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!-- section title start -->
                            <div class="section-title text-center">
                                <h2 class="title">Nendoroid Series</h2>
                                <p class="sub-title">Add nendoroid figure to weekly lineup</p>
                            </div>
                            <!-- section title start -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="product-carousel-4_2 slick-row-10 slick-arrow-style">
                                <!-- product item start -->
                                <?php foreach ($productList as $key => $product): ?>
                                    <?php if ($product['danh_muc_id'] == 2) { ?>
                                        <div class="product-item">
                                            <div class="product-item">
                                                <figure class="product-thumb">
                                                    <a href="<?= BASE_URL . '?act=Detail-Product&Product-id=' . $product['id'] ?>">
                                                        <img class="pri-img" src="<?= BASE_URL . $product['link_hinh_anh'] ?>" alt="product">
                                                        <img class="sec-img" src="<?= BASE_URL . $product['link_hinh_anh'] ?>" alt="product">
                                                    </a>
                                                    <div class="product-badge">

                                                    </div>
                                                    <div class="cart-hover">
                                                        <button class="btn btn-cart">See more</button>
                                                    </div>
                                                </figure>
                                                <div class="product-caption text-center">

                                                    <h6 class="product-name">
                                                        <a href="<?= BASE_URL . '?act=Detail-Product&Product-id=' . $product['id'] ?>"><?= $product['ten_san_pham'] ?></a>
                                                    </h6>
                                                    <div class="price-box">
                                                        <span class="price-regular"><?= PriceFormat($product['gia_san_pham']) . ' đ' ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php endforeach ?>

                                <!-- product item end -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- featured product area end -->

            <!-- brand logo area start -->
            <div class="brand-logo section-padding pt-0">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="brand-logo-carousel slick-row-10 slick-arrow-style">
                                <!-- single brand start -->
                                <div class="brand-item">
                                    <a href="#">
                                        <img src="./assets/img/brand/1.png" alt="">
                                    </a>
                                </div>
                                <!-- single brand end -->

                                <!-- single brand start -->
                                <div class="brand-item">
                                    <a href="#">
                                        <img src="./assets/img/brand/2.png" alt="">
                                    </a>
                                </div>
                                <!-- single brand end -->

                                <!-- single brand start -->
                                <div class="brand-item">
                                    <a href="#">
                                        <img src="./assets/img/brand/3.png" alt="">
                                    </a>
                                </div>
                                <!-- single brand end -->

                                <!-- single brand start -->
                                <div class="brand-item">
                                    <a href="#">
                                        <img src="./assets/img/brand/4.png" alt="">
                                    </a>
                                </div>
                                <!-- single brand end -->

                                <!-- single brand start -->
                                <div class="brand-item">
                                    <a href="#">
                                        <img src="./assets/img/brand/5.png" alt="">
                                    </a>
                                </div>
                                <!-- single brand end -->

                                <!-- single brand start -->
                                <div class="brand-item">
                                    <a href="#">
                                        <img src="./assets/img/brand/6.png" alt="">
                                    </a>
                                </div>
                                <!-- single brand end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- brand logo area end -->
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    <!-- footer area start -->
    <?php require_once 'Layout/Footer.php' ?>
</body>


<!-- Mirrored from htmldemo.net/corano/corano/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:53:43 GMT -->

</html>