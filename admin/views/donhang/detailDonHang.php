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
                <div class="col-sm-10">
                    <h1>Quản Lý Danh Sách Đơn Hàng 
                        <br>Đơn hàng: <?= $donHang['ma_don_hang'] ?></h1>
                </div>
                <div class="col-sm-2">
                    <form action="" method="post">
                        <select name="" id="" class="from-group">
                            <?php foreach ($listTrangThaiDonHang as $key => $trangThai) : ?>
                                <option disabled
                                <?= $trangThai['id'] == $donHang['trang_thai_id'] ? 'selected' : '' ?> 
                                    <?= $trangThai['id'] < $donHang['trang_thai_id'] ? 'disabled' : '' ?> 
                                    value="<?= $trangThai['id']; ?>">
                                    <?= $trangThai['ten_trang_thai']; ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php
                // Kiểm tra trạng thái đơn hàng để hiển thị màu cảnh báo phù hợp
                if ($donHang['trang_thai_id'] == 1) {
                    $colorAlerts = 'primary';
                } elseif ($donHang['trang_thai_id'] >= 2 && $donHang['trang_thai_id'] <= 9) {
                    $colorAlerts = 'warning';
                } elseif ($donHang['trang_thai_id'] == 10) {
                    $colorAlerts = 'success';
                } else {
                    $colorAlerts = 'danger';
                }
                ?>
                <div class="alert alert-<?= $colorAlerts; ?> mt-3 mb-3" role="alert" style="font-size: 1.2rem; letter-spacing: 1px;">
                    <strong>Đơn hàng:</strong> <?= $donHang['ten_trang_thai'] ?>
                </div>

                <!-- Invoice content -->
                <div class="invoice p-4 mb-4 shadow-lg" style="border-radius: 10px; background-color: #f9f9f9;">
                    <!-- Title row -->
                    <div class="row mb-3">
                        <div class="col-12">
                            <h4 style="font-size: 1.5rem; line-height: 1.6; letter-spacing: 1px;">
                                <small class="float-right text-muted" style="font-size: 1.2rem;"><b>Ngày Đặt:</b> <?= formatDate($donHang['ngay_dat']) ?></small>
                            </h4>
                        </div>
                    </div>

                    <!-- Info row -->
                    <div class="row invoice-info">
                        <div class="col-md-6 invoice-col">
                            <h5 class="text-primary" style="font-size: 1.3rem; letter-spacing: 1px; line-height: 1.6;"><b>Thông tin người đặt:</b></h5>
                            <address style="font-size: 1.1rem; line-height: 1.8;">
                                <strong><?= $donHang['ho_ten'] ?></strong><br>
                                <b>Email:</b> <?= $donHang['email'] ?><br>
                                <b>Số điện thoại:</b> <?= $donHang['so_dien_thoai'] ?><br>
                            </address>
                        </div>

                        <div class="col-md-6 invoice-col">
                            <h5 class="text-success" style="font-size: 1.3rem; letter-spacing: 1px; line-height: 1.6;"><b>Người nhận:</b></h5>
                            <address style="font-size: 1.1rem; line-height: 1.8;">
                                <strong><?= $donHang['ten_nguoi_nhan'] ?></strong><br>
                                <b>Email:</b> <?= $donHang['email_nguoi_nhan'] ?><br>
                                <b>Số điện thoại:</b> <?= $donHang['sdt_nguoi_nhan'] ?><br>
                                <b>Địa chỉ:</b> <?= $donHang['dia_chi_nguoi_nhan'] ?><br>
                            </address>
                        </div>
                    </div>

                    <div class="row invoice-info">
                        <div class="col-md-12 invoice-col">
                            <h5 class="text-warning" style="font-size: 1.3rem; letter-spacing: 1px; line-height: 1.6;"><b>Thông tin đơn hàng:</b></h5>
                            <b>Mã đơn hàng:</b> <span class="text-info" style="font-size: 1.2rem;"><?= $donHang['ma_don_hang'] ?></span><br>
                            <b>Tổng tiền:</b> <span class="text-danger" style="font-size: 1.2rem;"><?= number_format($donHang['tong_tien'], 0, ',', '.') ?> VND</span><br>
                            <b>Ghi chú:</b> <span style="font-size: 1.1rem;"><?= $donHang['ghi_chu'] ?></span><br>
                            <b>Thanh toán:</b> <span class="font-weight-bold" style="font-size: 1.1rem;"><?= $donHang['ten_phuong_thuc'] ?></span><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




                       



                        <!-- this row will not appear when printing -->

                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
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
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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