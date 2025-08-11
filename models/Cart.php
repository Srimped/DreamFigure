<?php

class Cart
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function GetCartFromUser($id)
    {
        try {
            $sql = 'SELECT * FROM gio_hangs WHERE tai_khoan_id = :tai_khoan_id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':tai_khoan_id' => $id
            ]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function GetDetailCart($id)
    {
        try {
            $sql = 'SELECT 
                        chi_tiet_gio_hangs.id AS id_chi_tiet_gio_hang,
                        chi_tiet_gio_hangs.gio_hang_id,
                        chi_tiet_gio_hangs.san_pham_id,
                        chi_tiet_gio_hangs.so_luong,
                        san_phams.ten_san_pham,
                        san_phams.gia_san_pham,
                        danh_mucs.ten_danh_muc,
                        hinh_anh_san_phams.link_hinh_anh
                    FROM 
                        chi_tiet_gio_hangs
                    JOIN 
                        san_phams 
                        ON chi_tiet_gio_hangs.san_pham_id = san_phams.id
                    JOIN 
                        danh_mucs 
                        ON san_phams.danh_muc_id = danh_mucs.id
                    LEFT JOIN (
                        SELECT 
                            hinh_anh_san_phams.san_pham_id, 
                            hinh_anh_san_phams.link_hinh_anh
                        FROM 
                            hinh_anh_san_phams
                        WHERE 
                            hinh_anh_san_phams.id IN (
                                SELECT MIN(id)
                                FROM hinh_anh_san_phams
                                GROUP BY san_pham_id
                            )
                    ) AS hinh_anh_san_phams 
                        ON san_phams.id = hinh_anh_san_phams.san_pham_id
                    WHERE 
                        chi_tiet_gio_hangs.gio_hang_id = :gio_hang_id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':gio_hang_id' => $id
            ]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function CreateCart($id)
    {
        try {
            $sql = 'INSERT INTO gio_hangs (tai_khoan_id) VALUES (:id)';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function UpdateQuantity($productID, $cartID, $quantity)
    {
        try {
            $sql = 'UPDATE chi_tiet_gio_hangs
                    SET so_luong = :so_luong
                    WHERE gio_hang_id = :gio_hang_id AND san_pham_id = :san_pham_id
            ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':gio_hang_id' => $productID,
                ':san_pham_id' => $cartID,
                ':so_luong' => $quantity,
            ]);

            return true;
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function AddItemToCart($productID, $cartID, $quantity)
    {
        try {
            $sql = 'INSERT INTO chi_tiet_gio_hangs (san_pham_id, gio_hang_id, so_luong)
                    VALUES (:san_pham_id, :gio_hang_id, :so_luong)
            ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':gio_hang_id' => $productID,
                ':san_pham_id' => $cartID,
                ':so_luong' => $quantity,
            ]);

            return true;
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function ClearDetailCart($cartID)
    {
        try {
            $sql = 'DELETE FROM chi_tiet_gio_hangs WHERE gio_hang_id = :gio_hang_id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':gio_hang_id' => $cartID,
            ]);

            return true;
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function GetSelectItem($cartID, $productID)
    {
        try {
            $sql = 'SELECT * FROM chi_tiet_gio_hangs WHERE gio_hang_id = :gio_hang_id AND san_pham_id = :san_pham_id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':gio_hang_id' => $cartID,
                ':san_pham_id' => $productID
            ]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function RemoveItem($id)
    {
        try {
            $sql = 'DELETE FROM chi_tiet_gio_hangs WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return true;
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function DeleteCart($userID)
    {
        try {
            $sql = 'DELETE FROM gio_hangs WHERE tai_khoan_id = :tai_khoan_id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':tai_khoan_id' => $userID,
            ]);

            return true;
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }
}
