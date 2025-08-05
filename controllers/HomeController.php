<?php 

class HomeController
{
    public $productModel;

    public function __construct()
    {
        $this->productModel = new Product();
    }

    public function Home()
    {
        require_once './views/Home.php';
    }

    public function ProductList()
    {
        $productList = $this->productModel->GetAllProduct();
        require_once './views/ListProduct.php';
    }
}