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
                                    <i class="fa fa-home"></i> Trang chủ</a>
                            </li>
                            <li class="text-white breadcrumb-link" aria-current="page"> / Chi tiết sản phẩm</li>
                            <li class="text-white breadcrumb-link" aria-current="page"> / Giỏ hàng</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <!-- cart main wrapper start -->
    <div class="cart-main-wrapper section-padding">
        <div class="container">
            <div class="cart-section">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Cart Table Area -->
                        <div class="cart-table table-responsive">
                            <form method="POST" action="<?= BASE_URL ?>?act=update-cart">
                                <table class="table cart-table-style" style="border:3px solid #c29958  ;">
                                    <h1 class="text-center" style="color: gray">Giỏ Hàng</h1>
                                    <thead>
                                        <tr>
                                            <th class="pro-thumbnail">Ảnh sản phẩm</th>
                                            <th class="pro-title">Tên sản phẩm</th>
                                            <th class="pro-price">Giá tiền</th>
                                            <th class="pro-quantity">Số lượng</th>
                                            <th class="pro-subtotal">Tổng tiền</th>
                                            <th class="pro-remove">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $tongGioHang = 0;
                                        foreach ($chiTietGioHang as $key => $sanPham): ?>
                                            <tr>
                                                <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="Product" /></a></td>
                                                <td class="pro-title"><a href="#"><?= $sanPham['ten_san_pham'] ?></a></td>
                                                <td class="pro-price">
                                                    <?php if ($sanPham['gia_khuyen_mai']): ?>
                                                        <span class="price-discount"><?= formatPrice($sanPham['gia_khuyen_mai']) ?> VND</span>
                                                    <?php else: ?>
                                                        <span class="price-regular"><?= formatPrice($sanPham['gia_san_pham']) ?> VND</span>
                                                    <?php endif ?>
                                                </td>
                                                <td class="pro-quantity">
                                                    <input type="number" name="quantity[<?= $sanPham['san_pham_id'] ?>]" value="<?= $sanPham['so_luong'] ?>" min="1" class="form-control" />
                                                </td>
                                                <td class="pro-subtotal">
                                                    <?php
                                                    $tongTien = $sanPham['gia_khuyen_mai'] ? $sanPham['gia_khuyen_mai'] * $sanPham['so_luong'] : $sanPham['gia_san_pham'] * $sanPham['so_luong'];
                                                    $tongGioHang += $tongTien;
                                                    echo formatPrice($tongTien) . ' VND';
                                                    ?>
                                                </td>
                                                <td class="pro-remove">
                                                    <a href="<?= BASE_URL ?>?act=remove-item&id=<?= $sanPham['san_pham_id'] ?>" class="btn-remove"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-update-cart">Cập nhật giỏ hàng</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-5 ml-auto">
                        <!-- Cart Calculation Area -->
                        <div class="cart-calculator-wrapper">
                            <div class="cart-calculate-items">

                                <table class="table">
                                    <tr class="total">
                                        <td><strong>Tổng giá trị giỏ hàng: </strong></td>
                                        <td class="total-amount"><?= formatPrice($tongGioHang) . ' VND' ?></td>
                                    </tr>
                                </table>
                            </div>
                            <a href="<?= BASE_URL . '?act=thanh-toan' ?>" class="btn btn-checkout">Đặt hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        /* Styling for Cart Table */
        .cart-table-style {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .cart-table-style thead {
            background-color: #f8f9fa;
            color: #343a40;
            font-weight: bold;
        }

        .cart-table-style th,
        .cart-table-style td {
            padding: 15px;
            text-align: center;
        }

        .cart-table-style td.pro-thumbnail {
            width: 120px;
        }

        .cart-table-style td.pro-title {
            width: 200px;
        }

        .cart-table-style td.pro-price,
        .cart-table-style td.pro-quantity,
        .cart-table-style td.pro-subtotal {
            width: 120px;
        }

        .cart-table-style td.pro-remove {
            width: 50px;
        }

        .cart-table-style .price-discount {
            color: #ff5733;
            font-weight: bold;
        }

        .cart-table-style .price-regular {
            color: #28a745;
        }

        /* Styling for Buttons */
        .btn-update-cart {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            width: 100%;
            margin-top: 20px;
            cursor: pointer;
        }

        .btn-update-cart:hover {
            background-color: #0056b3;
        }

        .btn-checkout {
            background-color: #28a745;
            color: #fff;
            padding: 12px 20px;
            width: 100%;
            text-align: center;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn-checkout:hover {
            background-color: #218838;
        }

        /* Styling for Product Removal */
        .btn-remove {
            color: #dc3545;
            font-size: 18px;
        }

        .btn-remove:hover {
            color: #c82333;
        }

        /* Cart Calculation Area */
        .cart-calculator-wrapper {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .cart-calculator-wrapper h6 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .cart-calculate-items .total {
            font-size: 16px;
            font-weight: bold;
            color: #343a40;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {

            .cart-table-style th,
            .cart-table-style td {
                font-size: 12px;
                padding: 10px;
            }

            .btn-update-cart,
            .btn-checkout {
                padding: 8px 15px;
            }
        }
    </style>
    <!-- cart main wrapper end -->
</main>


<?php require_once 'layout/footer.php'; ?>