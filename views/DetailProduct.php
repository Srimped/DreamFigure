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
                                    <li class="breadcrumb-item"><a href="<?= BASE_URL . '?act=Shop' ?>">shop</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">product details</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- page main wrapper start -->
        <div class="shop-main-wrapper section-padding pb-0">
            <div class="container">
                <div class="row">
                    <!-- product details wrapper start -->
                    <div class="col-lg-12 order-1 order-lg-2">
                        <!-- product details inner end -->
                        <div class="product-details-inner">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="product-large-slider">
                                        <?php foreach ($listImage as $key => $img): ?>
                                            <div class="pro-large-img img-zoom">
                                                <img src="<?= BASE_URL . $img['link_hinh_anh'] ?>" alt="product-details" />
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                    <div class="pro-nav slick-row-10 slick-arrow-style">
                                        <?php foreach ($listImage as $key => $img): ?>
                                            <div class="pro-nav-thumb">
                                                <img src="<?= BASE_URL . $img['link_hinh_anh'] ?>" alt="product-details" />
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="product-details-des">
                                        <div class="manufacturer-name">
                                            <a href="product-details.html"><?= $product['ten_danh_muc'] ?></a>
                                        </div>
                                        <h3 class="product-name"><?= $product['ten_san_pham'] ?></h3>
                                        <div class="ratings d-flex">
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <div class="pro-review">
                                                <span><?= $product['luot_xem'] ?> Views</span>
                                            </div>
                                        </div>
                                        <span><?= $countComment = count($commentList) ?> Comments</span>
                                        <div class="price-box">
                                            <span class="price-regular"><?= PriceFormat($product['gia_san_pham']) . ' đ' ?></span>
                                        </div>
                                        <div class="availability">
                                            <?php if ($product['so_luong'] > 0) { ?>
                                                <i class="fa fa-check-circle"></i>
                                                <span><?= $product['so_luong'] ?> in stock</span>
                                            <?php } else { ?>
                                                <i class="fa fa-times-circle" style="color:red"></i>
                                                <span>Out of stock</span>
                                            <?php } ?>
                                        </div>
                                        <p class="pro-desc">
                                            <?= $product['mo_ta'] ?>
                                        </p>
                                        <form action="<?= BASE_URL . '?act=Add-Cart' ?>" method="POST">
                                            <?php if ($product['so_luong'] > 0): ?>
                                                <div class="quantity-cart-box d-flex align-items-center">
                                                    <h6 class="option-title">qty:</h6>
                                                    <div class="quantity">
                                                        <input type="hidden" name="san_pham_id" value="<?= $product['id'] ?>">
                                                        <div class="pro-qty"><input type="text" value="1" name="so_luong"></div>
                                                    </div>
                                                    <div class="action_link">
                                                        <button type="submit" class="btn btn-cart2" href="#">Add to cart</button>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details inner end -->

                        <!-- product details reviews start -->
                        <div class="product-details-reviews section-padding pb-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="product-review-info">
                                        <ul class="nav review-tab">
                                            <li>
                                                <a class="active" data-bs-toggle="tab" href="#tab_one">Comment (<?= $countComment ?>)</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content reviews-tab">
                                            <div class="tab-pane fade show active" id="tab_one">
                                                <?php foreach ($commentList as $key => $comment): ?>
                                                    <div class="total-reviews">
                                                        <div class="rev-avatar">
                                                            <img src="<?= BASE_URL . $comment['anh_dai_dien'] ?>" alt=""
                                                                onerror="this.onerror=null; this.src='https://www.pngplay.com/wp-content/uploads/12/Anime-Girl-Pfp-PNG-HD-Quality.png'">
                                                        </div>
                                                        <div class="review-box">
                                                            <div class="ratings">
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span><i class="fa fa-star"></i></span>
                                                            </div>
                                                            <div class="post-author">
                                                                <p><span><?= $comment['ho_ten'] ?></span> - <?= FormatDate($comment['ngay_dang']) ?></p>
                                                            </div>
                                                            <p>Aliquam fringilla euismod risus ac bibendum. Sed sit
                                                                amet sem varius ante feugiat lacinia. Nunc ipsum nulla,
                                                                vulputate ut venenatis vitae, malesuada ut mi. Quisque
                                                                iaculis, dui congue placerat pretium, augue erat
                                                                accumsan lacus</p>
                                                        </div>
                                                    </div>
                                                <?php endforeach ?>
                                                <form action="#" class="review-form">
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span class="text-danger">*</span>
                                                                Your Comment</label>
                                                            <textarea class="form-control" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="buttons">
                                                        <button class="btn btn-sqr" type="submit">Post</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="tab_three">
                                                <!-- end of review-form -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details reviews end -->
                    </div>
                    <!-- product details wrapper end -->
                </div>
            </div>
        </div>
        <!-- page main wrapper end -->

        <!-- related products area start -->
        <section class="related-products section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">Related Products</h2>
                            <p class="sub-title">Add related products to weekly lineup</p>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                            <!-- product item start -->
                            <?php foreach ($sameCategoryProductList as $key => $product): ?>
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
                            <!-- product item end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- related products area end -->
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