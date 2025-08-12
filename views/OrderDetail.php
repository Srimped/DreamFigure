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
                                    <li class="breadcrumb-item"><a href="<?= BASE_URL . '?act=Order-History' ?>">Order History</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Order Detail</li>
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
                        <div class="col-lg-7">
                            <!-- Cart Table Area -->
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="5">Product information</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <th>Image</th>
                                            <th>Product name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Totals</th>
                                        </tr>
                                        <?php foreach ($cartDetail as $key => $item): ?>
                                            <tr>
                                                <td>
                                                    <a href="<?= BASE_URL . '?act=Detail-Product&Product-id=' . $item['san_pham_id'] ?>">
                                                        <img class="img-fluid" src="<?= BASE_URL . $item['link_hinh_anh'] ?>" alt="Product" width="100px" />
                                                    </a>
                                                </td>
                                                <td><?= $item['ten_san_pham'] ?></td>
                                                <td><?= PriceFormat($item['don_gia']) ?> đ</td>
                                                <td><?= $item['so_luong'] ?></td>
                                                <td><?= PriceFormat($item['thanh_tien']) ?> đ</td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Cart Update Option -->
                        </div>
                        <div class="col-lg-5">
                            <!-- Cart Table Area -->
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="2">
                                                Order Detail
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Order code:</th>
                                            <td><?= $order['ma_don_hang'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Recipient name:</th>
                                            <td><?= $order['ten_nguoi_nhan'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email:</th>
                                            <td><?= $order['email_nguoi_nhan'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Address:</th>
                                            <td><?= $order['dia_chi_nguoi_nhan'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Date:</th>
                                            <td><?= $order['ngay_dat'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Note:</th>
                                            <td><?= $order['ghi_chu'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Totals:</th>
                                            <td><?= $order['tong_tien'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Payment method:</th>
                                            <td><?= $status[$order['phuong_thuc_thanh_toan_id']] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Status:</th>
                                            <td><?= $payment[$order['trang_thai_id']] ?></td>
                                        </tr>
                                        
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