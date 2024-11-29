<!-- header -->
<?php include './views/layout/header.php'; ?>
<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>

<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản Lý Bình Luận</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">


                        <?php if (isset($_SESSION['success'])): ?>
                            <div class="alert alert-success">
                                <?= $_SESSION['success']; ?>
                            </div>
                            <?php unset($_SESSION['success']); ?>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['errors'])): ?>
                            <div class="alert alert-danger">
                                <?= $_SESSION['errors']; ?>
                            </div>
                            <?php unset($_SESSION['errors']); ?>
                        <?php endif; ?>


                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Sản phẩm</th>
                                        <th>ID Tài khoản</th>
                                        <th>Nội dung</th>
                                        <th>Ngày đăng</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($binh_luans as $binh_luan): ?>
                                        <tr>
                                            <td><?= $binh_luan['id'] ?></td>
                                            <td><?= $binh_luan['san_pham_id'] ?></td>
                                            <td><?= $binh_luan['tai_khoan_id'] ?></td>
                                            <td><?= $binh_luan['noi_dung'] ?></td>
                                            <td><?= $binh_luan['ngay_dang'] ?></td>
                                            <td>
                                                <?= $binh_luan['trang_thai'] === 'approved' ? 'Hiển thị' : 'Ẩn' ?>
                                            </td>
                                            <td>
                                                <form action="<?= BASE_URL_ADMIN ?>?act=update-trang-thai-binh-luan" method="POST" class="d-flex align-items-center gap-2">
                                                    <!-- Hidden field lưu ID bình luận -->
                                                    <input type="hidden" name="id" value="<?= $binh_luan['id'] ?>">

                                                    <!-- Dropdown chọn trạng thái -->
                                                    <select name="trang_thai" class="form-select form-select-sm w-auto">
                                                        <option value="approved" <?= $binh_luan['trang_thai'] === 'approved' ? 'selected' : '' ?>>Hiển thị</option>
                                                        <option value="hidden" <?= $binh_luan['trang_thai'] === 'hidden' ? 'selected' : '' ?>>Ẩn</option>
                                                    </select>

                                                    <!-- Nút cập nhật -->
                                                    <button type="submit" class="btn btn-primary btn-sm">Cập nhật</button>
                                                </form>

                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                               
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
<!-- </div> -->
<!-- /.content-wrapper -->


<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
<!-- End footer -->


<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<!-- Code injected by live-server -->

</body>

</html>