<!-- Start Header Area -->
<header class="header-area header-wide">
    <!-- main header start -->
    <div class="main-header d-none d-lg-block">
        <!-- header top start -->
        <!-- header top end -->

        <!-- header middle area start -->
        <div class="header-main-area sticky">
            <div class="container">
                <div class="row align-items-center position-relative">

                    <!-- start logo area -->
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="<?= BASE_URL ?>">
                                <img width="120px" src="./assets/img/logo/logo1.png" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- start logo area -->

                    <!-- main menu area start -->
                    <div class="col-lg-6 position-static">
                        <div class="main-menu-area">
                            <div class="main-menu">
                                <!-- main menu navbar start -->
                                <nav class="desktop-menu">
                                    <ul>
                                        <li><a href="<?= BASE_URL ?>">Home</a>
                                        </li>
                                        <li><a href="<?= BASE_URL . '?act=Shop' ?>">Figure <i class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown">
                                                <?php
                                                $categories = getCategories();
                                                foreach ($categories as $key => $category): ?>
                                                    <li><a href="<?= BASE_URL . '?act=Shop&Category-Id=' . $category['id'] ?>"><?= $category['ten_danh_muc'] ?></a></li>
                                                <?php endforeach ?>
                                            </ul>
                                        </li>

                                        <li><a href="<?= BASE_URL . '?act=Contact'?>">Contact us</a></li>
                                    </ul>
                                </nav>
                                <!-- main menu navbar end -->
                            </div>
                        </div>
                    </div>
                    <!-- main menu area end -->

                    <!-- mini cart area start -->
                    <div class="col-lg-4">
                        <div class="header-right d-flex align-items-center justify-content-xl-between justify-content-lg-end">
                            <div class="header-search-container">
                                <button class="search-trigger d-xl-none d-lg-block"><i class="pe-7s-search"></i></button>
                                <form class="header-search-box d-lg-none d-xl-block" method="POST" action="<?= BASE_URL ?>?act=Search">
                                    <input type="text" placeholder="Search for figure" class="header-search-field" name="keyword"
                                        value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>">
                                    <button class="header-search-btn"><i class="pe-7s-search"></i></button>
                                </form>
                            </div>
                            <div class="header-configure-area">
                                <ul class="nav justify-content-end">
                                    <li class="user-hover">
                                        <a class="fs-5">
                                            <?php if (isset($_SESSION['user_client'])) { ?>
                                                <?= $_SESSION['user_client']; ?>
                                            <?php } ?><i class="pe-7s-user"></i>
                                        </a>
                                        <ul class="dropdown-list">
                                            <?php if (isset($_SESSION['user_client'])) { ?>
                                                <li><a href="<?= BASE_URL . '?act=Profile' ?>">My account</a></li>
                                                <li><a href="<?= BASE_URL . '?act=Order-History' ?>">Order history</a></li>
                                                <li><a href="<?= BASE_URL . '?act=Logout' ?>">Logout</a></li>
                                            <?php } else { ?>
                                                <li><a href="<?= BASE_URL . '?act=Login' ?>">login</a></li>
                                                <li><a href="<?= BASE_URL . '?act=Register' ?>">register</a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="<?= BASE_URL . '?act=Cart' ?>">
                                            <i class="pe-7s-shopbag"></i>
                                            <!-- <div class="notification">2</div> -->
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- mini cart area end -->

                </div>
            </div>
        </div>
        <!-- header middle area end -->
    </div>
    <!-- main header start -->

    <!-- mobile header start -->
    <!-- mobile header start -->
    <!-- off-canvas menu end -->
    <!-- offcanvas mobile menu end -->
</header>