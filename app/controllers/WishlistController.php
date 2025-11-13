<?php

class WishlistController extends Controller
{
    private $userId = 1; // sau đăng nhập đổi lại

    public function index()
    {
        $wishlist = new Wishlist();
        $data['items'] = $wishlist->getAllByUser($this->userId);

        $this->render("wishlist/index", $data);
    }

    public function add()
    {
        $productId = $_GET['product_id'] ?? 0;
        $wishlist = new Wishlist();
        $wishlist->add($this->userId, $productId);

        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function remove()
    {
        $productId = $_GET['product_id'] ?? 0;
        $wishlist = new Wishlist();
        $wishlist->remove($this->userId, $productId);

        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }
}
