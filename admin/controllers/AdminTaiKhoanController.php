<?php

class AdminTaiKhoanController
{
    public $modelTaiKhoan;
    public $modelDonHang;
    public $modelSanPham;

    public function __construct()
    {
        $this->modelTaiKhoan = new AdminTaiKhoan();
        $this->modelDonHang = new AdminDonHang();
        $this->modelSanPham = new AdminSanPham();
    }

    public function danhSachQuanTri()
    {
        $listQuanTri = $this->modelTaiKhoan->getAllTaiKhoan(1);

        require_once './views/taikhoan/quantri/listQuanTri.php';
    }

    public function formAddQuanTri()
    {
        require_once './views/taikhoan/quantri/addQuanTri.php';

        deleteSessionError();
    }

    public function postAddQuanTri()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $mat_khau = $_POST['mat_khau'] ?? '';

            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ tên không được bỏ trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được bỏ trống';
            }
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Số điện thoại không được bỏ trống';
            }
            if (empty($mat_khau)) {
                $errors['mat_khau'] = 'Mật khẩu không được bỏ trống';
            } elseif (strlen($mat_khau) < 6) {
                $errors['mat_khau'] = 'Mật khẩu phải có ít nhất 6 ký tự';
            }

            $_SESSION['error'] = $errors;

            if (empty($errors)) {
                $hashedPassword = password_hash($mat_khau, PASSWORD_BCRYPT);
                $chuc_vu_id = 1;

                $this->modelTaiKhoan->insertTaiKhoan($ho_ten, $email, $hashedPassword, $chuc_vu_id, $so_dien_thoai);

                header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-them-quan-tri');
                exit();
            }
        }
    }


    public function formEditQuanTri()
    {
        $id_quan_tri = $_GET['id_quan_tri'];

        $quanTri = $this->modelTaiKhoan->getDetailTaiKhoan($id_quan_tri);

        require_once './views/taikhoan/quantri/editQuanTri.php';

        deleteSessionError();
    }

    public function postEditQuanTri()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['quan_tri_id'] ?? '';
            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $mat_khau = $_POST['mat_khau'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
    
            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ tên không được bỏ trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được bỏ trống';
            }
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Số điện thoại không được bỏ trống';
            }
    
            if (empty($mat_khau)) {
                $mat_khau = $this->modelTaiKhoan->getDetailTaiKhoan($id)['mat_khau'];  // Giữ mật khẩu cũ nếu không thay đổi
            } elseif (strlen($mat_khau) < 6) {
                $errors['mat_khau'] = 'Mật khẩu phải có ít nhất 6 ký tự';
            } else {
                $mat_khau = password_hash($mat_khau, PASSWORD_BCRYPT);  // Mã hóa mật khẩu mới
            }
    
            $_SESSION['error'] = $errors;
    
            if (empty($errors)) {
                // Cập nhật tài khoản
                $this->modelTaiKhoan->updateTaiKhoan($id, $ho_ten, $email, $so_dien_thoai, $trang_thai, $mat_khau);
    
                // Lưu thông báo thành công
                $_SESSION['flash'] = 'Cập nhật tài khoản thành công!';
    
                // Điều hướng về trang danh sách tài khoản
                header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                exit();
            } else {
                // Trả về lỗi và giữ thông tin nhập vào
                $_SESSION['flash'] = null;
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-quan-tri&id=' . $id);
                exit();
            }
        }
    }
    


    public function resetPassword()
    {
        $tai_khoan_id = $_GET['id_quan_tri'];
        $tai_khoan = $this->modelTaiKhoan->getDetailTaiKhoan($tai_khoan_id);
        // Đặt password mặc định - 123@123ab
        $password = password_hash('123@123ab', PASSWORD_BCRYPT);

        $status = $this->modelTaiKhoan->resetPassword($tai_khoan_id, $password);

        if ($status && $tai_khoan['chuc_vu_id'] == 1) {
            header("Location:" . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
            exit();
        } elseif ($status && $tai_khoan['chuc_vu_id'] == 2) {
            header("Location:" . BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang');
            exit();
        } else {
            var_dump('Lỗi khi reset tài khoản');
            die;
        }
    }

    public function danhSachKhachHang()
    {
        $listKhachHang = $this->modelTaiKhoan->getAllTaiKhoan(2);

        require_once './views/taikhoan/khachhang/listKhachHang.php';
    }

    public function formEditKhachHang()
    {
        $id_khach_hang = $_GET['id_khach_hang'];

        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);

        require_once './views/taikhoan/khachhang/editKhachHang.php';

        deleteSessionError();
    }

    public function postEditKhachHang()
    {
        // kiểm tra xem dữ liệu có được submit lên không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy ra dữ liệu\
            // Lấy ra dữ liệu cũ của sản phẩm
            $khach_hang_id = $_POST['khach_hang_id'] ?? '';

            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $ngay_sinh = $_POST['ngay_sinh'] ?? '';
            $gioi_tinh = $_POST['gioi_tinh'] ?? '';
            $dia_chi = $_POST['dia_chi'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';

            // tạo 1 mảng trống để chứa dữ liệu
            $errors = [];

            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên người dùng không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email người dùng không được để trống';
            }
            if (empty($ngay_sinh)) {
                $errors['ngay_sinh'] = 'Ngày sinh người dùng không được để trống';
            }
            if (empty($gioi_tinh)) {
                $errors['gioi_tinh'] = 'Giới tính người dùng không được để trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Vui lòng chọ trạng thái';
            }

            $_SESSION['error'] = $errors;

            // nếu không có lỗi tiến hành sửa
            if (empty($errors)) {
                // nếu không có lỗi tiến hành thêm sản phẩm
                $this->modelTaiKhoan->updateKhachHang(
                    $khach_hang_id,
                    $ho_ten,
                    $email,
                    $so_dien_thoai,
                    $ngay_sinh,
                    $gioi_tinh,
                    $dia_chi,
                    $trang_thai
                );

                header("Location:" . BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang');
                exit();
            } else {
                // trả về form và lỗi
                // Đặt chỉ thị xóa session sau khi hiển thị form
                $_SESSION['flash'] = true;
                header("Location:" . BASE_URL_ADMIN . '?act=form-sua-khach-hang&id_khach_hang=' . $khach_hang_id);
                exit();
            }
        }
    }

    public function detailKhachHang()
    {
        $id_khach_hang = $_GET['id_khach_hang'];

        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);

        $listDonHang = $this->modelDonHang->getDonHangFromKhachHang($id_khach_hang);

        $listBinhLuan = $this->modelSanPham->getBinhLuanFromKhachHang($id_khach_hang);

        require_once './views/taikhoan/khachhang/detailKhachHang.php';
    }

    // phần login, logout

    public function formLogin()
    {
        require_once './views/auth/formLogin.php';

        deleteSessionError();
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy email và pass gửi lên từ form
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Xử lý kiểm tra thông tin đăng nhập

            $user = $this->modelTaiKhoan->checkLogin($email, $password);

            if ($user == $email) { // trường hợp đăng nhập thành công
                // Lưu thông tin vào session
                $_SESSION['user_admin'] = $user;

                header("Location: " . BASE_URL_ADMIN);
                exit();
            } else {
                // Lỗi thì lưu vào session
                $_SESSION['error'] = $user;

                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL_ADMIN . '?act=login-admin');
                exit();
            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION['user_admin'])) {

            unset($_SESSION['user_admin']);

            header("Location: " . BASE_URL_ADMIN . '?act=login-admin');
        }
    }

    // Kết thúc login, logout

}
