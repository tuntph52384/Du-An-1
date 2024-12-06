<?php require_once './views/layout/header.php' ?>
<?php require_once './views/layout/navbar.php' ?>
<?php require_once './views/layout/sidebar.php' ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-11">
                    <h1>Quản lý tài khoản khách hàng</h1>
                </div>
                <div class="col-1">
                    <a href="<?= BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang' ?>" class="btn btn-secondary">Quay lại</i></a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Sửa thông tin tài khoản khách hàng: <?= $khachHang['ho_ten'] ?></h3>
                        </div>

                        <form action="<?= BASE_URL_ADMIN . '?act=sua-khach-hang' ?>" method="POST">
                            <input type="hidden" name="khach_hang_id" value="<?= $khachHang['id'] ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label">Họ tên</label>
                                        <input type="text" class="form-control" name="ho_ten" value="<?= $khachHang['ho_ten'] ?>" placeholder="Nhập họ tên" readonly>
                                        <?php if (isset($_SESSION['error']['ho_ten'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['error']['ho_ten'] ?></p>
                                        <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label">Email</label>
                                        <input type="email" class="form-control" name="email" value="<?= $khachHang['email'] ?>" placeholder="Nhập email" readonly>
                                        <?php if (isset($_SESSION['error']['email'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
                                        <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label">Số điện thoại</label>
                                        <input type="text" class="form-control" name="so_dien_thoai" value="<?= $khachHang['so_dien_thoai'] ?>" placeholder="Nhập số điện thoại" readonly>
                                        <?php if (isset($_SESSION['error']['so_dien_thoai'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['error']['so_dien_thoai'] ?></p>
                                        <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label">Ngày sinh</label>
                                        <input type="date" class="form-control" name="ngay_sinh" value="<?= $khachHang['ngay_sinh'] ?>" readonly>
                                        <?php if (isset($_SESSION['error']['ngay_sinh'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['error']['ngay_sinh'] ?></p>
                                        <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Giới tính</label>
                                    <select name="gioi_tinh" id="inputStatus" class="form-control custom-select" style="pointer-events: none;">
                                        <option <?= $khachHang['gioi_tinh'] == 1 ? 'selected' : '' ?> value="1">Nam</option>
                                        <option <?= $khachHang['gioi_tinh'] !== 1 ? 'selected' : '' ?> value="2">Nữ</option>
                                    </select>
                                </div>  


                                <div class="form-group">
                                    <label">Địa chỉ</label>
                                        <input type="text" class="form-control" name="dia_chi" value="<?= $khachHang['dia_chi'] ?>" placeholder="Nhập địa chỉ" readonly>
                                        <?php if (isset($_SESSION['error']['dia_chi'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['error']['dia_chi'] ?></p>
                                        <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label for="trang_thai">Trạng thái tài khoản</label>
                                    <select id="trang_thai" name="trang_thai" class="form-control custom-select">
                                        <option <?= $khachHang['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Active</option>
                                        <option <?= $khachHang['trang_thai'] !== 1 ? 'selected' : '' ?> value="2">Inactive</option>
                                    </select>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
</div>
<!-- /.content-wrapper -->
<?php require_once './views/layout/footer.php' ?>
</body>

</html>