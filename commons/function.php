<?php

// Kết nối CSDL qua PDO
function connectDB()
{
    // Kết nối CSDL
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);

        // cài đặt chế độ báo lỗi là xử lý ngoại lệ
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // cài đặt chế độ trả dữ liệu
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $conn;
    } catch (PDOException $e) {
        echo ("Connection failed: " . $e->getMessage());
    }
}

function UploadFile($file, $uploadFolder)
{
    $pathStorage = $uploadFolder . time() . $file['name'];

    $from = $file['tmp_name'];
    $to = PATH_ROOT . $pathStorage;

    if (move_uploaded_file($from, $to)) {
        return $pathStorage;
    }
    return null;
}

function DeleteFile($file)
{
    $pathDelete = PATH_ROOT . $file;
    if (file_exists($pathDelete)) {
        unlink($pathDelete);
    }
}

// xóa session
function DeleteSesstionError()
{
    if (isset($_SESSION['flash'])) {
        unset($_SESSION['flash']);
        unset($_SESSION['error']);
        // session_unset();
        // session_destroy();
    }
}

// Upload - Update album

function UploadAlbumFiles($file, $uploadFolder, $key)
{
    // ensure slash between folder and filename
    $filename = time() . '_' . basename($file['name'][$key]);

    $pathStorage = rtrim($uploadFolder, '/') . '/' . $filename;

    $from = $file['tmp_name'][$key];
    $to = PATH_ROOT . $pathStorage;

    if (move_uploaded_file($from, $to)) {
        // Return path for database like: /uploads/filename.jpg
        return $pathStorage;
    }
    return null;
}


// format ngày
function FormatDate($date)
{
    return date("d-m-Y", strtotime($date));
}

function Auth()
{
    if (!isset($_SESSION['user_admin'])) {
        header("Location: " . BASE_URL_ADMIN . '?act=Login');
        exit();
    }
}

function PriceFormat($price)
{
    return number_format($price, 0, ',', '.');
}

function getCategories()
{
    require_once './models/Category.php';
    $categoryModel = new Category();
    return $categoryModel->GetAllCategory();
}
