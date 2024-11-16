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


    public function formAddDanhMuc(): void{
        require_once './views/danhmuc/addDanhMuc.php';
    }

    public function postAddDanhMuc(): void{
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];

            date_default_timezone_set('Asia/Ho_Chi_Minh');  // Thêm múi giờ Việt Nam
            $ngay_tao = date('Y-m-d H:i:s');


            $errors =[];
            if(empty($ten_danh_muc)){
                $errors['ten_danh_muc'] = 'Tên danh mục không được bỏ trống';
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

    public function formEditDanhMuc(){
            $id = $_GET['id_danh_muc'];
            $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
            if($danhMuc){
                require_once './views/danhmuc/editDanhMuc.php';

            }else{
                header("Location: " .BASE_URL_ADMIN. '?act=danh-muc');
                exit();
            }


    }

    public function postEditDanhMuc(){
        // Hàm này dùng để xử lý thêm dữ liệu

        // Kiểm tra xem dữ liệu có phải đc submit lên ko
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dữ liệu
            $id = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];
            $ngay_tao = $_POST['ngay_tao'];

            // Tạo 1 mảng trống để chứa dữ liệu
            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không được bỏ trống';
            }

            // Nếu ko có lỗi thì tiến hành sửa danh mục
            if (empty($errors)) {
                // Nếu ko có lỗi thì tiến hành sửa danh mục
                $this->modelDanhMuc->updateDanhMuc($id, $ten_danh_muc, $mo_ta, $ngay_tao);

                header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            } else {
                // Trả về form và lỗi
                $danhMuc = ['id' => $id, 'ten_danh_muc' => $ten_danh_muc, 'mo_ta' => $mo_ta];
                require_once './views/danhmuc/editDanhMuc.php';
            }
        }
    }
    public function deleteDanhMuc()
    {
        $id = $_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);

        if ($danhMuc) {
            $this->modelDanhMuc->destroyDanhMuc($id);
        }

        header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
        exit();
    }
 }