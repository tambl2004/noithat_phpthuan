<?php

class Wishlist extends Model
{
    protected $table = "wishlists";

    public function getAllByUser($userId)
    {
        $userId = (int)$userId;
        $conn = self::connect();

        $sql = "SELECT w.*, p.name, p.price, p.image
                FROM wishlists w
                JOIN products p ON p.id = w.product_id
                WHERE w.user_id = $userId";

        return $conn->query($sql);
    }

    public function add($userId, $productId)
    {
        $userId = (int)$userId;
        $productId = (int)$productId;
        $conn = self::connect();

        $sql = "INSERT IGNORE INTO wishlists (user_id, product_id)
                VALUES ($userId, $productId)";

        return $conn->query($sql);
    }

    public function remove($userId, $productId)
    {
        $userId = (int)$userId;
        $productId = (int)$productId;
        $conn = self::connect();

        $sql = "DELETE FROM wishlists
                WHERE user_id = $userId AND product_id = $productId";

        return $conn->query($sql);
    }
}
