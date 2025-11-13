<?php
session_start();

// load routes
require_once __DIR__ . '/../app/config/routes.php';

// autoload class
spl_autoload_register(function($class) {
    $folders = ['../app/controllers/', '../app/controllers/admin/', '../app/models/', '../app/core/'];
    foreach ($folders as $folder) {
        $file = $folder . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// lấy route từ URL
$option = $_GET['option'] ?? 'home';
$action = $_GET['action'] ?? 'index';

// check route tồn tại
if (!isset($routes[$option])) {
    die("404 - Không tìm thấy route");
}

$controllerName = $routes[$option]['controller'];
$methodName     = $routes[$option]['action'] ?? $action;

// gọi controller
$controller = new $controllerName();
$controller->$methodName();
