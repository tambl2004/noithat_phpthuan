<?php

class AdminProductController extends Controller {
    
    public function index() {
        $this->checkAdmin();
        
        $product = new Product();
        $data['products'] = $product->all();
        $data['pageTitle'] = 'Quản Lý Sản Phẩm';
        
        $this->render("admin/products/index", $data, 'admin');
    }
    
    public function create() {
        $this->checkAdmin();
        
        $category = new Category();
        $data['categories'] = $category->all();
        $data['pageTitle'] = 'Thêm Sản Phẩm Mới';
        
        $this->render("admin/products/create", $data, 'admin');
    }
    
    public function store() {
        $this->checkAdmin();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $price = $_POST['price'] ?? 0;
            $category_id = $_POST['category_id'] ?? 0;
            $description = $_POST['description'] ?? '';
            $image = $_POST['image'] ?? '';
            
            if (empty($name) || $price <= 0) {
                $data['error'] = "Vui lòng điền đầy đủ thông tin!";
                $category = new Category();
                $data['categories'] = $category->all();
                $data['pageTitle'] = 'Thêm Sản Phẩm Mới';
                return $this->render("admin/products/create", $data, 'admin');
            }
            
            $conn = Database::connect();
            $name = $conn->real_escape_string($name);
            $description = $conn->real_escape_string($description);
            $image = $conn->real_escape_string($image);
            $price = (int)$price;
            $category_id = (int)$category_id;
            
            $sql = "INSERT INTO products (name, price, category_id, description, image) 
                    VALUES ('$name', $price, $category_id, '$description', '$image')";
            
            if ($conn->query($sql)) {
                $data['success'] = "Thêm sản phẩm thành công!";
                $product = new Product();
                $data['products'] = $product->all();
                $data['pageTitle'] = 'Quản Lý Sản Phẩm';
                return $this->render("admin/products/index", $data, 'admin');
            } else {
                $data['error'] = "Có lỗi xảy ra khi thêm sản phẩm!";
                $category = new Category();
                $data['categories'] = $category->all();
                $data['pageTitle'] = 'Thêm Sản Phẩm Mới';
                return $this->render("admin/products/create", $data, 'admin');
            }
        }
        
        header("Location: index.php?option=adminproducts");
        exit;
    }
    
    public function edit() {
        $this->checkAdmin();
        
        $id = $_GET['id'] ?? 0;
        $product = new Product();
        $category = new Category();
        
        $data['product'] = $product->find($id);
        $data['categories'] = $category->all();
        $data['pageTitle'] = 'Chỉnh Sửa Sản Phẩm';
        
        if (!$data['product']) {
            header("Location: index.php?option=adminproducts");
            exit;
        }
        
        $this->render("admin/products/edit", $data, 'admin');
    }
    
    public function update() {
        $this->checkAdmin();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? 0;
            $name = $_POST['name'] ?? '';
            $price = $_POST['price'] ?? 0;
            $category_id = $_POST['category_id'] ?? 0;
            $description = $_POST['description'] ?? '';
            $image = $_POST['image'] ?? '';
            
            if (empty($name) || $price <= 0) {
                $data['error'] = "Vui lòng điền đầy đủ thông tin!";
                $product = new Product();
                $category = new Category();
                $data['product'] = $product->find($id);
                $data['categories'] = $category->all();
                $data['pageTitle'] = 'Chỉnh Sửa Sản Phẩm';
                return $this->render("admin/products/edit", $data, 'admin');
            }
            
            $conn = Database::connect();
            $name = $conn->real_escape_string($name);
            $description = $conn->real_escape_string($description);
            $image = $conn->real_escape_string($image);
            $price = (int)$price;
            $category_id = (int)$category_id;
            $id = (int)$id;
            
            $sql = "UPDATE products SET name = '$name', price = $price, category_id = $category_id, 
                    description = '$description', image = '$image' WHERE id = $id";
            
            if ($conn->query($sql)) {
                $data['success'] = "Cập nhật sản phẩm thành công!";
                $product = new Product();
                $data['products'] = $product->all();
                $data['pageTitle'] = 'Quản Lý Sản Phẩm';
                return $this->render("admin/products/index", $data, 'admin');
            } else {
                $data['error'] = "Có lỗi xảy ra khi cập nhật sản phẩm!";
                $product = new Product();
                $category = new Category();
                $data['product'] = $product->find($id);
                $data['categories'] = $category->all();
                $data['pageTitle'] = 'Chỉnh Sửa Sản Phẩm';
                return $this->render("admin/products/edit", $data, 'admin');
            }
        }
        
        header("Location: index.php?option=adminproducts");
        exit;
    }
    
    public function delete() {
        $this->checkAdmin();
        
        $id = $_GET['id'] ?? 0;
        if ($id > 0) {
            $conn = Database::connect();
            $sql = "DELETE FROM products WHERE id = $id";
            $conn->query($sql);
        }
        
        header("Location: index.php?option=adminproducts");
        exit;
    }
}

