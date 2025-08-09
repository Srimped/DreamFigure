<?php

class HomeController
{
    public $productModel;
    public $categoryModel;
    public $accountModel;
    public $cartModel;

    public function __construct()
    {
        $this->productModel = new Product();
        $this->categoryModel = new Category();
        $this->accountModel = new Account();
        $this->cartModel = new Cart();
    }

    public function Home()
    {
        $productList = $this->productModel->GetAllProduct();
        $categoryList = $this->categoryModel->GetAllCategory();
        require_once './views/Home.php';
    }

    public function ProductList()
    {
        $productList = $this->productModel->GetAllProduct();
        require_once './views/ListProduct.php';
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

            $user = $this->accountModel->CheckLogin($email, $password);

            if ($user == $email) {
                $_SESSION['user_client'] = $user;
                header("Location: " . BASE_URL);
                exit();
            } else {
                $_SESSION['error'] = $user;
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL . '?act=Login');
                exit();
            }
        }
    }

    public function Logout()
    {
        if (isset($_SESSION['user_client'])) {
            unset($_SESSION['user_client']);
            unset($_SESSION['error']);
            header("Location: " . BASE_URL);
            exit();
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
}
