<?php

class ProductController extends Controller {

    public function index() {
        $product = new Product();
        $data['products'] = $product->all();

        $this->render("product/index", $data);
    }

    public function detail() {
        $id = $_GET['id'] ?? 0;

        $product = new Product();
        $data['p'] = $product->find($id);

        $this->render("product/detail", $data);
    }
}
