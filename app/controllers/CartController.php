<?php

class CartController extends Controller {

    public function index() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?option=login");
            exit;
        }

        $user_id = $_SESSION['user_id'];

        $cart = new Cart();
        $cart_id = $cart->getUserCartId($user_id);

        $cartItem = new CartItem();
        $items = $cartItem->getItems($cart_id);

        $data['items'] = $items;
        $this->render("cart/index", $data);
    }

    public function add() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?option=login");
            exit;
        }

        $user_id = $_SESSION['user_id'];
        $product_id = $_GET['id'];

        $cart = new Cart();
        $cart_id = $cart->getUserCartId($user_id);

        $cartItem = new CartItem();
        $cartItem->addItem($cart_id, $product_id);

        header("Location: index.php?option=giohang");
    }

    public function remove() {
        $id = $_GET['id']; // cart_items id

        $cartItem = new CartItem();
        $cartItem->remove($id);

        header("Location: index.php?option=giohang");
    }
}
