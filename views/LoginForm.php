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
                            <div class="login-reg-form-wrap">
                                <h5 class="text-center">Sign In</h5>
                                <?php if (isset($_SESSION['login_error'])) { ?>
                                    <p class="text-danger text-center"><?= $_SESSION['login_error'] ?></p>
                                    <?php unset($_SESSION['login_error']); ?>
                                <?php } ?>
                                <form action="<?= BASE_URL . '?act=Check-Login' ?>" method="post">
                                    <div class="single-input-item">
                                        <input type="email" name="email" placeholder="Enter your Email" required />
                                        <?php if (isset($_SESSION['error']['email'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
                                        <?php } ?>
                                        <?php unset($_SESSION['error']['email']); ?>
                                    </div>
                                    <div class="single-input-item">
                                        <input type="password" name="mat_khau" placeholder="Enter your Password" required />
                                        <?php if (isset($_SESSION['error']['password'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['error']['password'] ?></p>
                                        <?php } ?>
                                        <?php unset($_SESSION['error']['password']); ?>
                                    </div>
                                    <div class="single-input-item">
                                        <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                            <a href="#" class="forget-pwd">Forget Password?</a>
                                        </div>
                                        <br>
                                        <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                            <a href="<?= BASE_URL . '?act=Register' ?>" class="forget-pwd">Register new user</a>
                                        </div>
                                    </div>
                                    <div class="single-input-item">
                                        <button type="submit" class="btn btn-sqr">Login</button>
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