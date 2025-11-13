<?php

class OrderItem extends Model {
    protected $table = "order_items";

    public function addItem($order_id, $product_id, $quantity, $price) {
        $conn = self::connect();
        $sql = "INSERT INTO order_items (order_id, product_id, quantity, price)
                VALUES ($order_id, $product_id, $quantity, $price)";
        return $conn->query($sql);
    }
}
