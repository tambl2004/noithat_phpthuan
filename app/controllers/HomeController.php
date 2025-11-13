<?php

class HomeController extends Controller {

    public function index() {
        // Lấy danh sách sản phẩm nổi bật
        $product = new Product();
        $data['products'] = array_slice($product->all(), 0, 8); // Lấy 8 sản phẩm đầu tiên
        
        // Lấy danh sách danh mục
        $category = new Category();
        $data['categories'] = $category->all();
        
        $this->render("home/index", $data);
    }
}
