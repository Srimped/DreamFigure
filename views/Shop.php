<?php require_once 'Layout/Header.php' ?>

<body>
    <?php require_once 'Layout/Navbar.php' ?>
    <!-- end Header Area -->


    <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">shop</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- page main wrapper start -->
        <div class="shop-main-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <!-- sidebar area start -->
                    <div class="col-lg-3 order-2 order-lg-1">
                        <aside class="sidebar-wrapper">
                            <!-- single sidebar start -->
                            <div class="sidebar-single">
                                <h5 class="sidebar-title">categories</h5>
                                <div class="sidebar-body">
                                    <ul class="shop-categories">
                                        <?php foreach ($categoryList as $key => $category): ?>
                                            <li><a href="<?= BASE_URL . '?act=Shop&Category-Id=' . $category['id'] ?>"><?= $category['ten_danh_muc'] ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                            <!-- single sidebar end -->

                            <!-- single sidebar start -->
                            <div class="sidebar-banner">
                                <div class="img-container">
                                    <a href="#">
                                        <img src="https://shumistore.com/cdn/shop/files/053124_Hiakyuu_Mobilepng.png?v=1717207665&width=1000" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- single sidebar end -->
                        </aside>
                    </div>
                    <!-- sidebar area end -->

                    <!-- shop main wrapper start -->
                    <div class="col-lg-9 order-1 order-lg-2">
                        <div class="shop-product-wrapper">
                            <!-- shop product top wrap start -->
                            <div class="shop-top-bar">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-md-6 order-2 order-md-1">
                                        <div class="top-bar-left">
                                            <div class="product-view-mode">
                                                <a class="active" href="#" data-target="grid-view" data-bs-toggle="tooltip" title="Grid View"><i class="fa fa-th"></i></a>
                                                <a href="#" data-target="list-view" data-bs-toggle="tooltip" title="List View"><i class="fa fa-list"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- shop product top wrap start -->

                            <!-- product item list wrapper start -->
                            <div class="shop-product-wrap grid-view row mbn-30">
                                <!-- product single item start -->
                                <?php foreach ($productList as $key => $product): ?>
                                    <div class="col-md-4 col-sm-6">
                                        <!-- product grid start -->
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
                                        <!-- product grid end -->

                                        <!-- product list item end -->
                                        <div class="product-list-item">
                                            <figure class="product-thumb">
                                                <a href="<?= BASE_URL . '?act=Detail-Product&Product-id=' . $product['id'] ?>">
                                                    <img class="pri-img" src="<?= BASE_URL . $product['link_hinh_anh'] ?>" alt="product">
                                                    <img class="sec-img" src="<?= BASE_URL . $product['link_hinh_anh'] ?>" alt="product">
                                                </a>
                                                <div class="cart-hover">
                                                    <a href="<?= BASE_URL . '?act=Detail-Product&Product-id=' . $product['id'] ?>">
                                                        <button class="btn btn-cart">See more</button>
                                                    </a>
                                                </div>
                                            </figure>
                                            <div class="product-content-list">
                                                <div class="manufacturer-name">
                                                    <a href="<?= BASE_URL . '?act=Shop&Category-Id=' . $product['danh_muc_id'] ?>"><?= $product['ten_danh_muc'] ?></a>
                                                </div>
                                                <h5 class="product-name"><a href="product-details.html"><?= $product['ten_san_pham'] ?></a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular"><?= PriceFormat($product['gia_san_pham']) ?> đ</span>
                                                </div>
                                                <p>
                                                    <?= $product['mo_ta'] ?>
                                                </p>
                                            </div>
                                        </div>
                                        <!-- product list item end -->
                                    </div>
                                    <!-- product single item start -->
                                <?php endforeach ?>
                                <!-- product single item start -->
                            </div>
                            <!-- product single item start -->

                        </div>
                        <!-- product item list wrapper end -->

                        <!-- start pagination area -->

                        <!-- end pagination area -->
                    </div>
                </div>
                <!-- shop main wrapper end -->
            </div>
        </div>
        </div>
        <!-- page main wrapper end -->
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