<?php

class AdminCategory
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function GetAllCategory()
    {
        try {
            $sql = 'SELECT * FROM danh_mucs';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo"Error" . $e->getMessage();
        }
    }

    public function CreateCategory($categoryName, $categoryDes)
    {
        try {
            $sql = 'INSERT INTO danh_mucs (ten_danh_muc, mo_ta)
                    VALUE (:ten_danh_muc, :mo_ta)';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ten_danh_muc' => $categoryName,
                ':mo_ta' => $categoryDes
            ]);

            return true;
        } catch (Exception $e) {
            echo"Error" . $e->getMessage();
        }
    }

    public function GetSelectCategory($id)
    {
        try {
            $sql = 'SELECT * FROM danh_mucs WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo"Error" . $e->getMessage();
        }
    }

    public function UpdateCategory($categoryID, $categoryName, $categoryDes)
    {
        try {
            $sql = 'UPDATE danh_mucs SET ten_danh_muc = :ten_danh_muc, mo_ta = :mo_ta WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $categoryID,
                ':ten_danh_muc' => $categoryName,
                ':mo_ta' => $categoryDes
            ]);

            return true;
        } catch (Exception $e) {
            echo"Error" . $e->getMessage();
        }
    }

    public function DestroyCategory($categoryID)
    {
        try {
            $sql = 'DELETE FROM danh_mucs WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $categoryID
            ]);

            return true;
        } catch (Exception $e) {
            echo"Error" . $e->getMessage();
        }
    }
}