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
                                    <li class="breadcrumb-item active" aria-current="page">login-Register</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- login register wrapper start -->
        <div class="login-register-wrapper section-padding">
            <div class="container" style="max-width: 30vw;">
                <div class="member-area-from-wrap">
                    <div class="row">
                        <!-- Login Content Start -->
                        <div class="col-lg-12">
                            <div class="login-reg-form-wrap sign-up-form">
                                <h5 class="text-center">Singup Form</h5>
                                <?php if (isset($_SESSION['error']['confirm_password_notify'])) { ?>
                                    <p class="text-danger text-center"><?= $_SESSION['error']['confirm_password_notify'] ?></p>
                                <?php } ?>
                                <form action="<?= BASE_URL . '?act=Sign-Up' ?>" method="POST">
                                    <div class="single-input-item">
                                        <input type="text" placeholder="Full Name" name="ho_ten" required />
                                        <?php if (isset($_SESSION['error']['name'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['error']['name'] ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="single-input-item">
                                        <input type="email" placeholder="Enter your Email" name="email" required />
                                        <?php if (isset($_SESSION['error']['email'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <input type="password" placeholder="Enter your Password" name="mat_khau" required />
                                                <?php if (isset($_SESSION['error']['password'])) { ?>
                                                    <p class="text-danger"><?= $_SESSION['error']['password'] ?></p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <input type="password" placeholder="Repeat your Password" name="nhap_lai_mat_khau" required />
                                                <?php if (isset($_SESSION['error']['confirm_password'])) { ?>
                                                    <p class="text-danger"><?= $_SESSION['error']['confirm_password'] ?></p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-input-item">
                                        <div class="login-reg-form-meta">
                                            <div class="remember-meta">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="subnewsletter">
                                                    <label class="custom-control-label" for="subnewsletter">Subscribe
                                                        Our Newsletter</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-input-item">
                                        <button class="btn btn-sqr">Register</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Login Content End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- login register wrapper end -->
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