<?php
class AdminBinhLuan
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    // Lấy tất cả bình luận
    public function getAllBinhLuans()
    {
        try {
            $sql = "SELECT * FROM binh_luans";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    // Cập nhật trạng thái bình luận
    public function updateTrangThai($id, $trang_thai)
    {
        try {
            $sql = "UPDATE binh_luans SET trang_thai = :trang_thai WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':trang_thai' => $trang_thai,
                ':id' => $id
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }
}
