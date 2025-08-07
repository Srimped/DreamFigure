<?php

class AdminProduct
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function GetAllProduct()
    {
        try {
            $sql = 'SELECT 
                        san_phams.*, 
                        danh_mucs.ten_danh_muc, 
                        hinh_anh_san_phams.link_hinh_anh
                    FROM 
                        san_phams
                    JOIN 
                        danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
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
                    ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function CreateProduct($productName, $productPrice, $productQuantity, $categoryID, $productStatus, $productDes)
    {
        try {
            $sql = 'INSERT INTO san_phams (ten_san_pham, gia_san_pham, so_luong, danh_muc_id, trang_thai, mo_ta)
                    VALUE (:ten_san_pham, :gia_san_pham, :so_luong, :danh_muc_id, :trang_thai, :mo_ta)';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ten_san_pham' => $productName,
                ':gia_san_pham' => $productPrice,
                ':so_luong' => $productQuantity,
                ':danh_muc_id' => $categoryID,
                ':trang_thai' => $productStatus,
                ':mo_ta' => $productDes,
            ]);

            // lấy id sản phẩm vừa thêm
            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function AddAlbumToProduct($productID, $imageLink)
    {
        try {
            $sql = 'INSERT INTO hinh_anh_san_phams (san_pham_id, link_hinh_anh)
                    VALUE (:san_pham_id, :link_hinh_anh)';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':san_pham_id' => $productID,
                ':link_hinh_anh' => $imageLink
            ]);

            // lấy id sản phẩm vừa thêm
            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function GetSelectProduct($id)
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            WHERE san_phams.id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }
    public function GetProductImage($id)
    {
        try {
            $sql = 'SELECT * FROM hinh_anh_san_phams WHERE san_pham_id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function GetFirstImage($id)
    {
        try {
            $sql = 'SELECT *
                FROM hinh_anh_san_phams
                WHERE san_pham_id = :id
                ORDER BY id ASC
                LIMIT 1';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function UpdateProduct($productID, $productName, $productPrice, $productQuantity, $categoryID, $productStatus, $productDes)
    {
        try {
            $sql = 'UPDATE san_phams 
                    SET
                        ten_san_pham = :ten_san_pham, 
                        gia_san_pham = :gia_san_pham, 
                        so_luong = :so_luong, 
                        danh_muc_id = :danh_muc_id, 
                        trang_thai = :trang_thai, 
                        mo_ta = :mo_ta, 
                    WHERE id = :id';


            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ten_san_pham' => $productName,
                ':gia_san_pham' => $productPrice,
                ':so_luong' => $productQuantity,
                ':danh_muc_id' => $categoryID,
                ':trang_thai' => $productStatus,
                ':mo_ta' => $productDes,
                ':id' => $productID,
            ]);

            // lấy id sản phẩm vừa thêm
            return True;
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function GetDetailProductImg($id)
    {
        try {
            $sql = 'SELECT * FROM hinh_anh_san_phams WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function updateAlbum($id, $new_File)
    {
        try {
            $sql = 'UPDATE hinh_anh_san_phams 
                    SET
                        link_hinh_anh = :new_File

                    WHERE id = :id';


            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':new_File' => $new_File,
                ':id' => $id,
            ]);

            // lấy id sản phẩm vừa thêm
            return True;
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function DestroyProductImg($id)
    {
        try {
            $sql = 'DELETE FROM hinh_anh_san_phams WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return true;
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function DestroyProduct($productID)
    {
        try {
            $sql = 'DELETE FROM san_phams WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $productID
            ]);

            return true;
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    //bình luận
    public function GetCommentFromClient($id)
    {
        try {
            $sql = 'SELECT binh_luans.*, san_phams.ten_san_pham
            FROM binh_luans
            INNER JOIN san_phams ON binh_luans.san_pham_id = san_phams.id
            WHERE binh_luans.tai_khoan_id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function GetCommentFromProduct($id)
    {
        try {
            $sql = 'SELECT binh_luans.*, tai_khoans.ho_ten
            FROM binh_luans
            INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id
            WHERE binh_luans.san_pham_id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function GetSelectComment($id)
    {
        try {
            $sql = 'SELECT * FROM binh_luans WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function UpdateStatusCommnet($id, $status)
    {
        try {
            $sql = 'UPDATE binh_luans
                    SET
                        trang_thai = :trang_thai

                    WHERE id = :id';


            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':trang_thai' => $status,
                ':id' => $id,
            ]);

            // lấy id sản phẩm vừa thêm
            return True;
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }
}
