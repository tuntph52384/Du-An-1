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
                    <img src="assets/img/slider/slider1.jpg" class="d-block w-100" alt="Slide 1" style="height: 50vh; object-fit: cover;">

                </div>
                <div class="carousel-item">
                    <img src="assets/img/slider/slider2.jpg" class="d-block w-100" alt="Slide 2" style="height: 50vh; object-fit: cover;">

                </div>
                <div class="carousel-item">
                    <img src="assets/img/slider/slider3.jpg" class="d-block w-100" alt="Slide 3" style="height: 50vh; object-fit: cover;">

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
    <!-- featured product area start -->
<section class="product-area section-padding">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <!-- Section Title Start -->
        <div class=" text-center py-5">
          <h2 class="title mb-4 text-uppercase">Khám Phá Những Sản Phẩm Độc Đáo</h2>
          <p class="sub-title mb-4">Tận hưởng những món quà tuyệt vời từ các thương hiệu nổi tiếng, cập nhật hàng tuần với ưu đãi hấp dẫn!</p>
          <div class="title-underline"></div>
        </div>
        <!-- Section Title End -->
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="product-grid">
          <?php foreach ($listSanPham as $index => $sanPham): ?>
            <?php if ($index < 8): // Hiển thị chỉ 8 sản phẩm (2 hàng, mỗi hàng 4 sản phẩm) ?>
              <div class="product-card">
                <figure class="product-image-wrapper">
                  <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>">
                    <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product" class="product-image">
                  </a>
                  <div class="product-badge">
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
                </figure>
                <div class="product-info text-center mt-2">
                  <h6 class="product-name">
                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>" class="text-decoration-none"><?= $sanPham['ten_san_pham'] ?></a>
                  </h6>
                  <div class="price-box">
                    <?php if ($sanPham['gia_khuyen_mai']): ?>
                      <span class="price-regular text-danger fw-bold"><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ' ?></span>
                      <br>
                      <span class="price-old text-muted"><del><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></del></span>
                    <?php else: ?>
                      <span class="price-regular text-primary fw-bold"><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></span>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- product area end -->






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
        
        
                                    </div>
                                </div>
                            </div>
                        </div>
        
        
                    </div>
                </div>
            </section>
    
    <!-- product area start -->
    <!-- product area start -->
<!-- product area start -->
<section class="product-area section-padding">
  <div class="container">
  <div class="row">
                <div class="col-12">
                    <div class="text-center mb-5">
                        <h2 class="title">Sản phẩm của chúng tôi</h2>
                        <p class="sub-title">
                            Khám phá các sản phẩm nổi bật, được cập nhật liên tục và mang lại những trải nghiệm tuyệt vời cho bạn.
                        </p>
                    </div>
                </div>
            </div>
    <div class="row">
      <div class="col-12">
        <div class="product-grid">
          <?php foreach ($listSanPham as $index => $sanPham): ?>
            <?php if ($index < 8): // Hiển thị chỉ 8 sản phẩm (2 hàng, mỗi hàng 4 sản phẩm) ?>
              <div class="product-card">
                <figure class="product-image-wrapper">
                  <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>">
                    <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product" class="product-image">
                  </a>
                  <div class="product-badge">
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
                </figure>
                <div class="product-info text-center mt-2">
                  <h6 class="product-name">
                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>" class="text-decoration-none"><?= $sanPham['ten_san_pham'] ?></a>
                  </h6>
                  <div class="price-box">
                    <?php if ($sanPham['gia_khuyen_mai']): ?>
                      <span class="price-regular text-danger fw-bold"><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ' ?></span>
                      <br>
                      <span class="price-old text-muted"><del><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></del></span>
                    <?php else: ?>
                      <span class="price-regular text-primary fw-bold"><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></span>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- product area end -->

<style>
.product-area {
  padding: 60px 0;
  background-color: #f8f9fa;
}

.text-center {
  text-align: center;
}

.title {
  font-family: 'Poppins', sans-serif;
  font-weight: 700;
  font-size: 36px;
  color: #ff5a5f;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
}

.sub-title {
  font-family: 'Roboto', sans-serif;
  font-size: 18px;
  letter-spacing: 1px;
  line-height: 1.5;
  color: #333;
  max-width: 600px;
  margin: 0 auto;
}

.title-underline {
  width: 80px;
  height: 3px;
  background-color: #ff5a5f;
  margin: 0 auto 20px;
}

.product-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr); /* Mỗi hàng có 4 sản phẩm */
  gap: 20px;
}

.product-card {
  border: 1px solid #ddd;
  border-radius: 8px;
  overflow: hidden;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  background-color: #fff;
}

.product-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

.product-image-wrapper {
  position: relative;
  overflow: hidden;
}

.product-image {
  width: 100%;
  height: 250px;
  object-fit: cover;
  display: block;
}

.product-badge {
  position: absolute;
  top: 10px;
  left: 10px;
}

.product-info {
  padding: 15px;
  text-align: center;
}

.product-name {
  margin-bottom: 10px;
  font-size: 1.1rem;
  color: #333;
}

.price-box {
  font-size: 1rem;
}

.price-regular {
  color: #e74c3c;
  font-weight: bold;
}

.price-old {
  font-size: 0.9rem;
  color: #999;
  text-decoration: line-through;
}
</style>





</main>




<?php require_once 'layout/footer.php'; ?>