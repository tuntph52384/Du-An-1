<?php

class HomeController
{
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;
    public $modelDonHang;



    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelGioHang = new GioHang();
        $this->modelDonHang = new DonHang();
    }
    public function home()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/home.php';
    }
    public function danhSachSanPham()
    {
        // echo "Đây là danh sách sản phẩm";
        $listProduct = $this->modelSanPham->getAllProduct();
        // var_dump($listProduct); die();
        require_once './views/listProduct.php';
    }
    public function chiTietSanPham()
    {
        $id = $_GET['id_san_pham'];

        $sanPham = $this->modelSanPham->getDetailSanPham($id);

        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);

        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);

        $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamDanhMuc($sanPham['danh_muc_id']);

        if ($sanPham) {
            require_once './views/detailSanPham.php';
        } else {
            header("Location:" . BASE_URL);
            exit();
        }
    }


    public function formLogin()
    {
        require_once './views/auth/formLogin.php';

        deleteSessionError();
    }

    public function formRegister()
    {
        require_once './views/auth/formRegister.php';

        deleteSessionError();
    }
    public function postRegister()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'] ?? '';
            $mat_khau = $_POST['mat_khau'] ?? '';
            $ho_ten = $_POST['ho_ten'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';

            $errors = [];

            if (empty($email)) {
                $errors['email'] = 'Email không được bỏ trống';
            }
            if (empty($mat_khau)) {
                $errors['mat_khau'] = 'Mật khẩu không được bỏ trống';
            }
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ tên không được bỏ trống';
            }
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Số điện thoại không được bỏ trống';
            }

            $_SESSION['error'] = $errors;


            if (empty($errors)) {
                $mat_khau = password_hash($mat_khau, PASSWORD_BCRYPT);
                $chuc_vu_id = 2;

                $this->modelTaiKhoan->insertTaiKhoan($ho_ten, $email, $mat_khau, $so_dien_thoai, $chuc_vu_id);

                // Lưu thông báo thành công vào session
                $_SESSION['success'] = "Đăng ký tài khoản thành công!";
                header("Location: " . BASE_URL . '?act=login');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL . '?act=form-them-tai-khoan');
                exit();
            }
        }
    }



    public function logout()
    {
        unset($_SESSION['user_client']);
        header("Location: " . BASE_URL);
        exit();
    }
    public function postLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy email và pass gửi lên từ form
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Xử lý kiểm tra thông tin đăng nhập

            $user = $this->modelTaiKhoan->checkLogin($email, $password);

            if ($user == $email) { // trường hợp đăng nhập thành công
                // Lưu thông tin vào session
                $_SESSION['user_client'] = $user;

                header("Location: " . BASE_URL);
                exit();
            } else {
                // Lỗi thì lưu vào session
                $_SESSION['error'] = $user;

                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL . '?act=login');
            }
        }
    }


    public function addGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Kiểm tra người dùng đã đăng nhập hay chưa
            if (isset($_SESSION['user_client'])) {
                $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
                $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);

                // Nếu không có giỏ hàng thì tạo mới
                if (!$gioHang) {
                    $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                    $gioHang = ['id' => $gioHangId];
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                } else {
                    // Lấy chi tiết giỏ hàng
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                }

                $sanPhamId = $_POST['san_pham_id'];
                $soLuong = $_POST['so_luong'];

                // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
                $checkSanPham = false;
                foreach ($chiTietGioHang as $detail) {
                    if ($detail['san_pham_id'] == $sanPhamId) {
                        // Cập nhật số lượng nếu sản phẩm đã có trong giỏ hàng
                        $newSoLuong = $detail['so_luong'] + $soLuong;
                        $this->modelGioHang->updateSoLuong($gioHang['id'], $sanPhamId, $newSoLuong);
                        $checkSanPham = true;
                        break;
                    }
                }

                // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới
                if (!$checkSanPham) {
                    $this->modelGioHang->addDetailGioHang($gioHang['id'], $sanPhamId, $soLuong);
                }

                // Chuyển hướng đến giỏ hàng
                header("Location: " . BASE_URL . '?act=gio-hang');
                exit();
            } else {
                // Nếu người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
                header("Location: " . BASE_URL . '?act=login');
                exit();
            }
        }
    }


    public function gioHang()
    {
        if (isset($_SESSION['user_client'])) {
            $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);

            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }

            // Hiển thị giỏ hàng
            require_once './views/gioHang.php';
        } else {
            // Nếu chưa đăng nhập, chuyển đến trang đăng nhập
            header("Location: " . BASE_URL . '?act=login');
        }
    }

    public function updateGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_SESSION['user_client'])) {
                // Lấy thông tin người dùng từ email
                $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
                // Lấy giỏ hàng của người dùng
                $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);

                if ($gioHang) {
                    // Lặp qua từng sản phẩm trong giỏ và cập nhật số lượng
                    foreach ($_POST['quantity'] as $sanPhamId => $soLuong) {
                        $this->modelGioHang->updateSoLuong($gioHang['id'], $sanPhamId, $soLuong);
                    }

                    // Sau khi cập nhật, chuyển hướng đến trang giỏ hàng
                    header("Location: " . BASE_URL . '?act=gio-hang');
                    exit();
                }
            } else {
                // Nếu người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
                header("Location: " . BASE_URL . '?act=login');
                exit();
            }
        }
    }




    public function removeFromGioHang($sanPhamId)
    {
        if (isset($_SESSION['user_client'])) {
            // Lấy thông tin người dùng từ email
            $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            // Lấy giỏ hàng của người dùng
            $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);

            if ($gioHang) {
                // Xóa sản phẩm khỏi giỏ hàng
                $this->modelGioHang->removeProductFromGioHang($gioHang['id'], $sanPhamId);

                // Sau khi xóa, chuyển hướng đến trang giỏ hàng
                header("Location: " . BASE_URL . '?act=gio-hang');
                exit();
            }
        } else {
            // Nếu người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
            header("Location: " . BASE_URL . '?act=login');
            exit();
        }
    }





    public function thanhToan()
    {
        if (isset($_SESSION['user_client'])) {
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);
            $chiTietGioHang = $gioHang ? $this->modelGioHang->getDetailGioHang($gioHang['id']) : [];

            // Kiểm tra nếu giỏ hàng trống
            if (empty($chiTietGioHang)) {
                $_SESSION['error'] = "Giỏ hàng của bạn đang trống. Vui lòng thêm sản phẩm để đặt hàng.";
                header("Location: " . BASE_URL . '?act=gio-hang');
                exit(); // Ngăn chặn truy cập tiếp theo
            }

            // Nếu giỏ hàng không trống, hiển thị trang thanh toán
            require_once './views/thanhToan.php';
        } else {
            // Nếu chưa đăng nhập, chuyển đến trang đăng nhập
            header("Location: " . BASE_URL . '?act=login');
            exit();
        }
    }





    public function postThanhToan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
            $ghi_chu = $_POST['ghi_chu'];
            $tong_tien = $_POST['tong_tien'];
            $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];

            $ngay_dat = date('Y-m-d');
            $trang_thai_id = 1;
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];
            $ma_don_hang = "NH" . rand(10000, 99999);

            $donHang = $this->modelDonHang->addDonHang(
                $ten_nguoi_nhan,
                $email_nguoi_nhan,
                $sdt_nguoi_nhan,
                $dia_chi_nguoi_nhan,
                $ghi_chu,
                $tong_tien,
                $phuong_thuc_thanh_toan_id,
                $ngay_dat,
                $trang_thai_id,
                $tai_khoan_id,
                $ma_don_hang
            );

            $gioHang = $this->modelGioHang->getGioHangFromUser($tai_khoan_id);

            if ($donHang) {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                foreach ($chiTietGioHang as $item) {
                    $donGia = $item['gia_khuyen_mai'] ?? $item['gia_san_pham'];
                    $this->modelDonHang->addChiTietDonHang(
                        $donHang,
                        $item['san_pham_id'],
                        $item['so_luong'],
                        $donGia,
                        $donGia * $item['so_luong']
                    );
                }

                $this->modelGioHang->clearDetailGioHang($gioHang['id']);
                $this->modelGioHang->clearGioHang($tai_khoan_id);

                // Lưu thông báo thanh toán thành công vào session
                $_SESSION['success'] = "Thanh toán thành công! Mã đơn hàng của bạn là $ma_don_hang.";

                header("Location: " . BASE_URL . '?act=lich-su-mua-hang');
                exit();
            } else {
                echo "Lỗi khi thanh toán. Vui lòng thử lại!";
                exit();
            }
        }
    }




    public function lichSuMuaHang()
    {
        if (isset($_SESSION['user_client'])) {
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];

            $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
            $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');


            $arrPhuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
            $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');

            $donHangs = $this->modelDonHang->getDonHangFromUser($tai_khoan_id);

            require_once './views/lichSuMuaHang.php';
            // var_dump($donHangs);

        } else {
            var_dump('Ban chua dang nhap');
            die;
        }
    }

    public function chiTietMuaHang()
    {
        if (isset($_SESSION['user_client'])) {
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];

            $donHangId = $_GET['id'];

            $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
            $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');


            $arrPhuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
            $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');

            $donHang = $this->modelDonHang->getDonHangById($donHangId);

            $chiTietDonHang = $this->modelDonHang->getChiTietDonHangByDonHangId($donHangId);

            if ($donHang['tai_khoan_id'] != $tai_khoan_id) {
                echo "Ban khong co quyen xem chi tiet don hang nay";
                exit;
            }

            require_once './views/chiTietMuaHang.php';
        } else {
            var_dump('Ban chua dang nhap');
            die;
        }
    }

    public function huyDonHang()
    {
        if (isset($_SESSION['user_client'])) {
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];

            $donHangId = $_GET['id'];
            $donHang = $this->modelDonHang->getDonHangById($donHangId);

            if ($donHang['tai_khoan_id'] != $tai_khoan_id) {
                echo "Ban khong co quyen huy don hang nay";
                exit;
            }
            if ($donHang['trang_thai_id'] != 1) {
                echo "Chỉ đơn hàng ở trạng thái 'Chưa xác nhận' mới có thể hủy";
                exit;
            }

            $this->modelDonHang->updateTrangThaiDonHang($donHangId, 6);

            header("Location: " . BASE_URL . '?act=lich-su-mua-hang');
            exit();
        } else {
            var_dump('Ban chua dang nhap');
            die;
        }
    }    
}
