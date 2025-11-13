<?php

class AdminCategoryController extends Controller {
    
    public function index() {
        // Kiểm tra quyền admin
        $this->checkAdmin();
        
        $category = new Category();
        $data['categories'] = $category->all();
        $data['pageTitle'] = 'Quản Lý Danh Mục';
        
        $this->render("admin/categories/index", $data, 'admin');
    }
    
    public function create() {
        $this->checkAdmin();
        $data['pageTitle'] = 'Thêm Danh Mục Mới';
        $this->render("admin/categories/create", $data, 'admin');
    }
    
    public function store() {
        $this->checkAdmin();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            
            if (empty($name)) {
                $data['error'] = "Tên danh mục không được để trống!";
                $data['pageTitle'] = 'Thêm Danh Mục Mới';
                return $this->render("admin/categories/create", $data, 'admin');
            }
            
            $category = new Category();
            $conn = Database::connect();
            $name = $conn->real_escape_string($name);
            
            $sql = "INSERT INTO categories (name) VALUES ('$name')";
            if ($conn->query($sql)) {
                $data['success'] = "Thêm danh mục thành công!";
                $data['categories'] = $category->all();
                $data['pageTitle'] = 'Quản Lý Danh Mục';
                return $this->render("admin/categories/index", $data, 'admin');
            } else {
                $data['error'] = "Có lỗi xảy ra khi thêm danh mục!";
                $data['pageTitle'] = 'Thêm Danh Mục Mới';
                return $this->render("admin/categories/create", $data, 'admin');
            }
        }
        
        header("Location: index.php?option=admincategories");
        exit;
    }
    
    public function delete() {
        $this->checkAdmin();
        
        $id = $_GET['id'] ?? 0;
        if ($id > 0) {
            $conn = Database::connect();
            $sql = "DELETE FROM categories WHERE id = $id";
            $conn->query($sql);
        }
        
        header("Location: index.php?option=admincategories");
        exit;
    }
}

