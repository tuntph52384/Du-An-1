<!-- offcanvas mini cart start -->
<div class="offcanvas-minicart-wrapper">
    <div class="minicart-inner">
        <div class="offcanvas-overlay"></div>
        <div class="minicart-inner-content">
            <div class="minicart-close">
                <i class="pe-7s-close"></i>
            </div>
            <div class="minicart-content-box">
                <div class="minicart-item-wrapper">
                    <ul>
                        <li class="minicart-item">
                            <div class="minicart-thumb">
                                <a href="product-details.html">
                                    <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                                </a>
                            </div>
                            <div class="minicart-content">
                                <h3 class="product-name">
                                    <a href="product-details.html"><?= $sanPham['ten_san_pham'] ?></a>
                                </h3>
                                <p>
                                    <span class="cart-quantity"><?= $sanPham['so_luong'] ?> <strong>&times;</strong></span>
                                    <span class="cart-price"><?= formatPrice($sanPham['gia_san_pham']) ?></span>
                                </p>
                                
                                <?php
                                $tongGioHang = 0;
                                $tongGioHang += $sanPham['so_luong'] * $sanPham['gia_san_pham'] ?>
                            </div>
                   
                        </li>
    
                    </ul>
                </div>

                <div class="minicart-pricing-box">
                    <ul>

                        <li class="total">
                            <span>Tổng giỏ Hàng</span>
                            <span><strong><?= formatPrice($tongGioHang) ?></strong></span>
                        </li>
                    </ul>
                </div>

                <div class="minicart-button">
                    <a href="<?= BASE_URL . '?act=gio-hang' ?>"><i class="fa fa-shopping-cart"></i> Xem giỏ hàng</a>
                    <a href="<?= BASE_URL . '?act=thanh-toan' ?>"><i class="fa fa-share"></i> Thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- offcanvas mini cart end -->