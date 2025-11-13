<?php

class Cart extends Model {
    protected $table = "carts";

    public function getUserCartId($user_id) {
        $conn = self::connect();

        // kiểm tra cart tồn tại
        $sql = "SELECT id FROM carts WHERE user_id = $user_id LIMIT 1";
        $result = $conn->query($sql);

        if ($row = $result->fetch_assoc()) {
            return $row['id'];
        }

        // tạo cart mới
        $conn->query("INSERT INTO carts (user_id) VALUES ($user_id)");
        return $conn->insert_id;
    }
}
