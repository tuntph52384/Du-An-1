<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>
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
                                <li class="breadcrumb-item"><a href="<?= BASE_URL . '?act=gio-hang' ?>">Giỏ hàng</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- checkout main wrapper start -->
    <div class="checkout-page-wrapper section-padding">
        <div class="container">
            <form action="<?= BASE_URL . '?act=xu-ly-thanh-toan' ?>" method="POST">
            <div class="row">
                    <!-- Checkout Billing Details -->
                    <div class="col-lg-6">
                        <div class="checkout-billing-details-wrap">
                            <h5 class="checkout-title">Thông tin người nhận </h5>
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
                                    <label for="dia_chi_nguoi_nhan" class="required">Địa chỉ </label>
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
                        <div class="order-summary-details">
                            <h5 class="checkout-title">Thông tin sản phẩm</h5>
                            <div class="order-summary-content">
                                <!-- Order Summary Table -->
                                <div class="order-summary-table table-responsive text-center">
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
                                <div class="order-payment-method">
                                    <div class="single-payment-method show">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="cashon"  value="1" name="phuong_thuc_thanh_toan_id" class="custom-control-input" checked />
                                                <label class="custom-control-label" for="cashon">COD(Thanh toán khi nhận hàng)</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="summary-footer-area">
                                        <div class="custom-control custom-checkbox mb-20">
                                            <input type="checkbox" class="custom-control-input" id="terms" required />
                                            <label class="custom-control-label" for="terms">Xác nhận đặt hàng</a></label>
                                        </div>
                                        <button type="submit" class="btn btn-sqr">Thanh toán</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- checkout main wrapper end -->
</main>


<?php require_once 'layout/footer.php'; ?>