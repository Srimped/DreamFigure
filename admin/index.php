<?php 
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/AdminCategoryController.php';
require_once './controllers/AdminProductController.php';
require_once './controllers/AdminOrderController.php';
require_once './controllers/AdminController.php';
require_once './controllers/AdminAccountController.php';


// Require toàn bộ file Models
require_once './models/AdminCategory.php';
require_once './models/AdminProduct.php';
require_once './models/AdminOrder.php';
require_once './models/AdminAccount.php';

// Route
$act = $_GET['act'] ?? '/';

if($act !== 'Login' && $act !== 'Check-Login' && $act !== 'Logout')
{
    Auth();
}

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Route trang chủ
    '/' =>(new AdminController())->Home(),
    // Route danh mục
    'Category' =>(new AdminCategoryController())->CategoryList(),
    'Add-Category-Form' =>(new AdminCategoryController())->CategoryAddingForm(),
    'Add-Category' =>(new AdminCategoryController())->PostAddingCategory(),
    'Edit-Category-Form' =>(new AdminCategoryController())->CategoryEditingForm(),
    'Edit-Category' =>(new AdminCategoryController())->PostEditingCategory(),
    'Delete-Category' =>(new AdminCategoryController())->DeleteCategory(),

    // Route sản phẩm
    'Product' =>(new AdminProductController())->ProductList(),
    'Add-Product-Form' =>(new AdminProductController())->ProductAddingForm(),
    'Add-Product' =>(new AdminProductController())->PostAddingProduct(),
    'Edit-Product-Form' =>(new AdminProductController())->ProductEditingForm(),
    'Edit-Product' =>(new AdminProductController())->PostEditingProduct(),
    'Edit-Album' =>(new AdminProductController())->PostEditingAlbum(),
    'Delete-Product' =>(new AdminProductController())->DeleteProduct(),
    'Detail-Product' =>(new AdminProductController())->DetailProduct(),

    // Route đơn hàng
    'Order' =>(new AdminOrderController())->OrderList(),
    'Edit-Order-Form' =>(new AdminOrderController())->OrderEditingForm(),
    'Edit-Order' =>(new AdminOrderController())->PostEditingOrder(),
    // 'Delete-Order' =>(new AdminOrderController())->DeleteOrder(),
    'Detail-Order' =>(new AdminOrderController())->DetailOrder(),

    //Route quản lý tài khoản
    //Route admin
    'Admin-Account' =>(new AdminAccountController())->AdminList(),
    'Add-Admin-Form' =>(new AdminAccountController())->AdminAddingForm(),
    'Add-Admin' =>(new AdminAccountController())->PostAddingAdmin(),
    'Edit-Admin-Form' =>(new AdminAccountController())->AdminEditingForm(),
    'Edit-Admin' =>(new AdminAccountController())->PostEditingAdmin(),
    //Rout client
    'Client-Account' =>(new AdminAccountController())->ClientList(),
    'Add-Client-Form' =>(new AdminAccountController())->ClientAddingForm(),
    'Add-Client' =>(new AdminAccountController())->PostAddingClient(),
    'Edit-Client-Form' =>(new AdminAccountController())->ClientEditingForm(),
    'Edit-Client' =>(new AdminAccountController())->PostEditingClient(),
    'Detail-Client' =>(new AdminAccountController())->DetailClient(),

    //Route profile
    'AccountSetting' =>(new AdminAccountController())->AccountSetting(),
    'Update-Account' =>(new AdminAccountController())->UpdateAccount(),
    'Update-Password' =>(new AdminAccountController())->UpdatePassword(),

    //Route bình luận
    'Update-Status-Comment' =>(new AdminProductController())->UpdateStatusComment(),
    


    // 'Profile' =>(new AdminAccountController())->Profile(),

    //Route reset password
    'Reset-Password' =>(new AdminAccountController())->ResetPassword(),

    //Route auth
    'Login' => (new AdminAccountController())->LoginForm(),
    'Logout' => (new AdminAccountController())->Logout(),
    'Check-Login'=> (new AdminAccountController())->Login(),
};