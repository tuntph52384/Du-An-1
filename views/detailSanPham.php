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
                            <li class="text-white breadcrumb-link" aria-current="page"> / Chi tiết sản phẩm</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Secondary Navigation Bar -->
  

    <!-- page main wrapper start -->
    <div class="shop-main-wrapper section-padding pb-0">
        <div class="container">
            <div class="row">
                <!-- product details wrapper start -->
                <div class="col-lg-12 order-1 order-lg-2">
                    <!-- product details inner end -->
                    <div class="product-details-inner shadow-lg p-4 rounded">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="product-large-slider shadow-sm rounded p-3">
                                    <div class="pro-large-img">
                                        <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product-details" class="img-fluid rounded" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 shadow-sm rounded p-3">
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
                                                <div class="pro-qty"><input type="number" value="1" name="so_luong" min="1"></div>
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
                                    <!-- Tab Header -->
                                    <ul class="nav review-tab">
                                        <li><a class="active" data-bs-toggle="tab" href="#tab_three">Bình luận (<?= $countComment ?>)</a></li>
                                    </ul>
                                    <div class="tab-content reviews-tab">
                                        <div class="tab-pane fade show active" id="tab_three">
                                            <!-- Display Comments -->
                                            <?php foreach ($listBinhLuan as $binhLuan): ?>
                                                <?php if ($binhLuan['trang_thai'] == 1): ?>
                                                    <div class="total-reviews mb-4">
                                                        <div class="rev-avatar">
                                                            <img src="<?= $binhLuan['anh_dai_dien']; ?>" alt="avatar" class="img-fluid rounded-circle" onerror="this.onerror=null; this.src='https://images.pexels.com/photos/965989/pexels-photo-965989.jpeg'">
                                                        </div>
                                                        <div class="review-box">
                                                            <div class="post-author d-flex align-items-center">
                                                                <p class="mb-0"><span class="fw-bold"><?= $binhLuan['ho_ten'] ?> - </span><span class="text-muted"><?= $binhLuan['ngay_dang'] ?></span></p>
                                                            </div>
                                                            <p class="mt-2"><?= $binhLuan['noi_dung'] ?></p>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; ?>

                                            <!-- Comment Form -->
                                            <form action="#" class="review-form">
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label class="col-form-label"><span class="text-danger">*</span> Nội dung bình luận</label>
                                                        <textarea name="noi_dung" class="form-control" rows="4" placeholder="Viết bình luận của bạn..." required></textarea>
                                                    </div>
                                                </div>
                                                <div class="buttons mt-3">
                                                    <button class="btn btn-primary" type="submit">Bình luận</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <style>
                        .product-details-reviews .review-tab {
                            border-bottom: 2px solid #ddd;
                            margin-bottom: 20px;
                        }

                        .product-details-reviews .review-tab li a {
                            font-weight: 600;
                            color: #333;
                        }

                        .product-details-reviews .review-tab li a.active {
                            color: #007bff;
                            border-bottom: 3px solid #007bff;
                        }

                        .product-details-reviews .total-reviews {
                            display: flex;
                            align-items: flex-start;
                            padding: 15px;
                            border: 1px solid #ddd;
                            border-radius: 8px;
                            background-color: #f9f9f9;
                        }

                        .product-details-reviews .rev-avatar img {
                            width: 50px;
                            height: 50px;
                            object-fit: cover;
                            margin-right: 15px;
                        }

                        .product-details-reviews .review-box {
                            flex-grow: 1;
                        }

                        .product-details-reviews .post-author p {
                            margin: 0;
                            font-size: 14px;
                        }

                        .product-details-reviews .post-author span {
                            font-weight: bold;
                        }

                        .product-details-reviews .review-box p {
                            font-size: 16px;
                            color: #555;
                        }

                        .review-form textarea {
                            resize: none;
                            min-height: 150px;
                        }

                        .buttons .btn {
                            width: 100%;
                            padding: 10px;
                            font-size: 16px;
                            background-color: #007bff;
                            color: white;
                        }

                        .buttons .btn:hover {
                            background-color: #0056b3;
                        }
                    </style>

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
                <div class="col-12 text-center">
                    <div class="" >
                        <h2 style="color: red;">Sản phẩm liên quan</h2>
                        <div class="section-line" style="width: 50px; height: 3px; background-color: #e74c3c; margin: 10px auto;"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-container">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                            <?php foreach ($listSanPhamCungDanhMuc as $sanPham): ?>
                                <div class="col">
                                    <div class="product-item shadow-sm rounded p-3 d-flex flex-column" style="display: flex; flex-direction: column; height: 100%;">
                                        <figure class="product-thumb position-relative">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>" class="d-block">
                                                <img class=" img-fluid rounded" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product-thumb" style="max-height: 200px; object-fit: cover;">
                                            </a>
                                        </figure>
                                        <div class="product-details text-center mt-3" style="flex-grow: 1;">
                                            <h5 class="product-title mb-2" style="font-size: 16px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>" class="text-dark"><?= $sanPham['ten_san_pham']; ?></a>
                                            </h5>
                                            <div class="price-box">
                                                <?php if ($sanPham['gia_khuyen_mai']): ?>
                                                    <span class="price-regular text-danger"><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ' ?></span>
                                                    <span class="price-old text-muted"><del><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></del></span>
                                                <?php else: ?>
                                                    <span class="price-regular text-danger"><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- related products area end -->
</main>

<?php require_once 'layout/footer.php'; ?>