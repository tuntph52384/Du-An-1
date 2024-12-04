<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>

<main>
    <!-- Main Navigation Bar -->
    <div class="navbar-main bg-dark text-white py-3">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-8">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="<?= BASE_URL ?>" class="text-white breadcrumb-link">
                                    <i class="fa fa-home"></i> Trang chủ
                                </a>
                            </li>
                            <li class="text-white breadcrumb-link" aria-current="page"> / Chi tiết đơn hàng</li>
                        </ol>
                    </nav>
                </div>
             
            </div>
        </div>
    </div>

   

    <!-- Order Details Section -->
    <section class="order-details-section section-padding">
        <div class="container">
            <div class="row">
                <!-- Product Info Card -->
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <div class="card shadow-lg border-primary">
                        <div class="card-header bg-primary text-white">
                            <h4>Thông tin sản phẩm</h4>
                        </div>
                        <div class="card-body p-4">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá tiền</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($chiTietDonHang as $item) { ?>
                                        <tr>
                                            <td><img class="img-fluid rounded" src="<?= BASE_URL . $item['hinh_anh'] ?>" width="100px" alt="" /></td>
                                            <td><?= $item['ten_san_pham'] ?></td>
                                            <td><?= number_format($item['don_gia'], 0, ',', '.') ?> VND</td>
                                            <td><?= $item['so_luong'] ?></td>
                                            <td><?= number_format($item['thanh_tien'], 0, ',', '.') ?> VND</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Order Info Card -->
                <div class="col-lg-5">
                    <div class="card shadow-lg border-success">
                        <div class="card-header bg-success text-white">
                            <h4>Thông tin đơn hàng</h4>
                        </div>
                        <div class="card-body p-4">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Mã đơn hàng:</strong> <?= $donHang['ma_don_hang'] ?></li>
                                <li class="list-group-item"><strong>Người nhận:</strong> <?= $donHang['ten_nguoi_nhan'] ?></li>
                                <li class="list-group-item"><strong>Email:</strong> <?= $donHang['email_nguoi_nhan'] ?></li>
                                <li class="list-group-item"><strong>Số điện thoại:</strong> <?= $donHang['sdt_nguoi_nhan'] ?></li>
                                <li class="list-group-item"><strong>Địa chỉ:</strong> <?= $donHang['dia_chi_nguoi_nhan'] ?></li>
                                <li class="list-group-item"><strong>Ngày đặt:</strong> <?= formatDate($donHang['ngay_dat']) ?></li>
                                <li class="list-group-item"><strong>Phương thức thanh toán:</strong> <?= $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']] ?></li>
                                <li class="list-group-item"><strong>Trạng thái:</strong> <?= $trangThaiDonHang[$donHang['trang_thai_id']] ?></li>
                                <li class="list-group-item"><strong>Ghi chú:</strong> <?= $donHang['ghi_chu'] ?></li>
                                <li class="list-group-item"><strong>Thành tiền:</strong> <?= formatPrice($donHang['tong_tien']) ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once 'layout/footer.php'; ?>

<!-- Add Inline CSS for improved styling -->
<style>
    .navbar-main {
        margin-bottom: 20px;
    }

    .breadcrumb-link {
        color: #fff;
        text-decoration: none;
        font-weight: bold;
    }

    .breadcrumb-link:hover {
        color: #f8f9fa;
        text-decoration: underline;
    }

    .navbar-secondary {
        background-color: #f8f9fa;
        margin-bottom: 30px;
    }

    .navbar-secondary .nav-link {
        font-size: 1rem;
        color: #007bff;
        padding: 10px 15px;
    }

    .navbar-secondary .nav-link.active {
        color: #fff;
        background-color: #007bff;
    }

    .card-header h4 {
        font-size: 1.25rem;
        font-weight: bold;
    }

    .card-body {
        padding: 20px;
    }

    .table th {
        background-color: #f8f9fa;
        text-align: center;
    }

    .table td {
        text-align: center;
    }

    .list-group-item {
        font-size: 1rem;
        color: #333;
    }

    /* Hover effect for table rows */
    .table-striped tbody tr:hover {
        background-color: #f1f1f1;
    }

    .card {
        border-radius: 10px;
    }

    /* Rounded image */
    .img-fluid.rounded {
        border-radius: 5px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .navbar-secondary .nav-item {
            margin-right: 15px;
        }

        .navbar-secondary .nav-link {
            font-size: 0.9rem;
        }
    }
</style>
