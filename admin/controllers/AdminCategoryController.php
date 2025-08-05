<?php

class AdminCategoryController
{

    public $categoryModel;
    public function __construct()
    {
        $this->categoryModel = new AdminCategory();
    }

    public function CategoryList()
    {
        $categoryList = $this->categoryModel->GetAllCategory();
        require_once './views/Category/ListCategory.php';
    }

    // Hiển thị form tạo danh mục
    public function CategoryAddingForm()
    {
        require_once './views/Category/AddCategory.php';
    }

    // Thêm dữ liệu vào DB
    public function PostAddingCategory()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            // lấy dữ liệu
            $categoryName = $_POST['ten_danh_muc'];
            $categoryDes = $_POST['mo_ta'];
            
            //tạo 1 mảng trống để chứa dữ liệu
            $errors = [];
            if (empty($categoryName))
            {
                $errors['ten_danh_muc'] = 'Category title can not be null';
            }

            // nếu như không có lỗi thì thực thi
            if (empty($errors))
            {
                // thêm category
                $this->categoryModel->CreateCategory($categoryName, $categoryDes);
                $_SESSION['message'] = 'New Category has been added';
                header("Location: " . BASE_URL_ADMIN . '?act=Category');
                exit();
            }
            else
            {
                // trả về lỗi 
                require_once './views/Category/AddCategory.php';
            }
        }

    }

    public function CategoryEditingForm()
    {
        // Hiển thị form kèm thông tin của category được chọn
        $id = $_GET['Category-id'];
        $category = $this->categoryModel->GetSelectCategory($id);
        if($category)
        {
            require_once './views/Category/EditCategory.php';
        }
        else
        {
            header("Location: " . BASE_URL_ADMIN . '?act=Category');
            exit();
        }
    }

    // Thêm dữ liệu vào DB
    public function PostEditingCategory()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            // lấy dữ liệu

            $categoryID = $_POST['id'];
            $categoryName = $_POST['ten_danh_muc'];
            $categoryDes = $_POST['mo_ta'];
            
            //tạo 1 mảng trống để chứa dữ liệu
            $errors = [];
            if (empty($categoryName))
            {
                $errors['ten_danh_muc'] = 'Category title can not be null';
            }

            // nếu như không có lỗi thì thực thi
            if (empty($errors))
            {
                // thêm category
                $this->categoryModel->UpdateCategory($categoryID, $categoryName, $categoryDes);
                $_SESSION['message'] = 'Category id ' . $categoryID . ' has changed';
                header("Location: " . BASE_URL_ADMIN . '?act=Category');
                exit();
            }
            else
            {
                // trả về form và lỗi
                $category = ['id' => $categoryID, 'ten_danh_muc' => $categoryName, 'mo_ta' => $categoryDes];
                require_once './views/Category/EditCategory.php';
            }
        }

    }

    public function DeleteCategory()
    {
        $id = $_GET['Category-id'];
        $category = $this->categoryModel->GetSelectCategory($id);

        if($category)
        {
            $this->categoryModel->DestroyCategory($id);
            $_SESSION['message'] = 'Category has been deleted';
            header("Location: " . BASE_URL_ADMIN . '?act=Category');
            exit();
        }
        else
        {
            header("Location: " . BASE_URL_ADMIN . '?act=Category');
            exit();
        }
    }
}