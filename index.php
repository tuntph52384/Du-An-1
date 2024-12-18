<?php 
session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';

// Require toàn bộ file Models
require_once './models/SanPham.php';
require_once './models/TaiKhoan.php';
require_once './models/GioHang.php';
require_once './models/DonHang.php';


// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // route
    '/' => (new HomeController())->home(), // trường hợp đặc biệt

    'danh-sach-san-pham'=> (new HomeController())->danhSachSanPham(),


    'chi-tiet-san-pham' => (new HomeController())->chiTietSanPham(),

    'them-gio-hang' => (new HomeController())->addGioHang(),

    'gio-hang' => (new HomeController())->gioHang(),
    'thanh-toan' => (new HomeController())->thanhToan(),
    'xu-ly-thanh-toan' => (new HomeController())->postThanhToan(),
    'lich-su-mua-hang' => (new HomeController())->lichSuMuaHang(),
    'chi-tiet-mua-hang' => (new HomeController())->chiTietMuaHang(),
    'huy-don-hang' => (new HomeController())->huyDonHang(),

    'update-cart' => (new HomeController())->updateGioHang(),
    'remove-item' => (new HomeController())->removeFromGioHang($_GET['id']),


    
    'form-them-tai-khoan' => (new HomeController())->formRegister(),
    'them-tai-khoan' => (new HomeController())->postRegister(),


     // Auth
     'login'=> (new HomeController())-> formLogin(),
     'check-login'=> (new HomeController())-> postLogin(),
     'logout'=> (new HomeController())-> logout(),
    
     'tai-khoan-ca-nhan'=> (new HomeController())-> taiKhoanCaNhan(),
     'update-ca-nhan'=> (new HomeController())-> postEditCaNhan(),
     'doi-mat-khau'=> (new HomeController())-> doiMatKhau(),
     

};