<?php

class Model extends Database {

    protected $table;

    public function all() {
        $conn = self::connect();
        $sql = "SELECT * FROM $this->table";
        $result = $conn->query($sql);

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }
    public function find($id) {
        $conn = self::connect();
        $result = $conn->query("SELECT * FROM $this->table WHERE id = $id");
        return $result->fetch_assoc();
    }
    
}
