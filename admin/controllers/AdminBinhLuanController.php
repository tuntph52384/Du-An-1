<?php

class AdminBinhLuanController
{
    public $modelBinhLuan;

    public function __construct(){
        $this->modelBinhLuan = new AdminBinhLuan();
    }
    // Hiển thị danh sách bình luận
    public function danhSachBinhLuans()
    {
        $binh_luans = $this->modelBinhLuan->getAllBinhLuans(); // Lấy danh sách bình luận từ model
        require_once './views/binhluan/listBinhLuan.php'; // Gọi view
    }

    // Cập nhật trạng thái bình luận
    public function updateTrangThaiBinhLuan()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            $trang_thai = $_POST['trang_thai'] ?? null;

            if (!$id || !$trang_thai) {
                $_SESSION['errors'] = 'Dữ liệu không hợp lệ!';
                header("Location: " . BASE_URL_ADMIN . '?act=list-binh-luans');
                exit();
            }

            // Cập nhật trạng thái
            $status = $this->modelBinhLuan->updateTrangThai($id, $trang_thai);
            if ($status) {
                $_SESSION['success'] = 'Cập nhật trạng thái bình luận thành công!';
            } else {
                $_SESSION['errors'] = 'Lỗi khi cập nhật trạng thái!';
            }
            header("Location: " . BASE_URL_ADMIN . '?act=list-binh-luans');
            exit();
        }
    }
}

