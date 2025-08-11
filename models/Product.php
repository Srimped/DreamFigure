<?php

class Product
{
    public $conn; //khai báo phương thức

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

    public function SearchProduct($keyword)
    {
        try {
            $sql = "SELECT 
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
                    WHERE ten_san_pham LIKE '%" . $keyword . "%'";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
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

    public function GetCommentFromProduct($id)
    {
        try {
            $sql = 'SELECT binh_luans.*, tai_khoans.ho_ten, tai_khoans.anh_dai_dien
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

    public function GetProductByCategory($id)
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
                    WHERE 
                        san_phams.danh_muc_id = ' . $id;

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }
}
