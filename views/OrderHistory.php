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
                                    <li class="breadcrumb-item active" aria-current="page">Order history</li>
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
                                            <th class="pro">No.</th>
                                            <th class="pro">Order code</th>
                                            <th class="pro">Date</th>
                                            <th class="pro">Totals</th>
                                            <th class="pro">Payment method</th>
                                            <th class="pro">Status</th>
                                            <th class="pro">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($orderList as $key => $order): ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><strong><?= $order['ma_don_hang'] ?></strong></td>
                                                <td><?= $order['ngay_dat'] ?></td>
                                                <td><?= PriceFormat($order['tong_tien']) ?> đ</td>
                                                <td><?= $payment[$order['phuong_thuc_thanh_toan_id']] ?></td>
                                                <td><?= $status[$order['trang_thai_id']] ?></td>
                                                <td>
                                                    <?php if ($order['trang_thai_id'] == 1): { ?>
                                                            <a href="<?= BASE_URL . '?act=Order-Cancel&Order-id=' . $order['id'] ?>"
                                                            onclick="return confirm('Do you want to delete this order')">
                                                                Cancel
                                                            </a>
                                                    <?php }
                                                    endif ?>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Cart Update Option -->
                        </div>
                    </div>
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