<?php

class CartItem extends Model {
    protected $table = "cart_items";

    public function getItems($cart_id) {
        $conn = self::connect();

        $sql = "
            SELECT ci.*, p.name, p.price, p.image
            FROM cart_items ci
            JOIN products p ON ci.product_id = p.id
            WHERE ci.cart_id = $cart_id
        ";

        return $conn->query($sql);
    }

    public function addItem($cart_id, $product_id) {
        $conn = self::connect();

        // kiểm tra sản phẩm đã có trong giỏ chưa
        $sql = "SELECT id, quantity FROM cart_items 
                WHERE cart_id = $cart_id AND product_id = $product_id";

        $result = $conn->query($sql);

        if ($row = $result->fetch_assoc()) {
            // tăng số lượng
            $qty = $row['quantity'] + 1;
            $conn->query("UPDATE cart_items SET quantity = $qty WHERE id = ".$row['id']);
        } else {
            // thêm mới
            $conn->query("
                INSERT INTO cart_items (cart_id, product_id, quantity)
                VALUES ($cart_id, $product_id, 1)
            ");
        }
    }

    public function remove($id) {
        $conn = self::connect();
        $conn->query("DELETE FROM cart_items WHERE id = $id");
    }
}
