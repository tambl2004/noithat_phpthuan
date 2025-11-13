<?php

class Controller {
    public function render($view, $data = [], $layout = 'client') {

        extract($data);

        $viewFile = __DIR__ . '/../views/' . $view . '.php';
        $layoutFile = __DIR__ . '/../views/layout/' . $layout . '.php';

        if (!file_exists($viewFile)) {
            die("View $viewFile không tồn tại!");
        }

        include $layoutFile;
    }

    /**
     * Kiểm tra quyền admin - nếu không phải admin thì chuyển về trang đăng nhập
     */
    protected function checkAdmin() {
        // Kiểm tra đã đăng nhập chưa
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?option=login");
            exit;
        }

        // Kiểm tra quyền admin
        if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 'admin') {
            header("Location: index.php?option=home");
            exit;
        }
    }

    /**
     * Kiểm tra đã đăng nhập chưa
     */
    protected function checkLogin() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?option=login");
            exit;
        }
    }
}
