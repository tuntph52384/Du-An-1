<?php
class AdminDanhMuc
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllDanhMuc()
    {
        try {
            $sql = "SELECT *FROM danh_mucs ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function insertDanhMuc($ten_danh_muc, $mo_ta, $ngay_tao)
    {

        try {
            $sql = "INSERT INTO danh_mucs (ten_danh_muc, mo_ta, ngay_tao) VALUES (:ten_danh_muc, :mo_ta, :ngay_tao)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ":ten_danh_muc" => $ten_danh_muc,
                ":mo_ta" => $mo_ta,
                ":ngay_tao" => $ngay_tao,

            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function getDetailDanhMuc($id)
    {
        try {
            $sql = "SELECT * FROM danh_mucs WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(["id" => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function updateDanhMuc($id, $ten_danh_muc, $mo_ta, $ngay_tao)
    {
        try {
            $sql = "UPDATE danh_mucs SET ten_danh_muc = :ten_danh_muc, mo_ta = :mo_ta, ngay_tao = :ngay_tao WHERE id= :id ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([

                "id" => $id,
                "ten_danh_muc" => $ten_danh_muc,
                "mo_ta" => $mo_ta,
                "ngay_tao" => $ngay_tao,
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function destroyDanhMuc($id)
    {
        try {
            $sql = "DELETE FROM danh_mucs WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ":id" => $id
            ]);

            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
}
