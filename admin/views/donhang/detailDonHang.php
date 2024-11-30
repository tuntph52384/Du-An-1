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
                    <h1>Quản Lý Danh Sách Đơn Hàng - Đơn hàng: <?= $donHang['ma_don_hang'] ?></h1>
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
                    <div class="alert alert-<?= $colorAlerts; ?>" role="alert">
                        Đơn hàng: <?= $donHang['ten_trang_thai'] ?>
                    </div>

                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                       
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <h4><b>Thông tin người đặt:</b></h4>
                                <address>
                                    <strong><?= $donHang['ho_ten'] ?></strong><br>
                                    <b>Email:</b> <?= $donHang['email'] ?><br>
                                    <b>Số điện thoại:</b> <?= $donHang['so_dien_thoai'] ?><br>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <h4><b>Người nhận:</b></h4>
                                <address>
                                    <strong><?= $donHang['ten_nguoi_nhan'] ?></strong><br>
                                    <b>Email:</b> <?= $donHang['email_nguoi_nhan'] ?><br>
                                    <b>Số điện thoại:</b> <?= $donHang['sdt_nguoi_nhan'] ?><br>
                                    <b>Địa chỉ:</b> <?= $donHang['dia_chi_nguoi_nhan'] ?><br>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class=" col-sm-4 invoice-col">
                                <h4><b>Thông tin đơn hàng:</b></h4>
                                <b>Mã đơn hàng: <?= $donHang['ma_don_hang'] ?></b><br>
                                <b>Tổng tiền :</b> <?= $donHang['tong_tien'] ?><br>
                                <b>Ghi chú:</b> <?= $donHang['ghi_chu'] ?><br>
                                <b>Thanh toán:</b> <?= $donHang['ten_phuong_thuc'] ?><br>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Đơn giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $tong_tien = 0; ?>
                                        <?php foreach ($sanPhamDonHang as $key => $sanPham) : ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><?= $sanPham['ten_san_pham'] ?></td>
                                                <td><?= $sanPham['don_gia'] ?></td>
                                                <td><?= $sanPham['so_luong'] ?></td>
                                                <td><?= formatPrice($sanPham['thanh_tien']) ?> VND</td>
                                            </tr>
                                            <?php $tong_tien += $sanPham['thanh_tien']; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->

                            <!-- /.col -->
                            <div class="col-6">
                                <p class="lead">Ngày đặt hàng: <?= formatDate($donHang['ngay_dat']) ?></p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Tổng giá trị đơn hàng:</th>
                                            <td>
                                                <?= formatPrice($tong_tien) . ' VND' ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

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