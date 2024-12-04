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
                                <li class="breadcrumb-item active" aria-current="page">Đăng Nhập</li>
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
                <?php if (isset($_SESSION['success'])): ?>
                        <div class="alert alert-success text-center">
                            <?= $_SESSION['success']; ?>
                        </div>
                        <?php unset($_SESSION['success']); // Xóa thông báo sau khi hiển thị 
                        ?>
                    <?php endif; ?>
                    <!-- Login Content Start -->
                    <div class="col-lg-12">
                        <div class="login-reg-form-wrap">
                            <h5 class="text-center">Đăng Nhập</h5>

                            <?php if (isset($_SESSION['error'])): ?>
                                <?php if (is_array($_SESSION['error'])): ?>
                                    <?php foreach ($_SESSION['error'] as $error): ?>
                                        <p class="text-danger login-box-msg text-center"><?= htmlspecialchars($error) ?></p>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p class="text-danger login-box-msg text-center"><?= htmlspecialchars($_SESSION['error']) ?></p>
                                <?php endif; ?>
                                <?php unset($_SESSION['error']); // Xóa session lỗi sau khi hiển thị 
                                ?>
                            <?php else: ?>
                                <p class="login-box-msg text-center">Vui lòng đăng nhập</p>
                            <?php endif; ?>

                            <form action="<?= BASE_URL . '?act=check-login' ?>" method="post">
                                <div class="single-input-item">
                                    <input type="email" placeholder="Email or Username" name="email" required />
                                </div>
                                <div class="single-input-item">
                                    <input type="password" placeholder="Enter your Password" name="password" required />
                                </div>
                                <div class="single-input-item">
                                    <div class="login-reg-form-meta d-flex align-items-center justify-content-between">

                                        <a href="#" class="forget-pwd">Quên mật khẩu</a>
                                    </div>
                                </div>
                                <div class="single-input-item">
                                    <button class="btn btn-sqr">Đăng nhập</button>
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