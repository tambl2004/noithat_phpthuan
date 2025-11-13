<?php

class MyAddress extends Model {
    protected $table = "my_address";

    public function getByUser($user_id) {
        $conn = self::connect();
        $sql = "SELECT * FROM my_address WHERE user_id = $user_id ORDER BY is_default DESC, id DESC";
        return $conn->query($sql);
    }

    public function getDefault($user_id) {
        $conn = self::connect();
        $sql = "SELECT * FROM my_address WHERE user_id = $user_id AND is_default = 1 LIMIT 1";
        $result = $conn->query($sql);
        return $result->fetch_assoc();
    }

    public function createAddress($user_id, $full_name, $phone, $address, $is_default = 0) {
        $conn = self::connect();
        $full_name = $conn->real_escape_string($full_name);
        $phone     = $conn->real_escape_string($phone);
        $address   = $conn->real_escape_string($address);

        if ($is_default) {
            $conn->query("UPDATE my_address SET is_default = 0 WHERE user_id = $user_id");
        }

        $sql = "INSERT INTO my_address (user_id, full_name, phone, address, is_default)
                VALUES ($user_id, '$full_name', '$phone', '$address', $is_default)";
        return $conn->query($sql);
    }

    public function updateAddress($id, $user_id, $full_name, $phone, $address, $is_default = 0) {
        $conn = self::connect();
        $full_name = $conn->real_escape_string($full_name);
        $phone     = $conn->real_escape_string($phone);
        $address   = $conn->real_escape_string($address);

        if ($is_default) {
            $conn->query("UPDATE my_address SET is_default = 0 WHERE user_id = $user_id");
        }

        $sql = "UPDATE my_address 
                SET full_name='$full_name', phone='$phone', address='$address', is_default=$is_default
                WHERE id = $id AND user_id = $user_id";
        return $conn->query($sql);
    }

    public function deleteAddress($id, $user_id) {
        $conn = self::connect();
        $sql = "DELETE FROM my_address WHERE id = $id AND user_id = $user_id";
        return $conn->query($sql);
    }

    public function setDefault($id, $user_id) {
        $conn = self::connect();
        $conn->query("UPDATE my_address SET is_default = 0 WHERE user_id = $user_id");
        $conn->query("UPDATE my_address SET is_default = 1 WHERE id = $id AND user_id = $user_id");
    }
}
