<?php

class Database {
    protected static $conn;

    public static function connect() {
        if (!self::$conn) {
            self::$conn = new mysqli("localhost", "root", "root", "noithat");
            self::$conn->set_charset("utf8");
        }
        return self::$conn;
    }
}
