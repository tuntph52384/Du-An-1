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
                            <li class="text-white breadcrumb-link" aria-current="page"> / Thanh toán</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- checkout main wrapper start -->
    <div class="checkout-page-wrapper section-padding">
    <div class="container">
        <form action="<?= BASE_URL . '?act=xu-ly-thanh-toan' ?>" method="POST">
            <div class="row">
                <!-- Checkout Billing Details -->
                <div class="col-lg-6">
                    <div class="checkout-billing-details-wrap border p-4 rounded shadow-sm">
                        <h5 class="checkout-title">Thông tin người nhận</h5>
                        <div class="billing-form-wrap">
                            <div class="single-input-item">
                                <label for="ten_nguoi_nhan" class="required">Tên người nhận</label>
                                <input type="text" id="ten_nguoi_nhan" name="ten_nguoi_nhan" value="<?= $user['ho_ten'] ?>" placeholder="Tên người nhận" required />
                            </div>

                            <div class="single-input-item">
                                <label for="email_nguoi_nhan" class="required">Địa chỉ email</label>
                                <input type="email" id="email_nguoi_nhan" name="email_nguoi_nhan" value="<?= $user['email'] ?>" placeholder="Địa chỉ email" required />
                            </div>

                            <div class="single-input-item">
                                <label for="sdt_nguoi_nhan" class="required">Số điện thoại</label>
                                <input type="text" id="sdt_nguoi_nhan" name="sdt_nguoi_nhan" value="<?= $user['so_dien_thoai'] ?>" placeholder="Số điện thoại" required />
                            </div>

                            <div class="single-input-item">
                                <label for="dia_chi_nguoi_nhan" class="required">Địa chỉ</label>
                                <input type="text" id="dia_chi_nguoi_nhan" name="dia_chi_nguoi_nhan" value="<?= $user['dia_chi'] ?>" placeholder="Địa chỉ" required />
                            </div>

                            <div class="single-input-item">
                                <label for="ghi_chu">Ghi chú</label>
                                <textarea name="ghi_chu" id="ghi_chu" cols="30" rows="3" placeholder="Ghi chú tại đây"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary Details -->
                <div class="col-lg-6">
                    <div class="order-summary-details border p-4 rounded shadow-sm">
                        <h5 class="checkout-title">Thông tin sản phẩm</h5>
                        <div class="order-summary-content">
                            <!-- Order Summary Table -->
                            <div class="order-summary-table table-responsive text-center mb-4">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Tổng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $tongGioHang = 0;
                                        foreach ($chiTietGioHang as $key => $sanPham): ?>
                                            <tr>
                                                <td>
                                                    <a href=""><?= $sanPham['ten_san_pham'] ?> <strong>x<?= $sanPham['so_luong'] ?></strong></a>
                                                </td>
                                                <td>
                                                    <?php
                                                    $tongTien = 0;
                                                    if ($sanPham['gia_khuyen_mai']) {
                                                        $tongTien = $sanPham['gia_khuyen_mai'] * $sanPham['so_luong'];
                                                    } else {
                                                        $tongTien = $sanPham['gia_san_pham'] * $sanPham['so_luong'];
                                                    }
                                                    $tongGioHang += $tongTien;
                                                    echo formatPrice($tongTien) . ' VND' ?>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>Tổng giá trị đơn hàng</td>
                                            <input type="hidden" name="tong_tien" value="<?= $tongGioHang ?>">
                                            <td><strong><?= formatPrice($tongGioHang) . ' VND' ?></strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <!-- Order Payment Method -->
                            <div class="order-payment-method mb-4">
                                <div class="single-payment-method show">
                                    <div class="payment-method-name">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="cashon" value="1" name="phuong_thuc_thanh_toan_id" class="custom-control-input" checked />
                                            <label class="custom-control-label" for="cashon">COD(Thanh toán khi nhận hàng)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="summary-footer-area">
                                <div class="custom-control custom-checkbox mb-4">
                                    <input type="checkbox" class="custom-control-input" id="terms" required />
                                    <label class="custom-control-label" for="terms">Xác nhận đặt hàng</label>
                                </div>
                                <button type="submit" class="btn btn-sqr w-100">Thanh toán</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
    /* Cải tiến bố cục, tạo đường viền, thêm bóng */
    .checkout-billing-details-wrap, .order-summary-details {
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .checkout-title {
        font-size: 1.25rem;
        font-weight: bold;
        margin-bottom: 1rem;
        color: #333;
    }

    .single-input-item {
        margin-bottom: 1.25rem;
    }

    .single-input-item label {
        font-weight: bold;
        margin-bottom: 0.5rem;
        display: block;
    }

    .single-input-item input, .single-input-item textarea {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 1rem;
    }

    .order-summary-table th {
        background-color: #f8f9fa;
        font-weight: bold;
        color: #333;
        text-align: center;
    }

    .order-summary-table td {
        text-align: center;
        padding: 1rem;
    }

    .btn-sqr {
        background-color: #28a745;
        color: white;
        border-radius: 5px;
        font-size: 1rem;
        padding: 1rem;
        border: none;
        transition: background-color 0.3s ease;
    }

    .btn-sqr:hover {
        background-color: #218838;
    }

    .custom-control-label {
        font-size: 1rem;
    }

    .custom-control-input:checked ~ .custom-control-label::before {
        background-color: #28a745;
    }

    /* Responsive design for mobile */
    @media (max-width: 768px) {
        .checkout-page-wrapper {
            padding: 20px;
        }

        .checkout-billing-details-wrap, .order-summary-details {
            padding: 20px;
        }

        .btn-sqr {
            font-size: 1.1rem;
        }
    }
</style>

    <!-- checkout main wrapper end -->
</main>

<?php require_once 'layout/footer.php'; ?>

