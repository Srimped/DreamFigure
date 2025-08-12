<?php

class HomeController
{
    public $productModel;
    public $categoryModel;
    public $accountModel;
    public $cartModel;
    public $orderModel;


    public function __construct()
    {
        $this->productModel = new Product();
        $this->categoryModel = new Category();
        $this->accountModel = new Account();
        $this->cartModel = new Cart();
        $this->orderModel = new Order();
    }

    public function Home()
    {
        $productList = $this->productModel->GetAllProduct();
        $categoryList = $this->categoryModel->GetAllCategory();
        require_once './views/Home.php';
    }

    public function Contact()
    {
        require_once './views/Contact.php';
    }

    public function ProductList()
    {
        $productList = $this->productModel->GetAllProduct();
        require_once './views/ListProduct.php';
    }

    public function Shop()
    {
        $categoryList = $this->categoryModel->GetAllCategory();

        if (!empty($_GET['keyword'])) {
            $keyword = $_GET['keyword'];
            $productList = $this->productModel->SearchProduct($keyword);
        } else {
            $productList = $this->productModel->GetAllProduct();
        }
        require_once './views/shop.php';
    }


    public function Search()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $keyword = $_POST['keyword'] ?? '';
            header("Location: " . BASE_URL . "?act=Shop&keyword=" . urlencode($keyword));
            exit();
        }
    }



    public function DetailProduct()
    {
        $id = $_GET['Product-id'];
        $product = $this->productModel->GetSelectProduct($id);
        $listImage = $this->productModel->GetProductImage($id);
        $firstImage = $this->productModel->GetFirstImage($id);
        $commentList = $this->productModel->GetCommentFromProduct($id);
        $sameCategoryProductList = $this->productModel->GetProductByCategory($product['danh_muc_id']);
        if ($product) {
            require_once './views/DetailProduct.php';
            DeleteSesstionError();
        } else {
            header("Location: " . BASE_URL);
            exit();
        }
    }

    public function LoginForm()
    {
        require_once './views/LoginForm.php';
        DeleteSesstionError();
    }

    public function Login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['mat_khau'];

            $errors = [];
            if (empty($email)) {
                $errors['email'] = 'Please enter email';
            }
            if (empty($password)) {
                $errors['password'] = 'Please enter your password';
            }

            if (!empty($errors)) {
                $_SESSION['error'] = $errors;
                header("Location: " . BASE_URL . '?act=Login');
                exit();
            }

            // Kiểm tra tài khoản
            $user = $this->accountModel->CheckLogin($email, $password);

            if ($user == $email) {
                $_SESSION['user_client'] = $user;
                header("Location: " . BASE_URL);
                exit();
            } else {
                $_SESSION['login_error'] = 'Wrong email or password';
                header("Location: " . BASE_URL . '?act=Login');
                exit();
            }
        }
    }


    public function Logout()
    {
        if (isset($_SESSION['user_client'])) {
            unset($_SESSION['user_client']);
            DeleteSesstionError();
            header("Location: " . BASE_URL);
            exit();
        }
    }

    public function Register()
    {
        require_once './views/Register.php';
        DeleteSesstionError();
    }

    public function SignUp()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['ho_ten'];
            $email = $_POST['email'];
            $password = $_POST['mat_khau'];
            $confirmPassword = $_POST['nhap_lai_mat_khau'];

            $errors = [];
            if (empty($name)) {
                $errors['name'] = 'Please enter your name';
            }
            if (empty($email)) {
                $errors['email'] = 'Please enter email';
            }
            if (empty($password)) {
                $errors['password'] = 'please enter your password';
            }
            if (empty($confirmPassword)) {
                $errors['confirm_password'] = 'Please input one more time of your password';
            }
            if ($password !== $confirmPassword) {
                $errors['confirm_password_notify'] = 'Confirm password does not match';
            }

            $_SESSION['error'] = $errors;

            if (!$errors) {
                $password = password_hash($password, PASSWORD_BCRYPT);
                $status = $this->accountModel->CreateAccount($name, $email, $password, 2);
                if ($status) {
                    header("Location: " . BASE_URL . '?act=Login');
                    exit();
                }
            } else {
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL . '?act=Register');
                exit();
            }
        }
    }

    public function AddToCart()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_SESSION['user_client'])) {
                $user = $this->accountModel->GetAccountFromEmail($_SESSION['user_client']);
                $cart = $this->cartModel->GetCartFromUser($user['id']);
                if (!$cart) {
                    $cartID = $this->cartModel->CreateCart($user['id']);
                    $cart = ['id' => $cartID];
                    $detailCart = [];
                } else {
                    $detailCart = $this->cartModel->GetDetailCart($cart['id']);
                }

                $productID = $_POST['san_pham_id'];
                $quantity = $_POST['so_luong'];

                $existProduct = false;
                foreach ($detailCart as $item) {
                    if ($item['san_pham_id'] == $productID) {
                        $newQuantity = $item['so_luong'] + $quantity;

                        $this->cartModel->UpdateQuantity($cart['id'], $productID, $newQuantity);
                        $existProduct = true;
                        break;
                    }
                }
                if (!$existProduct) {
                    $this->cartModel->AddItemToCart($cart['id'], $productID, $quantity);
                }
                header('Location: ' . BASE_URL . '?act=Cart');
                exit;
            } else {
                header('Location: ' . BASE_URL . '?act=Login');
                exit;
            }
        }
    }

    public function Cart()
    {
        if (isset($_SESSION['user_client'])) {
            $user = $this->accountModel->GetAccountFromEmail($_SESSION['user_client']);
            $cart = $this->cartModel->GetCartFromUser($user['id']);
            if (!$cart) {
                $cartID = $this->cartModel->CreateCart($user['id']);
                $cart = ['id' => $cartID];
                $detailCart = [];
            } else {
                $detailCart = $this->cartModel->GetDetailCart($cart['id']);
            }
            require_once './views/Cart.php';
        } else {
            header('Location: ' . BASE_URL . '?act=Login');
            exit;
        }
    }

    public function RemoveItem()
    {
        if (isset($_SESSION['user_client'])) {
            $itemId = $_GET['Product-Id'];
            $user = $this->accountModel->GetAccountFromEmail($_SESSION['user_client']);
            $cart = $this->cartModel->GetCartFromUser($user['id']);
            $item = $this->cartModel->GetSelectItem($cart['id'], $itemId);
            if (!$cart) {
                $cartID = $this->cartModel->CreateCart($user['id']);
                $cart = ['id' => $cartID];
                $detailCart = [];
            } else {
                if (!$item) {
                    header('Location: ' . BASE_URL);
                    exit;
                } else {
                    $this->cartModel->RemoveItem($item['id']);
                }
                $detailCart = $this->cartModel->GetDetailCart($cart['id']);
            }
            require_once './views/Cart.php';
        } else {
            header('Location: ' . BASE_URL . '?act=Login');
            exit;
        }
    }

    public function CheckOut()
    {
        if (isset($_SESSION['user_client'])) {
            $user = $this->accountModel->GetAccountFromEmail($_SESSION['user_client']);
            $cart = $this->cartModel->GetCartFromUser($user['id']);
            $detailCart = $this->cartModel->GetDetailCart($cart['id']);

            if (!$cart || empty($detailCart)) {
                header('Location: ' . BASE_URL);
                exit;
            } else {
                require_once './views/CheckOut.php';
            }
        } else {
            header('Location: ' . BASE_URL . '?act=Login');
            exit;
        }
    }

    public function CheckOutProcessing()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (
                empty($_SESSION['checkout_token']) ||
                $_POST['token'] !== $_SESSION['checkout_token']
            ) {
                header('Location: ' . BASE_URL);
                exit;
            }
            if (isset($_SESSION['user_client'])) {
                $name = $_POST['ten_nguoi_nhan'];
                $email = $_POST['email_nguoi_nhan'];
                $phone = $_POST['sdt_nguoi_nhan'];
                $address = $_POST['dia_chi_nguoi_nhan'];
                $note = $_POST['ghi_chu'];
                $total = $_POST['tong_tien'];
                $payment = $_POST['phuong_thuc_thanh_toan_id'];

                $date = date('Y-m-d');
                $statusID = 1;

                $user = $this->accountModel->GetAccountFromEmail($_SESSION['user_client']);
                $userID = $user['id'];
                $code = 'FG-' . rand(1, 99999);


                $order = $this->orderModel->CreateOrder(
                    $userID,
                    $name,
                    $email,
                    $phone,
                    $address,
                    $note,
                    $total,
                    $payment,
                    $date,
                    $statusID,
                    $code
                );

                $cart = $this->cartModel->GetCartFromUser($userID);

                if ($order) {
                    $detailCart = $this->cartModel->GetDetailCart($cart['id']);

                    foreach ($detailCart as $item) {
                        $this->orderModel->AddDetailOrder(
                            $order,
                            $item['san_pham_id'],
                            $item['gia_san_pham'],
                            $item['so_luong'],
                            $item['gia_san_pham'] * $item['so_luong']
                        );
                    }

                    $this->cartModel->ClearDetailCart($cart['id']);
                    $this->cartModel->DeleteCart($userID);
                }
                unset($_SESSION['checkout_token']);
                header('Location: ' . BASE_URL . '?act=Order-History');
                exit;
            } else {
                header('Location: ' . BASE_URL . '?act=Login');
                exit;
            }
        }
    }

    public function OrderHistory()
    {
        if (isset($_SESSION['user_client'])) {
            $user = $this->accountModel->GetAccountFromEmail($_SESSION['user_client']);

            if ($user) {
                $orderList = $this->orderModel->GetOrderFromUser($user['id']);
                $statusList = $this->orderModel->GetOrderStatus();
                $status = array_column($statusList, 'ten_trang_thai', 'id');
                $paymentList = $this->orderModel->GetOrderPayment();
                $payment = array_column($paymentList, 'ten_phuong_thuc', 'id');

                require_once './views/OrderHistory.php';
            } else {
                header('Location: ' . BASE_URL . '?act=Login');
                exit;
            }
        } else {
            header('Location: ' . BASE_URL . '?act=Login');
            exit;
        }
    }

    public function OrderDetail()
    {
        if (isset($_SESSION['user_client'])) {
            $user = $this->accountModel->GetAccountFromEmail($_SESSION['user_client']);
            $orderId = $_GET['Order-id'];

            $statusList = $this->orderModel->GetOrderStatus();
            $status = array_column($statusList, 'ten_trang_thai', 'id');
            $paymentList = $this->orderModel->GetOrderPayment();
            $payment = array_column($paymentList, 'ten_phuong_thuc', 'id');

            $order = $this->orderModel->GetOrderById($orderId);
            $cartDetail = $this->orderModel->GetOrderItemById($orderId);

            if($order['tai_khoan_id'] != $user['id'])
            {
                echo "you don't have permission to see this order";
                exit;
            }
            require_once './views/OrderDetail.php';
        } else {
            header('Location: ' . BASE_URL . '?act=Login');
            exit;
        }
    }

    public function OrderCancel()
    {
        if (isset($_SESSION['user_client'])) {
            $user = $this->accountModel->GetAccountFromEmail($_SESSION['user_client']);
            $orderId = $_GET['Order-id'];

            $order = $this->orderModel->GetOrderById($orderId);

            if ($order['tai_khoan_id'] != $user['id']) {
                echo "You don't have permission to delete this order";
                exit;
            }

            if ($order['trang_thai_id'] != 1) {
                echo "You can only delete unverifed order";
                exit;
            }

            $this->orderModel->CancelOrder($orderId, 11);

            header('Location: ' . BASE_URL . '?act=Order-History');
            exit;
        } else {
            header('Location: ' . BASE_URL . '?act=Login');
            exit;
        }
    }
}
