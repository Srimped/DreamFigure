<?php

class AdminOrderController
{

    public $orderModel;
    public $productModel;
    public function __construct()
    {
        $this->orderModel = new AdminOrder();
        $this->productModel = new AdminProduct();
    }
    public function OrderList()
    {
        $orderList = $this->orderModel->GetAllOrder();
        require_once './views/Order/ListOrder.php';
    }

    public function DetailOrder()
    {
        $id = $_GET['Order-id'];
        $order = $this->orderModel->GetSelectOrder($id);
        $orderProducts = $this->orderModel->GetListProductByOrder($id);
        $statusList = $this->orderModel->GetAllStatus();

        if ($order) {
            require_once './views/Order/DetailOrder.php';
            DeleteSesstionError();
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=Product');
            exit();
        }
    }

    public function OrderEditingForm()
    {
        $id = $_GET['Order-id'];
        $order = $this->orderModel->GetSelectOrder($id);
        $statusList = $this->orderModel->GetAllStatus();
        if ($order) {
            require_once './views/Order/EditOrder.php';
            DeleteSesstionError();
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=Order');
            exit();
        }
    }

    public function PostEditingOrder()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $orderID = $_POST['don_hang_id'] ?? '';

            $name = $_POST['ten_nguoi_nhan'];
            $phone = $_POST['sdt_nguoi_nhan'];
            $email = $_POST['email_nguoi_nhan'];
            $address = $_POST['dia_chi_nguoi_nhan'];
            $note = $_POST['ghi_chu'];
            $status = $_POST['trang_thai_id'];

            $errors = [];
            if (empty($name)) {
                $errors['ten_nguoi_nhan'] = 'Please enter recipient name';
            }
            if (empty($phone)) {
                $errors['sdt_nguoi_nhan'] = 'Please enter phone number';
            }
            if (empty($email)) {
                $errors['email_nguoi_nhan'] = 'Please enter email';
            }
            if (empty($address)) {
                $errors['dia_chi_nguoi_nhan'] = 'Please enter address ';
            }
            if (empty($status)) {
                $errors['trang_thai_id'] = 'Please fill status ';
            }

            $_SESSION['error'] = $errors;


            // nếu như không có lỗi thì thực thi
            if (empty($errors)) {
                // thêm category
                $this->orderModel->UpdateOrder($orderID, $name, $phone, $email, $address, $note, $status);
                $_SESSION['message'] = 'Order has been updated';
                header("Location: " . BASE_URL_ADMIN . '?act=Order');
                exit();
            } else {
                // trả về lỗi 
                $$_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=Edit-Order-Form&Order-id=' . $orderID);
                exit();
            }
        }
    }
}
