<?php 

// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS

// Đường dẫn đến phần của Client
define('BASE_URL'       , 'http://localhost/Dream-Figure/');
// Đường dẫn đến phần của Admin
define('BASE_URL_ADMIN'       , 'http://localhost/Dream-Figure/admin/');

define('DB_HOST'    , 'localhost');
define('DB_PORT'    , 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME'    , 'dream_figure');  // Tên database

define('PATH_ROOT'    , __DIR__ . '/../');
