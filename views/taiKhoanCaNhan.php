<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>

<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container" style="text-align: center">
            <h1 class="page-title">Thông tin cá nhân</h1>
        </div>
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="container">
            <div class="profile-wrapper">
                <!-- Avatar Section -->
                <div class="profile-sidebar">
                    <div class="avatar-container">
                        <img src="<?= BASE_URL . $thongTin['anh_dai_dien'] ?>" alt="Avatar" class="avatar"
                            onerror="this.onerror=null; this.src='https://e7.pngegg.com/pngimages/178/595/png-clipart-user-profile-computer-icons-login-user-avatars-monochrome-black.png'">
                        <h2 class="user-name"><?= $thongTin['ho_ten'] ?></h2>
                        <p class="user-role">Chức vụ: <?= $thongTin['chuc_vu_id'] ?></p>
                    </div>
                </div>



                <!-- Info Section -->
                <div class="profile-content">
                    <!-- Update Info Form -->
                    <div class="card">
                        <h2>Cập nhật thông tin</h2>
                     <hr>

                        <form action="<?= BASE_URL . '?act=update-ca-nhan' ?>" method="post">

                            <?php if (isset($_SESSION['success'])): ?>
                                <div class="alert alert-success" id="success-alert">
                                    <?= $_SESSION['success']; ?>
                                    <button type="button" class="close" onclick="document.getElementById('success-alert').style.display='none';">&times;</button>
                                </div>
                                <?php unset($_SESSION['success']); ?>
                            <?php endif; ?>

                            <?php if (isset($_SESSION['error']['general'])): ?>
                                <div class="alert alert-danger" id="error-alert">
                                    <?= $_SESSION['error']['general']; ?>
                                    <button type="button" class="close" onclick="document.getElementById('error-alert').style.display='none';">&times;</button>
                                </div>
                                <?php unset($_SESSION['error']['general']); ?>
                            <?php endif; ?>
                            <div class="form-row">
                                <label for="ho_ten">Họ tên</label>
                                <input type="text" id="ho_ten" name="ho_ten" value="<?= $thongTin['ho_ten'] ?>" placeholder="Nhập họ tên">
                            </div>

                            <div class="form-row">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" value="<?= $thongTin['email'] ?>" placeholder="Nhập email">
                            </div>

                            <div class="form-row">
                                <label for="so_dien_thoai">Số điện thoại</label>
                                <input type="text" id="so_dien_thoai" name="so_dien_thoai" value="<?= $thongTin['so_dien_thoai'] ?>" placeholder="Nhập số điện thoại">
                            </div>

                            <div class="form-row">
                                <label for="ngay_sinh">Ngày sinh</label>
                                <input type="date" id="ngay_sinh" name="ngay_sinh" value="<?= $thongTin['ngay_sinh'] ?>">
                            </div>

                            <div class="form-row">
                                <label for="gioi_tinh">Giới tính</label>
                                <select id="gioi_tinh" name="gioi_tinh">
                                    <option value="1" <?= $thongTin['gioi_tinh'] == '1' ? 'selected' : '' ?>>Nam</option>
                                    <option value="0" <?= $thongTin['gioi_tinh'] == '0' ? 'selected' : '' ?>>Nữ</option>
                                </select>
                            </div>
                            <br>

                            <div class="form-row">
                                <label for="dia_chi">Địa chỉ</label>
                                <input type="text" id="dia_chi" name="dia_chi" value="<?= $thongTin['dia_chi'] ?>" placeholder="Nhập địa chỉ">
                            </div>

                            <!-- Hiển thị trạng thái tài khoản mà không cho phép thay đổi -->
                            <div class="form-row">
                                <label for="trang_thai">Trạng thái tài khoản</label>
                                <input type="text" id="trang_thai" value="<?= $thongTin['trang_thai'] == 1 ? 'Active' : 'Inactive' ?>" disabled>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                            </div>
                        </form>


                    </div>

                    <!-- Change Password Form -->
                    <div class="card">
                        <h2>Đổi mật khẩu</h2>
                        <form action="<?= BASE_URL . '?act=doi-mat-khau' ?>" method="post">
                            <div class="form-row">
                                <label for="old_pass">Mật khẩu cũ</label>
                                <input type="password" id="old_pass" name="old_pass" placeholder="Nhập mật khẩu cũ">
                            </div>

                            <div class="form-row">
                                <label for="new_pass">Mật khẩu mới</label>
                                <input type="password" id="new_pass" name="new_pass" placeholder="Nhập mật khẩu mới">
                            </div>

                            <div class="form-row">
                                <label for="confirm_pass">Nhập lại mật khẩu mới</label>
                                <input type="password" id="confirm_pass" name="confirm_pass" placeholder="Nhập lại mật khẩu mới">
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-secondary">Lưu thay đổi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php require_once 'layout/footer.php'; ?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const successAlert = document.getElementById('success-alert');
        const errorAlert = document.getElementById('error-alert');

        if (successAlert) {
            setTimeout(() => {
                successAlert.style.display = 'none';
            }, 5000); // Tự động ẩn sau 5 giây
        }

        if (errorAlert) {
            setTimeout(() => {
                errorAlert.style.display = 'none';
            }, 5000); // Tự động ẩn sau 5 giây
        }
    });
</script>
<style>
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 5px;
        position: relative;
        font-size: 14px;
    }

    .alert-success {
        background-color: #4CAF50;
        /* Màu xanh lá */
        color: white;
    }

    .alert-danger {
        background-color: #f44336;
        /* Màu đỏ */
        color: white;
    }

    .alert .close {
        position: absolute;
        top: 10px;
        right: 15px;
        color: white;
        font-size: 20px;
        font-weight: bold;
        cursor: pointer;
    }

    /* General Layout */
    .profile-wrapper {
        display: flex;
        gap: 20px;
    }

    .profile-sidebar {
        flex: 1;
        max-width: 300px;
    }

    .profile-content {
        flex: 2;
    }

    /* Avatar Section */
    .avatar-container {
        text-align: center;
        padding: 20px;
        background: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-bottom: 15px;
    }

    .user-name {
        font-size: 18px;
        font-weight: bold;
    }

    .user-role {
        font-size: 14px;
        color: #555;
    }

    /* Form Section */
    .card {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .form-row {
        margin-bottom: 15px;
        display: flex;
        flex-direction: column;
        /* Căn thẳng hàng theo chiều dọc */
    }



    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #333;
    }

    input,
    select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    /* Đặc biệt cho các trường có nội dung dài */
    input#dia_chi {
        min-height: 40px;
        /* Tăng chiều cao nếu cần */
    }


    /* Buttons */
    .btn {
        padding: 10px 15px;
        border-radius: 5px;
        text-align: center;
        cursor: pointer;
        border: none;
        color: #fff;
    }

    .btn-primary {
        background-color: #007bff;
    }

    .btn-secondary {
        background-color: #6c757d;
    }

    .btn:hover {
        opacity: 0.9;
    }
</style>