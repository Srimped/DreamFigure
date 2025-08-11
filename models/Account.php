<?php

class Account
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function CheckLogin($email, $password)
    {
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE email = :email';


            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':email' => $email
            ]);

            $user = $stmt->fetch();


            if ($user && password_verify($password, $user['mat_khau'])) {
                if ($user['chuc_vu_id'] == 2) {
                    if ($user['trang_thai'] == 1) {
                        return $user['email'];
                    } else {
                        return "This account has been banned";
                    }
                } else {
                    return "There no permisson to entry";
                }
            } else {
                return "Wrong email or password";
            }
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
            return false;
        }
    }

    public function GetAccountFromEmail($email)
    {
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE email = :email';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':email' => $email
            ]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function ResetPassword($id, $password)
    {
        try {
            $sql = 'UPDATE tai_khoans SET mat_khau = :mau_khau WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':mau_khau' => $password,
                ':id' => $id
            ]);

            return true;
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }
}
