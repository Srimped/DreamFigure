<?php

class Category
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
            echo "Error" . $e->getMessage();
        }
    }
}
