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

    public function GetAllStatus()
    {

    }

    // Hiển thị form tạo sản phẩm
    // public function ProductEditingForm()
    // {
    //     // Hiển thị form kèm thông tin của product được chọn
    //     $id = $_GET['Product-id'];
    //     $product = $this->productModel->GetSelectProduct($id);
    //     $listImage = $this->productModel->GetProductImage($id);
    //     $listCategory = $this->categoryModel->GetAllCategory();
    //     if ($product) {
    //         require_once './views/Product/EditProduct.php';
    //         DeleteSesstionError();
    //     } else {
    //         header("Location: " . BASE_URL_ADMIN . '?act=Product');
    //         exit();
    //     }
    // }

    // // Thêm dữ liệu vào DB
    // public function PostEditingProduct()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         // lấy dữ liệu 
    //         $productID = $_POST['san_pham_id'] ?? '';
    //         $oldProduct = $this->productModel->GetSelectProduct($productID);
    //         $oldFiles = $oldProduct['hinh_anh']; //lấy ảnh cũ để sửa

    //         $productName = $_POST['ten_san_pham'] ?? '';
    //         $productPrice = $_POST['gia_san_pham'] ?? '';
    //         $productDiscount = $_POST['gia_khuyen_mai'] ?? '';
    //         $productQuantity = $_POST['so_luong'] ?? '';
    //         $productDate = $_POST['ngay_nhap'] ?? '';
    //         $categoryID = $_POST['danh_muc_id'] ?? '';
    //         $productStatus = $_POST['trang_thai'] ?? '';
    //         $productDes = $_POST['mo_ta'] ?? '';

    //         // dữ liệu hình ảnh
    //         $image = $_FILES['hinh_anh'] ?? null;

    //         //tạo 1 mảng trống để chứa dữ liệu
    //         $errors = [];
    //         if (empty($productName)) {
    //             $errors['ten_san_pham'] = 'Product name can not be null';
    //         }
    //         if (empty($productPrice)) {
    //             $errors['gia_san_pham'] = 'Please enter product price';
    //         }
    //         if (empty($productQuantity)) {
    //             $errors['so_luong'] = 'Please enter amount of products';
    //         }
    //         if (empty($productDate)) {
    //             $errors['ngay_nhap'] = 'Date can not be null';
    //         }
    //         if ($categoryID == 0) {
    //             $errors['danh_muc_id'] = 'Please select category';
    //         }
    //         if (empty($productStatus)) {
    //             $errors['trang_thai'] = 'Please select status';
    //         }

    //         $_SESSION['error'] = $errors;

    //         $newFile = $oldFiles;

    //         // kiểm tra nếu upload ảnh mới ok
    //         if (isset($image) && $image['error'] === UPLOAD_ERR_OK) {
    //             // up ảnh mới
    //             $newFile = UploadFile($image, './uploads/');

    //             // xóa ảnh cũ nếu có
    //             if (!empty($oldFiles)) {
    //                 DeleteFile($oldFiles);
    //             }
    //         }

    //         // nếu như không có lỗi thì thực thi
    //         if (empty($errors)) {
    //             // sửa product
    //             $this->productModel->UpdateProduct(
    //                 $productID,
    //                 $productName,
    //                 $productPrice,
    //                 $productDiscount,
    //                 $productQuantity,
    //                 $productDate,
    //                 $categoryID,
    //                 $productStatus,
    //                 $productDes,
    //                 $newFile
    //             );
    //             $_SESSION['message'] = 'New Product has been added';
    //             header("Location: " . BASE_URL_ADMIN . '?act=Product');
    //             exit();
    //         } else {
    //             // trả về lỗi 
    //             // xóa session sau khi hiển thị form
    //             $_SESSION['flash'] = true;
    //             header("Location: " . BASE_URL_ADMIN . '?act=Edit-Product-Form&Product-id=' . $productID);
    //             exit();
    //         }
    //     }
    // }

    // public function PostEditingAlbum()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $productID = $_POST['san_pham_id'] ?? '';
    //         // lấy danh sách ảnh từ sản phẩm
    //         $currentListImg = $this->productModel->GetProductImage($productID);

    //         // xử lý dữ liệu lấy từ form
    //         $img_array = $_FILES['img_array'];
    //         $img_delete = isset($_POST['img_delete']) ? explode(',', $_POST['img_delete']) : [];
    //         $currentImgID = $_POST['current_img_ids'] ?? [];

    //         // khai báo mảng để lưu ảnh mới được thêm vào hoặc thay thế ảnh cũ
    //         $upload_file = [];

    //         // up ảnh mới hoặc thay thế ảnh cũ
    //         foreach ($img_array['name'] as $key => $value) {
    //             if ($img_array['error'][$key] == UPLOAD_ERR_OK) {
    //                 $new_File = UploadAlbumFiles($img_array, './uploads/', $key);

    //                 if ($new_File) {
    //                     $upload_file[] = [
    //                         'id' => $currentImgID[$key] ?? null,
    //                         'file' => $new_File
    //                     ];
    //                 }
    //             }
    //         }


    //         // lưu ảnh mới và xóa ảnh cũ nếu như có
    //         foreach ($upload_file as $file_info) {
    //             if ($file_info['id']) {
    //                 $old_file = $this->productModel->GetDetailProductImg($file_info['id'])['link_hinh_anh'];

    //                 // cập nhật ảnh cũ  
    //                 $this->productModel->updateAlbum($file_info['id'], $file_info['file']);

    //                 // xóa ảnh cũ
    //                 DeleteFile($old_file);
    //             } else {
    //                 // Thêm ảnh mới
    //                 $this->productModel->AddAlbumToProduct($productID, $file_info['file']);
    //             }
    //         }

    //         // thao tác xóa ảnh
    //         foreach ($currentListImg as $img) {
    //             $imgID = $img['id'];
    //             if (in_array($imgID, $img_delete)) {
    //                 // xóa ảnh db
    //                 $this->productModel->DestroyProductImg($imgID);

    //                 // xóa file
    //                 DeleteFile($img['link_hinh_anh']);
    //             }
    //         }
    //         header("Location: " . BASE_URL_ADMIN . '?act=Edit-Product-Form&Product-id=' . $productID);
    //         exit();
    //     }
    // }

    // public function DeleteProduct()
    // {
    //     $id = $_GET['Product-id'];
    //     $product = $this->productModel->GetSelectProduct($id);
    //     $listProductImg = $this->productModel->GetProductImage($id);

    //     if ($product) {
    //         DeleteFile($product['hinh_anh']);

    //         if ($listProductImg) {
    //             foreach ($listProductImg as $productImg) {
    //                 DeleteFile($productImg['link_hinh_anh']);
    //                 $this->productModel->DestroyProductImg($productImg['id']);
    //             }
    //         }

    //         $this->productModel->DestroyProduct($id);

    //         $_SESSION['message'] = 'Product has been deleted';
    //     }

    //     header("Location: " . BASE_URL_ADMIN . '?act=Product');
    //     exit();
    // }

    // public function DetailProduct()
    // {
    //     $id = $_GET['Product-id'];
    //     $product = $this->productModel->GetSelectProduct($id);
    //     $listImage = $this->productModel->GetProductImage($id);
    //     if ($product) {
    //         require_once './views/Product/DetailProduct.php';
    //         DeleteSesstionError();
    //     } else {
    //         header("Location: " . BASE_URL_ADMIN . '?act=Product');
    //         exit();
    //     }
    // }
}
