<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>

<main>
    <!-- hero slider area start -->
    <section class="slider-area">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <!-- Indicators -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <!-- Slides -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/img/slider/slider1.jpg" class="d-block w-100" alt="Slide 1" style="height: 80vh; object-fit: cover;">
                </div>
                <div class="carousel-item">
                    <img src="assets/img/slider/slider2.jpg" class="d-block w-100" alt="Slide 2" style="height: 80vh; object-fit: cover;">
                </div>
                <div class="carousel-item">
                    <img src="assets/img/slider/slider3.jpg" class="d-block w-100" alt="Slide 3" style="height: 80vh; object-fit: cover;">
                </div>
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <!-- hero slider area end -->

    <!-- featured product area start -->
    <section class="feature-product section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center" style="margin-bottom: 40px;">
                        <h2 class="title" style="font-size: 2.5rem; font-weight: 600;" >
                            Sản phẩm của chúng tôi
                        </h2>
                        <p class="sub-title" style="font-size: 1.2rem; color: #ccc; max-width: 600px; margin: 0 auto; line-height: 1.6; text-align: center;">
                            Khám phá các sản phẩm nổi bật, được cập nhật liên tục và mang lại những trải nghiệm tuyệt vời cho bạn.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-container">
                        <!-- Product tab content start -->
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab1">
                                <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                    <?php foreach ($listSanPham as $sanPham): ?>
                                        <div class="product-item" style="border: 1px solid #ddd; border-radius: 8px; overflow: hidden; margin-bottom: 20px; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                                            <figure class="product-thumb position-relative" style="border-bottom: 1px solid #ddd;">
                                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>" class="d-block" style="height: 250px; overflow: hidden;">
                                                    <img class="pri-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product" style="width: 100%; height: 100%; object-fit: cover;">
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
    <!-- featured product area end -->

    <!-- banner statistics area start -->
    <div class="banner-statistics-area py-5 bg-dark">
        <div class="container">
            <div class="row row-20 mtn-20">
                <div class="col-sm-6 mb-4 mb-sm-0">
                    <figure class="banner-statistics position-relative">
                        <a href="#">
                            <img src="assets/img/slider/slider1.jpg" alt="product banner" class="img-fluid">
                        </a>
                        <div class="banner-caption">
                            <h3 class="caption-title text-center text-white">Khám Phá Sản Phẩm Mới</h3>
                            <p class="caption-description text-center text-white">Tận hưởng những sản phẩm nước hoa mới nhất với mức giá ưu đãi hấp dẫn.</p>
                        </div>
                    </figure>
                </div>
                <div class="col-sm-6">
                    <figure class="banner-statistics position-relative">
                        <a href="#">
                            <img src="assets/img/slider/slider2.jpg" alt="product banner" class="img-fluid">
                        </a>
                        <div class="banner-caption">
                            <h3 class="caption-title text-center text-white">Giảm Giá Lớn</h3>
                            <p class="caption-description text-center text-white">Chương trình giảm giá lên đến 50% cho các sản phẩm nước hoa yêu thích của bạn!</p>
                        </div>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <!-- banner statistics area end -->

    <!-- product area start -->
    <section class="product-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Title Start -->
                    <div class="section-title text-center py-5">
                        <!-- Tiêu đề sử dụng kiểu chữ đậm, lớn và màu sắc bắt mắt -->
                        <h2 class="title mb-4 text-uppercase" style="font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 36px; color: #ff5a5f; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);">
                            Khám Phá Những Sản Phẩm Độc Đáo
                        </h2>
                        <!-- Mô tả được làm nổi bật với phông chữ mảnh, dễ đọc và khoảng cách giữa các chữ -->
                        <p class="sub-title mb-4 text-muted" style="font-family: 'Roboto', sans-serif; font-size: 18px; letter-spacing: 1px; line-height: 1.5;">
                            Tận hưởng những món quà tuyệt vời từ các thương hiệu nổi tiếng, cập nhật hàng tuần với ưu đãi hấp dẫn!
                        </p>
                        <!-- Thêm một đường kẻ nhấn mạnh -->
                        <div class="title-underline" style="width: 80px; height: 3px; background-color: #ff5a5f; margin: 0 auto 20px;"></div>

                    </div>
                    <!-- Section Title End -->
                </div>
            </div>



            <div class="row">
                <div class="col-12">
                    <div class="product-container">
                        <!-- Product tab content start -->
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab1">
                                <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                    <?php foreach ($listSanPham as $sanPham): ?>
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
    <!-- product area end -->



    <!-- group product start -->
    <section class="group-product-area section-padding" style="padding: 50px 0;">
        <div class="container">
            <div class="row">
                <!-- Sản phẩm bán chạy (Phần trái) -->
                <div class="col-lg-12">
                    <div class="section-header" style="text-align: center; margin-bottom: 30px;">
                        <h2 class="section-title" style="font-size: 30px; font-weight: bold; color: #333; text-transform: uppercase;">
                            Sản phẩm bán chạy
                        </h2>
                        <div class="section-line" style="width: 50px; height: 3px; background-color: #e74c3c; margin: 10px auto;"></div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="product-container">
                                <!-- Product tab content start -->
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tab1">
                                        <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                            <?php foreach ($listSanPham as $sanPham): ?>
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

                                <div class="section-line" style="width: 200px; height: 3px; background-color: #e74c3c; margin: 30px auto;"></div>

                                <!-- Product tab content start -->
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tab1">
                                        <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                            <?php foreach ($listSanPham as $sanPham): ?>
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


            </div>
        </div>
    </section>






    <!-- group product end -->
</main>




<?php require_once 'layout/footer.php'; ?>