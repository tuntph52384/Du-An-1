<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>

<main>
     <!-- Main Navigation Bar -->
     <div class="navbar-main bg-dark text-white py-3 border-bottom">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-8">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="<?= BASE_URL ?>" class="text-white breadcrumb-link">
                                    <i class="fa fa-home"></i> Trang chủ
                                </a>
                            </li>
                            <li class="text-white breadcrumb-link" aria-current="page"> / Lịch sử mua hàng</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

   

    <!-- cart main wrapper start -->
    <div class="cart-main-wrapper section-padding border-top">
        <div class="container">
            <div class="section-bg-color">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Cart Table Area -->
                        <div class="cart-table table-responsive">
                            <?php if (isset($_SESSION['success'])): ?>
                                <div class="alert alert-success">
                                    <?= $_SESSION['success']; ?>
                                    <?php unset($_SESSION['success']); ?>
                                </div>
                            <?php endif; ?>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Mã đơn hàng</th>
                                        <th>Ngày đặt</th>
                                        <th>Tổng tiền</th>
                                        <th>Phương thức thanh toán</th>
                                        <th>Trạng thái đơn hàng</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($donHangs as $donHang) { ?>
                                        <tr>
                                            <th class="text-center"><?= $donHang['ma_don_hang'] ?></th>
                                            <td><?= $donHang['ngay_dat'] ?></td>
                                            <td><?= formatPrice($donHang['tong_tien']) ?></td>
                                            <td><?= $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']] ?></td>
                                            <td><?= $trangThaiDonHang[$donHang['trang_thai_id']] ?></td>

                                            <td>
                                                <a href="<?= BASE_URL ?>?act=chi-tiet-mua-hang&id=<?= $donHang['id'] ?>" class="btn btn-sqr border">Chi tiết đơn hàng</a>
                                                <?php if ($donHang['trang_thai_id'] == 1) { ?>
                                                    <a href="<?= BASE_URL ?>?act=huy-don-hang&id=<?= $donHang['id'] ?>" class="btn btn-danger border" onclick="return confirm('Xác nhận hủy đơn hàng')">Hủy</a>
                                                <?php } ?>

                                            </td>

                                        <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- cart main wrapper end -->
</main>

<?php require_once 'layout/footer.php'; ?>

<style>
  
    
   
    /* Tăng cường màu sắc cho bảng đơn hàng */
    .table th {
        background-color: #004085;
        color: #fff;
        text-align: center;
        border: 1px solid #dee2e6;
    }

    .table td {
        text-align: center;
        color: #333;
        border: 1px solid #dee2e6;
    }

    .table-striped tbody tr:hover {
        background-color: #f1f1f1;
    }

    /* Cải thiện màu sắc các nút */
    .btn-sqr {
        background-color: #28a745;
        color: #fff;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 1rem;
        transition: background-color 0.3s ease, transform 0.3s ease;
        border: 1px solid #28a745;
    }

    .btn-sqr:hover {
        background-color: #218838;
        transform: translateY(-2px);
    }

    /* Nút hủy đơn hàng với màu đỏ */
    .btn-danger {
        background-color: #dc3545;
        color: #fff;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 1rem;
        transition: background-color 0.3s ease, transform 0.3s ease;
        border: 1px solid #dc3545;
    }

    .btn-danger:hover {
        background-color: #c82333;
        transform: translateY(-2px);
    }

    /* Hiệu ứng khi hover vào các ô trong bảng */
    .table-striped tbody tr:hover {
        background-color: #e9ecef;
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
