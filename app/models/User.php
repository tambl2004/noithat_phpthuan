<?php

class User extends Model {
    protected $table = "users";

    public function findByEmail($email) {
        $conn = self::connect();
        $email = $conn->real_escape_string($email);

        $sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $result = $conn->query($sql);

        return $result->fetch_assoc();
    }

    public function create($name, $email, $password, $role = 'user') {
        $conn = self::connect();

        $name = $conn->real_escape_string($name);
        $email = $conn->real_escape_string($email);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $role = $conn->real_escape_string($role);

        $sql = "INSERT INTO users (name, email, password, role)
                VALUES ('$name', '$email', '$password', '$role')";

        return $conn->query($sql);
    }
}
