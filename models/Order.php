<?php

class Order
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function CreateOrder($userID, $name, $email, $phone, $address, $note, $total, $payment, $date, $statusID, $code)
    {
        try {
            $sql = 'INSERT INTO don_hangs (tai_khoan_id, ten_nguoi_nhan, email_nguoi_nhan, sdt_nguoi_nhan, dia_chi_nguoi_nhan, ghi_chu, tong_tien, phuong_thuc_thanh_toan_id, ngay_dat, trang_thai_id, ma_don_hang) 
            VALUES (:tai_khoan_id, :ten_nguoi_nhan, :email_nguoi_nhan, :sdt_nguoi_nhan, :dia_chi_nguoi_nhan, :ghi_chu, :tong_tien, :phuong_thuc_thanh_toan_id, :ngay_dat, :trang_thai_id, :ma_don_hang)';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':tai_khoan_id' => $userID,
                ':ten_nguoi_nhan' => $name,
                ':email_nguoi_nhan' => $email,
                ':sdt_nguoi_nhan' => $phone,
                ':dia_chi_nguoi_nhan' => $address,
                ':ghi_chu' => $note,
                ':tong_tien' => $total,
                ':phuong_thuc_thanh_toan_id' => $payment,
                ':ngay_dat' => $date,
                ':trang_thai_id' => $statusID,
                ':ma_don_hang' => $code
            ]);

            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function AddDetailOrder($orderID, $productID, $price, $quantity, $total)
    {
        try {
            $sql = 'INSERT INTO chi_tiet_don_hangs (don_hang_id, san_pham_id, don_gia, so_luong, thanh_tien)
                    VALUES (:don_hang_id, :san_pham_id, :don_gia, :so_luong, :thanh_tien)';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':don_hang_id' => $orderID,
                ':san_pham_id' => $productID,
                ':don_gia' => $price,
                ':so_luong' => $quantity,
                ':thanh_tien' => $total
            ]);

            return true;
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function GetOrderFromUser($id)
    {
        try {
            $sql = 'SELECT * FROM don_hangs WHERE tai_khoan_id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function GetOrderItemById($id)
    {
        try {
            $sql = 'SELECT 
                        chi_tiet_don_hangs.*,
                        san_phams.ten_san_pham,
                        hinh_anh_san_phams.link_hinh_anh
                    FROM
                        chi_tiet_don_hangs
                    JOIN
                        san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
                    LEFT JOIN (
                        SELECT 
                            san_pham_id, 
                            link_hinh_anh
                        FROM 
                            hinh_anh_san_phams
                        WHERE 
                            id IN (
                                SELECT MIN(id)
                                FROM hinh_anh_san_phams
                                GROUP BY san_pham_id
                            )
                    ) AS hinh_anh_san_phams ON san_phams.id = hinh_anh_san_phams.san_pham_id
                    WHERE
                        chi_tiet_don_hangs.don_hang_id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function GetOrderStatus()
    {
        try {
            $sql = 'SELECT * FROM trang_thai_don_hangs';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function GetOrderPayment()
    {
        try {
            $sql = 'SELECT * FROM phuong_thuc_thanh_toans';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function GetOrderById($id)
    {
        try {
            $sql = 'SELECT * FROM don_hangs WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function CancelOrder($orderId, $status)
    {
        try {
            $sql = 'UPDATE don_hangs SET trang_thai_id = :trang_thai_id WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $orderId,
                ':trang_thai_id' => $status

            ]);

            return true;
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }
}
