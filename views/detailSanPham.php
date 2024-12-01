<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>





<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row" style="background-color: gray;">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a></li>

                                <li class="active breadcrumb-item" aria-current="page">Chi tiết sản phẩm</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- page main wrapper start -->
    <div class="shop-main-wrapper section-padding pb-0">
        <div class="container">
            <div class="row">
                <!-- product details wrapper start -->
                <div class="col-lg-12 order-1 order-lg-2">
                    <!-- product details inner end -->
                    <div class="product-details-inner">
                        <div class="row" style="border: 5px solid #ccc; border-radius: 8px; padding: 20px;">
                            <div class="col-lg-5">
                                <div class="product-large-slider" style="border: 5px solid #ccc; border-radius: 8px; padding: 20px;">
                 
                                        <div class="pro-large-img">
                                            <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product-details" style="width: 100%; height: 400px; object-fit: cover; object-position: center;" />
                                        </div>
                            
                                </div>

                            </div>
                            <div class="col-lg-7" style="border: 5px solid #ccc; border-radius: 8px; padding: 20px;">
                                <div class="product-details-des">
                                    <div class="manufacturer-name mb-2">
                                        <a href="#" class="text-muted"><?= $sanPham['ten_danh_muc'] ?></a>
                                    </div>
                                    <h3 class="product-name mb-3"><?= $sanPham['ten_san_pham'] ?></h3>
                                    <div class="ratings d-flex mb-3">
                                        <div class="pro-review">
                                            <?php $countComment = count($listBinhLuan); ?>
                                            <span class="text-muted"><?= $countComment . ' bình luận' ?></span>
                                        </div>
                                    </div>
                                    <div class="price-box mb-3">
                                        <?php if ($sanPham['gia_khuyen_mai']): ?>
                                            <span class="price-regular text-danger"><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ' ?></span>
                                            <span class="price-old text-muted"><del><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></del></span>
                                        <?php else: ?>
                                            <span class="price-regular text-danger"><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="availability">
                                        <i class="fa fa-check-circle"></i>
                                        <span><?= $sanPham['so_luong'] . ' trong kho' ?></span>
                                    </div>
                                    <p class="pro-desc"><?= $sanPham['mo_ta'] ?></p>
                                    <form action="<?= BASE_URL . '?act=them-gio-hang' ?>" method="post">
                                        <div class="quantity-cart-box d-flex align-items-center">
                                            <h6 class="option-title">Số lượng:</h6>
                                            <div class="quantity">
                                                <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                                                <div class="pro-qty"><input type="text" value="1" name="so_luong"></div>
                                            </div>
                                            <div class="action_link">
                                                <button class="btn btn-cart2" type="submit">Thêm vào giỏ hàng</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- product details inner end -->

                    <!-- product details reviews start -->
                    <div class="product-details-reviews section-padding pb-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="product-review-info">
                                    <ul class="nav review-tab">

                                        <li>
                                            <a class="active" data-bs-toggle="tab" href="#tab_three">Bình luận (<?= $countComment ?>)</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content reviews-tab">


                                        <div class="tab-pane fade show active" id="tab_three">
                                            <?php foreach ($listBinhLuan as $binhLuan): ?>
                                                <?php if ($binhLuan['trang_thai'] == 1): ?> <!-- Chỉ hiển thị bình luận không bị ẩn -->
                                                    <div class="total-reviews">
                                                        <div class="rev-avatar">
                                                            <img src="<?= $binhLuan['anh_dai_dien']; ?>" alt="">
                                                        </div>
                                                        <div class="review-box">
                                                            <div class="post-author">
                                                                <p><span><?= $binhLuan['ho_ten'] ?> - </span><?= $binhLuan['ngay_dang'] ?></p>
                                                            </div>
                                                            <p><?= $binhLuan['noi_dung'] ?></p>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; ?>

                                            <form action="<?= BASE_URL . '?act=add-binh-luan' ?>" method="post" class="review-form"> <!-- Thêm action -->
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <label class="col-form-label"><span class="text-danger">*</span> Nội dung bình luận</label>
                                                        <textarea name="noi_dung" class="form-control" required></textarea> <!-- Thêm name -->
                                                    </div>
                                                </div>

                                                <div class="buttons">
                                                    <button class="btn btn-sqr" type="submit">Bình luận</button>
                                                </div>
                                            </form> <!-- end of review-form -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details reviews end -->
                </div>
                <!-- product details wrapper end -->
            </div>
        </div>
    </div>
    <!-- page main wrapper end -->

    <!-- related products area start -->
    <section class="related-products section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">Sản phẩm liên quan</h2>
                        <p class="sub-title"></p>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-container">
                        <!-- Product tab content start -->
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab1">
                                <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                    <?php foreach ($listSanPhamCungDanhMuc as $sanPham): ?>
                                        <div class="product-item" style="border: 1px solid #ddd; border-radius: 8px; overflow: hidden; margin-bottom: 20px; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                                            <figure class="product-thumb position-relative" style="border-bottom: 1px solid #ddd;">
                                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>" class="d-block" style="height: 250px; overflow: hidden;">
                                                    <img class="pri-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product" style="width: 100%; height: 100%; object-fit: cover;">
                                                    <img class="sec-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product" style="width: 100%; height: 100%; object-fit: cover;">
                                                </a>
                                                <div class="product-badge position-absolute top-0 start-0">
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

                                                <div class="cart-hover position-absolute bottom-0 start-0 end-0 bg-dark bg-opacity-50 p-2 text-center d-none">
                                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>" class="btn btn-light btn-sm">Xem chi tiết</a>
                                                </div>
                                            </figure>
                                            <div class="product-caption text-center mt-2" style="padding: 10px; background-color: #fff;">
                                                <h6 class="product-name mb-1">
                                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>" class="text-decoration-none" style="color: #333;"><?= $sanPham['ten_san_pham'] ?></a>
                                                </h6>
                                                <div class="price-box">
                                                    <?php if ($sanPham['gia_khuyen_mai']): ?>
                                                        <span class="price-regular text-danger fw-bold"><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ' ?></span>
                                                        <br>
                                                        <span class="price-old text-muted"><del><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></del></span>
                                                    <?php else: ?>
                                                        <span class="price-regular text-white fw-bold"><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                        <!-- Product tab content end -->
                    </div>
                </div>
            </div>


        </div>
    </section>
    <!-- related products area end -->
</main>







<?php require_once 'layout/footer.php'; ?>