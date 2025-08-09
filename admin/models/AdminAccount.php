<?php

class AdminAccount
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function GetAllAccount($roleID)
    {
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE chuc_vu_id = :chuc_vu_id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':chuc_vu_id' => $roleID
            ]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function CreateAccount($accountName, $accountEmail, $password, $roleID)
    {
        try {
            $sql = 'INSERT INTO tai_khoans (ho_ten, email, mat_khau, chuc_vu_id)
                    VALUE (:ho_ten, :email, :mat_khau, :chuc_vu_id)';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ho_ten' => $accountName,
                ':email' => $accountEmail,
                ':mat_khau' => $password,
                ':chuc_vu_id' => $roleID
            ]);

            return true;
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function GetSelectAccount($id)
    {
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function UpdateAccount($accountID, $accountName, $accountEmail, $accountPhone, $accountStatus)
    {
        try {
            $sql = 'UPDATE tai_khoans SET ho_ten = :ho_ten, email = :email, so_dien_thoai = :so_dien_thoai, trang_thai = :trang_thai WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ho_ten' => $accountName,
                ':email' => $accountEmail,
                ':so_dien_thoai' => $accountPhone,
                ':trang_thai' => $accountStatus,
                ':id' => $accountID
            ]);

            return true;
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function UpdateProfile($accountID, $accountName, $accountDOB, $accountEmail, $accountPhone, $accountSex, $accountAddress)
    {
        try {
            $sql = 'UPDATE tai_khoans SET ho_ten = :ho_ten, ngay_sinh = :ngay_sinh, email = :email, so_dien_thoai = :so_dien_thoai, gioi_tinh = :gioi_tinh, dia_chi = :dia_chi WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ho_ten' => $accountName,
                ':email' => $accountEmail,
                ':so_dien_thoai' => $accountPhone,
                ':ngay_sinh' => $accountDOB,
                ':gioi_tinh' => $accountSex,
                ':dia_chi' => $accountAddress,
                ':id' => $accountID
            ]);

            return true;
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
                if ($user['chuc_vu_id'] == 1) {
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
}
