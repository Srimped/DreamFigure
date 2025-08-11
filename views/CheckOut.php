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
                                    <li class="breadcrumb-item"><a href="<?= BASE_URL ?>">shop</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- checkout main wrapper start -->
        <div class="checkout-page-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Checkout Login Coupon Accordion Start -->
                        <div class="checkoutaccordion" id="checkOutAccordion">
                            <div class="card">
                                <h6>Have A Coupon? <span data-bs-toggle="collapse" data-bs-target="#couponaccordion">Click
                                        Here To Enter Your Code</span></h6>
                                <div id="couponaccordion" class="collapse" data-parent="#checkOutAccordion">
                                    <div class="card-body">
                                        <div class="cart-update-option">
                                            <div class="apply-coupon-wrapper">
                                                <form action="#" method="post" class=" d-block d-md-flex">
                                                    <input type="text" placeholder="Enter Your Coupon Code" required />
                                                    <button class="btn btn-sqr">Apply Coupon</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Checkout Login Coupon Accordion End -->
                    </div>
                </div>
                <?php $_SESSION['checkout_token'] = bin2hex(random_bytes(32))?>
                <form action="<?= BASE_URL . '?act=Checkout-Processing' ?>" method="POST">
                    <div class="row">
                        <!-- Checkout Billing Details -->
                        <div class="col-lg-6">
                            <div class="checkout-billing-details-wrap">
                                <h5 class="checkout-title">Billing Details</h5>
                                <div class="billing-form-wrap">
                                    <input type="hidden" name="token" value="<?= $_SESSION['checkout_token'] ?>">
                                    <div class="single-input-item">
                                        <label for="ten_nguoi_nhan" class="required">Recipient name</label>
                                        <input type="text" name="ten_nguoi_nhan" value="<?= $user['ho_ten'] ?>" placeholder="Recipient name" required />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="email_nguoi_nhan" class="required">Email Address</label>
                                        <input type="email_nguoi_nhan" name="email_nguoi_nhan" value="<?= $user['email'] ?>" placeholder="Email Address" required />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="sdt_nguoi_nhan" class="required">Phone number</label>
                                        <input type="text" name="sdt_nguoi_nhan" value="<?= $user['so_dien_thoai'] ?>" placeholder="Phone number" required />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="dia_chi_nguoi_nhan" class="required">Address</label>
                                        <input type="text" name="dia_chi_nguoi_nhan" value="<?= $user['dia_chi'] ?>" placeholder="Address" required />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="ghi_chu">Order note</label>
                                        <textarea type="text" name="ghi_chu" cols="30" rows="3" placeholder="Leave some note."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Order Summary Details -->
                        <div class="col-lg-6">
                            <div class="order-summary-details">
                                <h5 class="checkout-title">Your Order Summary</h5>
                                <div class="order-summary-content">
                                    <!-- Order Summary Table -->
                                    <div class="order-summary-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Products</th>
                                                    <th>Total</th>
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
                                                            <td><a href="<?= BASE_URL . '?act=Detail-Product&Product-id=' . $item['san_pham_id'] ?>"><?= $item['ten_san_pham'] ?> <strong> × <?= $item['so_luong'] ?></strong></a>
                                                            </td>
                                                            <td><?= PriceFormat($total) ?> đ</td>
                                                        </tr>
                                                    <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td>Sub Total</td>
                                                    <td><strong><?= PriceFormat($totalPrice) ?> đ</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Shipping</td>
                                                    <td class="d-flex justify-content-center">
                                                        <strong>100.000 đ</strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Total Amount</td>
                                                    <input type="hidden" name="tong_tien" value="<?= $totalPrice + 100000 ?>">
                                                    <td><strong><?= PriceFormat($totalPrice + 100000) ?> đ</strong></td>
                                                </tr>
                                            </tfoot>
                                        <?php else: ?>
                                            <p>Your shopping cart is empty</p>
                                        <?php endif; ?>
                                        </table>
                                    </div>
                                    <!-- Order Payment Method -->
                                    <div class="order-payment-method">
                                        <div class="single-payment-method show">
                                            <div class="payment-method-name">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="cashon" name="phuong_thuc_thanh_toan_id" value="1" class="custom-control-input" checked />
                                                    <label class="custom-control-label" for="cashon">Cash On Delivery</label>
                                                </div>
                                            </div>
                                            <div class="payment-method-details" data-method="cash">
                                                <p>Pay with cash upon delivery.</p>
                                            </div>
                                        </div>
                                        <div class="single-payment-method">
                                            <div class="payment-method-name">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="directbank" name="phuong_thuc_thanh_toan_id" value="2" class="custom-control-input" />
                                                    <label class="custom-control-label" for="directbank">Direct Bank
                                                        Transfer</label>
                                                </div>
                                            </div>
                                            <div class="payment-method-details" data-method="bank">
                                                <p>Make your payment directly into our bank account. Please use your Order
                                                    ID as the payment reference. Your order will not be shipped until the
                                                    funds have cleared in our account..</p>
                                            </div>
                                        </div>
                                        <div class="single-payment-method">
                                            <div class="payment-method-name">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="checkpayment" name="phuong_thuc_thanh_toan_id" value="3" class="custom-control-input" />
                                                    <label class="custom-control-label" for="checkpayment">Pay with
                                                        Credit Card</label>
                                                </div>
                                            </div>
                                            <div class="payment-method-details" data-method="check">
                                                <p>Please send a check to Store Name, Store Street, Store Town, Store State
                                                    / County, Store Postcode.</p>
                                            </div>
                                        </div>
                                        <div class="single-payment-method">
                                            <div class="payment-method-name">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="paypalpayment" name="phuong_thuc_thanh_toan_id" value="4" class="custom-control-input" />
                                                    <label class="custom-control-label" for="paypalpayment">Paypal <img src="assets/img/paypal-card.jpg" class="img-fluid paypal-card" alt="Paypal" /></label>
                                                </div>
                                            </div>
                                            <div class="payment-method-details" data-method="paypal">
                                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a
                                                    PayPal account.</p>
                                            </div>
                                        </div>
                                        <div class="summary-footer-area">
                                            <div class="custom-control custom-checkbox mb-20">
                                                <input type="checkbox" class="custom-control-input" id="terms" required />
                                                <label class="custom-control-label" for="terms">I have read and agree to
                                                    the website terms and conditions.</label>
                                            </div>
                                            <button type="submit" class="btn btn-sqr">Place Order</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- checkout main wrapper end -->
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