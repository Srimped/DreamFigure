<?php 
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/AdminCategoryController.php';
require_once './controllers/AdminProductController.php';

// Require toàn bộ file Models
require_once './models/AdminCategory.php';
require_once './models/AdminProduct.php';

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {

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
};