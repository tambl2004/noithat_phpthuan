<?php

class Category extends Model
{
    protected $table = "categories";

    public function all()
    {
        $conn = self::connect();
        $sql = "SELECT * FROM $this->table ORDER BY id DESC";
        $result = $conn->query($sql);
        
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function find($id)
    {
        $id = (int)$id;
        $conn = self::connect();
        $sql = "SELECT * FROM $this->table WHERE id = $id LIMIT 1";
        $result = $conn->query($sql);
        return $result->fetch_assoc();
    }

    public function create($name)
    {
        $conn = self::connect();
        $name = $conn->real_escape_string($name);

        $sql = "INSERT INTO $this->table (name) VALUES ('$name')";
        return $conn->query($sql);
    }

    public function updateCategory($id, $name)
    {
        $id = (int)$id;
        $conn = self::connect();
        $name = $conn->real_escape_string($name);

        $sql = "UPDATE $this->table SET name='$name' WHERE id=$id";
        return $conn->query($sql);
    }

    public function delete($id)
    {
        $id = (int)$id;
        $conn = self::connect();
        $sql = "DELETE FROM $this->table WHERE id=$id";
        return $conn->query($sql);
    }
}
