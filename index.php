<?php 
session_start();

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';

// Require toàn bộ file Models
require_once './models/Product.php';
require_once './models/Category.php';
require_once './models/Account.php';
require_once './models/Cart.php';
require_once './models/Order.php';

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    '/' => (new HomeController()) ->Home(),

    'Detail-Product' => (new HomeController()) ->DetailProduct(),
    'Add-Cart' => (new HomeController()) ->AddToCart(),
    'Cart' => (new HomeController()) ->Cart(),
    'Remove-Item' => (new HomeController()) ->RemoveItem(),
    'CheckOut' => (new HomeController()) ->CheckOut(),
    'Checkout-Processing' => (new HomeController()) ->CheckOutProcessing(),
    'Order-History' => (new HomeController()) ->OrderHistory(),
    'Order-Detail' => (new HomeController()) ->OrderDetail(),
    'Order-Cancel' => (new HomeController()) ->OrderCancel(),

    'Login' => (new HomeController()) ->LoginForm(),
    'Logout' => (new HomeController()) ->Logout(),
    'Check-Login' => (new HomeController()) ->Login(),
    'Register' => (new HomeController()) ->Register(),
    'Sign-Up' => (new HomeController()) ->SignUp(),
    

    // 'product-list' => (new HomeController()) ->ProductList(),
};