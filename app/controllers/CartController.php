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
    public function updateQuantity()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cartItemId = $_POST['cart_item_id'] ?? null;
            $type       = $_POST['type'] ?? null; // inc | dec

            if ($cartItemId && in_array($type, ['inc','dec'])) {
                require_once '../models/CartItem.php';
                $cartItemModel = new CartItem();
                $item = $cartItemModel->findById($cartItemId);

                if ($item) {
                    $qty = (int)$item['quantity'];
                    if ($type === 'inc') $qty++;
                    if ($type === 'dec' && $qty > 1) $qty--;

                    $cartItemModel->updateQuantity($cartItemId, $qty);
                }
            }
        }
        header('Location: index.php?controller=cart&action=index');
        exit;
    }

    public function checkoutSelected()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $selected = $_POST['selected_items'] ?? [];

            if (empty($selected)) {
                // Không chọn sản phẩm nào -> quay lại giỏ hàng
                $_SESSION['cart_error'] = "Vui lòng chọn ít nhất 1 sản phẩm để đặt hàng.";
                header('Location: index.php?controller=cart&action=index');
                exit;
            }

            // Lưu danh sách item đã chọn vào session để sang trang thanh toán dùng
            $_SESSION['checkout_items'] = $selected;
            header('Location: index.php?controller=checkout&action=index');
            exit;
        }
    }
}
