<?php
 class AdminDanhMucController{
    public $modelDanhMuc;

    public function __construct(){
        $this->modelDanhMuc = new AdminDanhMuc();
    }


    public function danhSachDanhMuc(){
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/danhmuc/listDanhMuc.php';
    }


    public function formAddDanhMuc(){
        require_once './views/danhmuc/addDanhMuc.php';
    }

    public function postAddDanhMuc(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];
            $ngay_tao = $_POST['ngay_tao'];


            $errors =[];
            if(empty($ten_danh_muc)){
                $errors['ten_danh_muc'] = 'Tên danh mục không được bỏ trống';
            }
            if(empty($ngay_tao)){
                $errors['ngay_tao'] = 'Ngày tạo không được bỏ trống';
            }

            if(empty($errors)){
                $this->modelDanhMuc->insertDanhMuc($ten_danh_muc, $mo_ta, $ngay_tao);
                header("Location: ".BASE_URL_ADMIN.'?act=danh-muc');
                exit();

            }else{
                require_once './views/danhmuc/addDanhMuc.php';
            }
        }
    }
 }