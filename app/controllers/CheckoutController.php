<?php

class CheckoutController extends Controller {

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

        $addrModel = new MyAddress();
        $addresses = $addrModel->getByUser($user_id);
        $defaultAddress = $addrModel->getDefault($user_id);

        // tính tổng tiền
        $items_array = [];
        $total = 0;
        while ($row = $items->fetch_assoc()) {
            $subtotal = $row['price'] * $row['quantity'];
            $row['subtotal'] = $subtotal;
            $items_array[] = $row;
            $total += $subtotal;
        }

        // nếu submit thanh toán
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $address_id = (int)$_POST['address_id'];
            $payment_method = $_POST['payment_method']; // COD / MOMO

            if ($address_id <= 0) {
                $data['error'] = "Vui lòng chọn địa chỉ giao hàng.";
            } else {
                // tạo order
                $orderModel = new Order();
                $orderItemModel = new OrderItem();

                $order_id = $orderModel->createOrder($user_id, $address_id, $payment_method, $total);

                // lưu từng item
                foreach ($items_array as $it) {
                    $orderItemModel->addItem($order_id, $it['product_id'], $it['quantity'], $it['price']);
                }

                // xóa cart_items (cho sạch giỏ)
                $conn = Database::connect();
                $conn->query("DELETE FROM cart_items WHERE cart_id = $cart_id");

                $data['success'] = "Đặt hàng thành công! Mã đơn: #" . $order_id;
                $data['items'] = [];
                $data['total'] = 0;
                $data['addresses'] = $addresses;
                $data['defaultAddress'] = $defaultAddress;
                return $this->render("checkout/index", $data);
            }
        }

        $data['items'] = $items_array;
        $data['total'] = $total;
        $data['addresses'] = $addresses;
        $data['defaultAddress'] = $defaultAddress ?? null;

        $this->render("checkout/index", $data);
    }
}
