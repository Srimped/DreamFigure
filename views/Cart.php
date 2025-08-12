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
                                    <li class="breadcrumb-item active" aria-current="page">Cart</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- cart main wrapper start -->
        <div class="cart-main-wrapper section-padding">
            <div class="container">
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Cart Table Area -->
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="pro-thumbnail">Thumbnail</th>
                                            <th class="pro-title">Product</th>
                                            <th class="pro-price">Price</th>
                                            <th class="pro-quantity">Quantity</th>
                                            <th class="pro-subtotal">Total</th>
                                            <th class="pro-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($detailCart)) : ?>
                                            <?php $totalPrice = 0; ?>
                                            <?php foreach ($detailCart as $key => $item) { ?>
                                                <?php

                                                $soLuong = (int)$item['so_luong'];
                                                $giaSanPham = (float)$item['gia_san_pham'];

                                                $total = $soLuong * $giaSanPham;
                                                $totalPrice += $total;
                                                ?>
                                                <tr>
                                                    <td class="pro-thumbnail">
                                                        <a href="<?= BASE_URL . '?act=Detail-Product&Product-id=' . $item['san_pham_id'] ?>">
                                                            <img class="img-fluid" src="<?= BASE_URL . $item['link_hinh_anh'] ?>" alt="Product" />
                                                        </a>
                                                    </td>
                                                    <td class="pro-title"><a href="#"><?= $item['ten_san_pham'] ?></a></td>
                                                    <td class="pro-price"><span><?= PriceFormat($giaSanPham) ?> đ</span></td>
                                                    <td class="pro-quantity">
                                                        <div class="pro-qty"><input type="text" name="so_luong" value="<?= $soLuong ?>"></div>
                                                    </td>
                                                    <td class="pro-subtotal"><span><?= PriceFormat($total) ?> đ</span></td>
                                                    <td class="pro-remove"><a href="<?= BASE_URL . '?act=Remove-Item&Product-Id=' . $item['san_pham_id'] ?>"><i class="fa fa-trash-o"></i></a></td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td colspan="6" style="text-align: right;">
                                                    <strong>Total: <?= PriceFormat($totalPrice) ?> đ</strong>
                                                </td>
                                            </tr>
                                        <?php else: ?>
                                            <p>Your shopping cart is empty</p>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Cart Update Option -->
                            <div class="cart-update-option d-block d-md-flex justify-content-between">
                                <div class="apply-coupon-wrapper">
                                    <form action="#" method="post" class=" d-block d-md-flex">
                                        <input type="text" placeholder="Enter Your Coupon Code" required />
                                        <button class="btn btn-sqr">Apply Coupon</button>
                                    </form>
                                </div>
                                <div class="cart-update">
                                    <a href="#" class="btn btn-sqr">Update Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if (!empty($detailCart)) : ?>
                        <div class="row">
                            <div class="col-lg-5 ml-auto">
                                <!-- Cart Calculation Area -->
                                <div class="cart-calculator-wrapper">
                                    <div class="cart-calculate-items">
                                        <h6>Cart Totals</h6>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <td>Sub Total</td>
                                                    <td><?= PriceFormat($totalPrice) ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Shipping</td>
                                                    <td>100.000 đ</td>
                                                </tr>
                                                <tr class="total">
                                                    <td>Total</td>
                                                    <td class="total-amount"> <?= PriceFormat($totalPrice + 100000) ?> đ</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <a href="<?= BASE_URL . '?act=CheckOut' ?>" class="btn btn-sqr d-block">Proceed Checkout</a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- cart main wrapper end -->
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