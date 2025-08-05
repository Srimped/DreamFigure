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
            $sql = 'SELECT * FROM san_phams';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }
}