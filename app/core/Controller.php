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
}
