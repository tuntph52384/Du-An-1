<?php require_once 'views/layout/header.php'; ?>
<?php require_once 'views/layout/menu.php'; ?>



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
                                <li class="breadcrumb-item active" aria-current="page">Đăng Ký</li>
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
        <div class="container" style="max-width: 40vw">
            <div class="member-area-from-wrap">
                <div class="row">
                    <!-- Login Content Start -->
          

                    <div class="col-lg-12">
                        <div class="login-reg-form-wrap">
                            <h5 class="text-center">Đăng Ký</h5>

                            <?php if (isset($_SESSION['error']) && is_array($_SESSION['error'])): ?>
                                <?php foreach ($_SESSION['error'] as $error): ?>
                                    <p class="text-danger login-box-msg text-center"><?= htmlspecialchars($error) ?></p>
                                <?php endforeach; ?>
                                <?php unset($_SESSION['error']); // Xóa session lỗi sau khi hiển thị 
                                ?>
                            <?php else: ?>
                                <p class="login-box-msg text-center">Đăng ký tài khoản</p>
                            <?php endif; ?>

                            <form action="<?= BASE_URL . '?act=them-tai-khoan' ?>" method="POST">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Họ tên</label>
                                        <input type="text" class="form-control" name="ho_ten" placeholder="Nhập họ tên">
                                        <?php if (isset($_SESSION['error']['ho_ten'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['error']['ho_ten'] ?></p>
                                        <?php } ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Nhập email">
                                        <?php if (isset($_SESSION['error']['email'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
                                        <?php } ?>
                                    </div>


                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input type="text" class="form-control" name="so_dien_thoai" placeholder="Nhập số điện thoại">
                                        <?php if (isset($_SESSION['error']['so_dien_thoai'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['error']['so_dien_thoai'] ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <input type="password" class="form-control" name="mat_khau" placeholder="Nhập mật khẩu">
                                        <?php if (isset($_SESSION['error']['mat_khau'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['error']['mat_khau'] ?></p>
                                        <?php } ?>
                                    </div>


                                </div>

                                <div class="single-input-item">
                                    <button class="btn btn-sqr">Đăng Ký</button>
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





<?php require_once 'views/layout/footer.php'; ?>