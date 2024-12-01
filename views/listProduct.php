<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>

<main class="container my-5">
    <!-- Featured Products Section -->


    <!-- More Products Section -->
    <section class="more-products-section mt-5">
        <h2 class="text-center mb-4">Tất Cả Sản Phẩm</h2>
        <div class="tab-content">
            <div id="tab1">
                <section class="product-section py-5">
                    <div class="container">
                        <div class="row">
                            <?php foreach ($listProduct as $sanPham): ?>
                                <div class="col-md-4 col-sm-6 mb-4">
                                    <article class="product-item p-3 border rounded shadow-sm" style="background-color: #f9f9f9;">
                                        <!-- Hình ảnh sản phẩm -->
                                        <div class="product-thumb position-relative">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>" class="d-block" style="height: 250px; overflow: hidden;">
                                                <img  src="<?= $sanPham['hinh_anh'] ?>" alt="product" style="width: 100%; height: 250px; object-fit: cover;">
                                            </a>
                                            <!-- Nhãn sản phẩm (Mới, Giảm giá) -->
                                            <div class="product-badges position-absolute top-0 start-0 p-2">
                                                <?php
                                                $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                                $ngayHienTai = new DateTime();
                                                $tinhNgay = $ngayHienTai->diff($ngayNhap);
                                                if ($tinhNgay->days <= 7): ?>
                                                    <span class="badge bg-success text-white">Mới</span>
                                                <?php endif; ?>

                                                <?php if ($sanPham['gia_khuyen_mai']): ?>
                                                    <span class="badge bg-danger text-white">Giảm giá</span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <!-- Tên sản phẩm và giá -->
                                        <div class="product-caption text-center mt-3">
                                            <h5 class="product-name mb-2">
                                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>" class="text-decoration-none text-dark"><?= $sanPham['ten_san_pham'] ?></a>
                                            </h5>

                                            <div class="price-box">
                                                <?php if ($sanPham['gia_khuyen_mai']): ?>
                                                    <span class="price-regular text-danger fw-bold"><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ' ?></span>
                                                    <br>
                                                    <span class="price-old text-muted"><del><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></del></span>
                                                <?php else: ?>
                                                    <span class="price-regular text-dark fw-bold"><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                       
                                    </article>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>

    </section>
</main>



<?php require_once 'layout/footer.php'; ?>