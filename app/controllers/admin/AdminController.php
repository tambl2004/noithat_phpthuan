<?php

class AdminController extends Controller {
    
    public function dashboard() {
        // Kiểm tra quyền admin
        $this->checkAdmin();
        
        // Lấy thống kê
        $product = new Product();
        $category = new Category();
        $user = new User();
        $order = new Order();
        
        $data['totalProducts'] = count($product->all());
        $data['totalCategories'] = count($category->all());
        $data['totalUsers'] = count($user->all());
        
        // Lấy tổng doanh thu
        $conn = Database::connect();
        $result = $conn->query("SELECT SUM(total_price) as total FROM orders WHERE status = 'completed'");
        $row = $result->fetch_assoc();
        $data['totalRevenue'] = $row['total'] ?? 0;
        
        // Lấy đơn hàng gần đây
        $result = $conn->query("SELECT * FROM orders ORDER BY created_at DESC LIMIT 5");
        $data['recentOrders'] = [];
        while ($row = $result->fetch_assoc()) {
            $data['recentOrders'][] = $row;
        }
        
        $this->render("admin/dashboard", $data, 'admin');
    }
    
    public function categories() {
        $this->checkAdmin();
        header("Location: index.php?option=admincategories");
        exit;
    }
    
    public function products() {
        $this->checkAdmin();
        header("Location: index.php?option=adminproducts");
        exit;
    }
    
}
