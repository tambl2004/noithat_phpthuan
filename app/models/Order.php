<?php

class Order extends Model {
    protected $table = "orders";

    public function createOrder($user_id, $address_id, $payment_method, $total_price) {
        $conn = self::connect();
        $payment_method = $conn->real_escape_string($payment_method);
        $sql = "INSERT INTO orders (user_id, address_id, payment_method, total_price)
                VALUES ($user_id, $address_id, '$payment_method', $total_price)";
        $conn->query($sql);
        return $conn->insert_id;
    }
}
