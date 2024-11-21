<?php

// Kết nối CSDL qua PDO
function connectDB() {
    // Kết nối CSDL
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);

        // cài đặt chế độ báo lỗi là xử lý ngoại lệ
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // cài đặt chế độ trả dữ liệu
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
        return $conn;
    } catch (PDOException $e) {
        echo ("Connection failed: " . $e->getMessage());
    }
}
// thêm file
function uploadFile($file, $folderUpload)
{
    $pathStorage = $folderUpload . time() . $file['name'];

    $form = $file['tmp_name'];
    $to = PATH_ROOT . $pathStorage;

    if (move_uploaded_file($form, $to)) {
        return $pathStorage;
    }
    return null;
}
// xóa file
function deleteFile($file)
{
    $pathDelete = PATH_ROOT . $file;
    if (file_exists($pathDelete)) {
        unlink($pathDelete);
    }
}

// Xóa Session sau khi load trang
function deleteSessionError()
{
    if (isset($_SESSION['flash'])) {

        unset($_SESSION['flash']);

        unset($_SESSION['error']);
        // session_unset();
        // session_destroy();
    }
}

// Upload - Update album ảnh
function uploadFileAlbum($file, $folderUpload, $key)
{
    $pathStorage = $folderUpload . time() . $file['name'][$key];

    $form = $file['tmp_name'][$key];
    $to = PATH_ROOT . $pathStorage;

    if (move_uploaded_file($form, $to)) {
        return $pathStorage;
    }
    return null;
}

// formatDate
function formatDate($date)
{
    return date("d-m-Y", strtotime($date));
}

function checkLoginAdmin(){
    if(!isset($_SESSION['user_admin'])){ // không có session thì redirect về trang login
        // header("Location: " . BASE_URL_ADMIN . '?act=login-admin');
        require_once './views/auth/formLogin.php';
        exit();
    }
}
function formatPrice($price){
    return number_format($price, 0, ',','.');
}