<?php

class AdminAccountController
{
    public $accountModel;
    public $orderModel;
    public $productModel;

    public function __construct()
    {
        $this->accountModel = new AdminAccount();
        $this->orderModel = new AdminOrder();
        $this->productModel = new AdminProduct();
    }

    public function AdminList()
    {
        $adminList = $this->accountModel->GetAllAccount(1);
        require_once './views/Account/Admin/ListAdmin.php';
    }

    public function ClientList()
    {
        $clientList = $this->accountModel->GetAllAccount(2);
        require_once './views/Account/Client/ListClient.php';
    }

    public function AdminAddingForm()
    {
        require_once './views/Account/Admin/AddAdmin.php';
        DeleteSesstionError();
    }

    public function PostAddingAdmin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy dữ liệu
            $adminName = $_POST['ho_ten'];
            $adminEmail = $_POST['email'];

            //tạo 1 mảng trống để chứa dữ liệu
            $errors = [];
            if (empty($adminName)) {
                $errors['ho_ten'] = 'Please fill your full name';
            }
            if (empty($adminEmail)) {
                $errors['email'] = 'Email can not be empty';
            }

            $_SESSION['error'] = $errors;

            // nếu như không có lỗi thì thực thi
            if (empty($errors)) {
                // thêm account
                //mật khẩu mặc định 123@456
                $password = password_hash('123@456', PASSWORD_BCRYPT);

                $roleID = 1;

                $this->accountModel->CreateAccount($adminName, $adminEmail, $password, $roleID);
                $_SESSION['message'] = 'New Admin has been added';
                header("Location: " . BASE_URL_ADMIN . '?act=Admin-Account');
                exit();
            } else {
                // trả về lỗi 
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=Add-Admin-Form');
                exit();
            }
        }
    }

    public function AdminEditingForm()
    {
        // Hiển thị form kèm thông tin của Admin được chọn
        $id = $_GET['Admin-id'];
        $admin = $this->accountModel->GetSelectAccount($id);
        if ($admin) {
            require_once './views/Account/Admin/EditAdmin.php';
            DeleteSesstionError();
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=Admin-Account');
            exit();
        }
    }

    // Thêm dữ liệu vào DB
    public function PostEditingAdmin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy dữ liệu

            $adminID = $_POST['id'];
            $adminName = $_POST['ho_ten'];
            $adminEmail = $_POST['email'];
            $adminPhone = $_POST['so_dien_thoai'];
            $adminStatus = $_POST['trang_thai_tai_khoan'];

            //tạo 1 mảng trống để chứa dữ liệu
            $errors = [];
            if (empty($adminName)) {
                $errors['ho_ten'] = 'Please fill your full name';
            }
            if (empty($adminEmail)) {
                $errors['email'] = 'Email can not be empty';
            }
            if (empty($adminStatus)) {
                $errors['trang_thai'] = 'Please select status';
            }

            $_SESSION['error'] = $errors;

            // nếu như không có lỗi thì thực thi
            if (empty($errors)) {
                // thêm Admin
                $this->accountModel->UpdateAccount(
                    $adminID,
                    $adminName,
                    $adminEmail,
                    $adminPhone,
                    $adminStatus
                );
                $_SESSION['message'] = 'Admin id ' . $adminID . ' has changed';
                header("Location: " . BASE_URL_ADMIN . '?act=Admin-Account');
                exit();
            } else {
                // trả về form và lỗi
                $admin = ['id' => $adminID, 'ho_ten' => $adminName, 'email' => $adminEmail, 'so_dien_thoai' => $adminPhone, 'trang_thai' => $adminStatus,];
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=Edit-Admin-Form&Admin-id=' . $adminID);
                exit();
            }
        }
    }

    public function ClientAddingForm()
    {
        require_once './views/Account/Client/AddClient.php';
        DeleteSesstionError();
    }

    public function PostAddingClient()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy dữ liệu
            $clientName = $_POST['ho_ten'];
            $clientEmail = $_POST['email'];

            //tạo 1 mảng trống để chứa dữ liệu
            $errors = [];
            if (empty($clientName)) {
                $errors['ho_ten'] = 'Please fill your full name';
            }
            if (empty($clientEmail)) {
                $errors['email'] = 'Email can not be empty';
            }

            $_SESSION['error'] = $errors;

            // nếu như không có lỗi thì thực thi
            if (empty($errors)) {
                // thêm account
                //mật khẩu mặc định 123@456
                $password = password_hash('123@456', PASSWORD_BCRYPT);

                $roleID = 2;

                $this->accountModel->CreateAccount($clientName, $clientEmail, $password, $roleID);
                $_SESSION['message'] = 'New client has been added';
                header("Location: " . BASE_URL_ADMIN . '?act=Client-Account');
                exit();
            } else {
                // trả về lỗi 
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=Add-Client-Form');
                exit();
            }
        }
    }

    public function ClientEditingForm()
    {
        // Hiển thị form kèm thông tin của Admin được chọn
        $id = $_GET['Client-id'];
        $client = $this->accountModel->GetSelectAccount($id);
        if ($client) {
            require_once './views/Account/Client/EditClient.php';
            DeleteSesstionError();
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=Client-Account');
            exit();
        }
    }

    public function DetailClient()
    {
        $id = $_GET['Client-id'];
        $client = $this->accountModel->GetSelectAccount($id);

        $orderList = $this->orderModel->GetOrderFromClient($id);

        $commentList = $this->productModel->GetCommentFromClient(($id));
        if ($client && $orderList && $commentList) {
            require_once './views/Account/Client/DetailClient.php';
            DeleteSesstionError();
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=Detail-Client');
            exit();
        }
    }

    // Thêm dữ liệu vào DB
    public function PostEditingClient()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy dữ liệu

            $clientID = $_POST['id'];
            $clientName = $_POST['ho_ten'];
            $clientEmail = $_POST['email'];
            $clientPhone = $_POST['so_dien_thoai'];
            $clientStatus = $_POST['trang_thai_tai_khoan'];

            //tạo 1 mảng trống để chứa dữ liệu
            $errors = [];
            if (empty($clientName)) {
                $errors['ho_ten'] = 'Please fill your full name';
            }
            if (empty($clientEmail)) {
                $errors['email'] = 'Email can not be empty';
            }
            if (empty($clientStatus)) {
                $errors['trang_thai'] = 'Please select status';
            }

            $_SESSION['error'] = $errors;

            // nếu như không có lỗi thì thực thi
            if (empty($errors)) {
                // thêm client
                $this->accountModel->UpdateAccount(
                    $clientID,
                    $clientName,
                    $clientEmail,
                    $clientPhone,
                    $clientStatus
                );
                $_SESSION['message'] = 'Client id ' . $clientID . ' has changed';
                header("Location: " . BASE_URL_ADMIN . '?act=Client-Account');
                exit();
            } else {
                // trả về form và lỗi
                $client = ['id' => $clientID, 'ho_ten' => $clientName, 'email' => $clientEmail, 'so_dien_thoai' => $clientPhone, 'trang_thai' => $clientStatus,];
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=Edit-Client-Form&Client-id=' . $clientID);
                exit();
            }
        }
    }

    public function ResetPassword()
    {
        $accountID = $_GET['Account-id'];
        $account = $this->accountModel->GetSelectAccount($accountID);
        $password = password_hash('123@456', PASSWORD_BCRYPT);

        $status = $this->accountModel->ResetPassword($accountID, $password);
        if ($status && $account['chuc_vu_id'] == 1) {
            $_SESSION['message'] = 'Admin id ' . $accountID . ' has reset password';
            header("Location: " . BASE_URL_ADMIN . '?act=Admin-Account');
            exit();
        }
        if ($status && $account['chuc_vu_id'] == 2) {
            $_SESSION['message'] = 'Client id ' . $accountID . ' has reset password';
            header("Location: " . BASE_URL_ADMIN . '?act=Client-Account');
            exit();
        } else {
            $_SESSION['message'] = 'There some error during this action';
            header("Location: " . BASE_URL_ADMIN . '?act=Admin-Account');
            exit();
        }
    }

    public function LoginForm()
    {
        require_once './views/Auth/LoginForm.php';
        DeleteSesstionError();
    }

    public function Login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['mat_khau'];

            $user = $this->accountModel->CheckLogin($email, $password);

            if ($user == $email) {
                $_SESSION['user_admin'] = $user;
                header("Location: " . BASE_URL_ADMIN);
                exit();
            } else {
                $_SESSION['error'] = $user;
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=Login');
                exit();
            }
        }
    }

    public function Logout()
    {
        if (isset($_SESSION['user_admin'])) {
            unset($_SESSION['user_admin']);
            header("Location: " . BASE_URL_ADMIN . '?act=Login');
            exit();
        }
    }
}
