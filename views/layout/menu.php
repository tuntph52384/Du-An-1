<!-- Start Header Area -->
<header class="header-area header-wide">
    <!-- main header start -->
    <div class="main-header d-none d-lg-block">
        <!-- header middle area start -->
        <div class="header-main-area sticky" style="background-color: #333; color: #fff;">
            <div class="container">
                <div class="row align-items-center position-relative">

                    <!-- start logo area -->
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="<?= BASE_URL ?>">
                                <img src="assets/img/logo/logo.png" alt="Logo" style="width: 100px; height: 100px;">
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
                                        <li><a href="<?= BASE_URL ?>" style="color: #f5f5f5; transition: color 0.3s;">Trang chủ</a></li>
                                        <li><a href="<?= BASE_URL . '?act=danh-sach-san-pham' ?>" style="color: #f5f5f5; transition: color 0.3s;">Sản phẩm</a></li>
                                        <li><a href="#" style="color: #f5f5f5; transition: color 0.3s;">Giới thiệu</a></li>
                                        <li><a href="#" style="color: #f5f5f5; transition: color 0.3s;">Liên hệ</a></li>
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
                            <!-- Header Search -->
                            <div class="header-search-container">
                                <button class="search-trigger d-xl-none d-lg-block" style="background-color: transparent; border: none; color: #f5f5f5;"><i class="pe-7s-search"></i></button>
                                <form class="header-search-box d-lg-none d-xl-block">
                                     <input type="text" placeholder="Nhập tên sản phẩm" class="header-search-field">
                                     <button class="header-search-btn"><i class="pe-7s-search"></i></button>
                                 </form>
                            </div>

                            <!-- Header User and Cart -->
                            <div class="header-configure-area">
                                <ul class="nav justify-content-end">
                                    <label for="" style="color: #f5f5f5;">
                                        <?php
                                        if (isset($_SESSION['user_client'])) {
                                          echo $_SESSION['user_client'];  
                                        }
                                        ?>
                                    </label>
                                    <li class="user-hover">
                                        <a href="#" style="color: #f5f5f5;">
                                            <i class="pe-7s-user"></i>
                                        </a>
                                        <ul class="dropdown-list" style="background-color: #333; color: #fff;">
                                            <li><a href="<?= BASE_URL . '?act=form-them-tai-khoan' ?>" style="color: #f5f5f5;">Đăng ký</a></li>
                                            <?php
                                            if (!isset($_SESSION['user_client'])) { ?>
                                                <li><a href="<?= BASE_URL . '?act=login' ?>" style="color: #f5f5f5;">Đăng nhập</a></li>
                                            <?php } else { ?>

                                                <li><a href="<?= BASE_URL . '?act=tai-khoan-ca-nhan' ?>" style="color: #f5f5f5;">Tài khoản cá nhân</a></li>
                                                
                                                <li><a href="<?= BASE_URL . '?act=lich-su-mua-hang' ?>" style="color: #f5f5f5;">Đơn hàng</a></li>
                                                <li><a href="<?= BASE_URL . '?act=logout' ?>"onclick="return confirm('Đăng xuất tài khoản')" style="color: #f5f5f5;">Đăng xuất</a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="<?= BASE_URL . '?act=gio-hang' ?>" class="minicart-btn" style="color: #f5f5f5;">
                                            <i class="pe-7s-cart"></i>
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
</header>
<!-- end Header Area -->
