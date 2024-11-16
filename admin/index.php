<?php 
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/AdminBaoCaoThongKeController.php';
require_once './controllers/AdminDanhMucController.php';

// Require toàn bộ file Models
require_once './models/AdminDanhMuc.php';


// Route
 $act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // route
    '/' => (new AdminBaoCaoThongKeController())->home(),
    // route danh mục
    'danh-muc' =>(new AdminDanhMucController())->danhSachDanhMuc(),

    'form-them-danh-muc' =>(new AdminDanhMucController())->formAddDanhMuc(),

    'them-danh-muc' =>(new AdminDanhMucController())->postAddDanhMuc(),

    'form-sua-danh-muc' => (new AdminDanhMucController())->formEditDanhMuc(),

    'sua-danh-muc' => (new AdminDanhMucController())->postEditDanhMuc(),

    'xoa-danh-muc' => (new AdminDanhMucController())->deleteDanhMuc(),
};