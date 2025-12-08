<?php
class Database {
    private $host, $user, $pass, $db;
    public $conn;

    public function __construct() {
        include __DIR__ . '/../config.php';

        $this->host = $config['host'];
        $this->user = $config['username'];
        $this->pass = $config['password'];
        $this->db   = $config['db_name'];

        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);

        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    public function all($table) {
        $result = $this->conn->query("SELECT * FROM $table");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function find($table, $id) {
        $result = $this->conn->query("SELECT * FROM $table WHERE id=$id");
        return $result->fetch_assoc();
    }

    public function insert($table, $data) {
        $keys = implode(",", array_keys($data));
        $vals = "'" . implode("','", array_values($data)) . "'";
        return $this->conn->query("INSERT INTO $table ($keys) VALUES ($vals)");
    }

    public function update($table, $data, $id) {
        $set = "";
        foreach ($data as $k => $v) {
            $set .= "$k='$v',";
        }
        $set = rtrim($set, ",");

        return $this->conn->query("UPDATE $table SET $set WHERE id=$id");
    }

    public function delete($table, $id) {
        return $this->conn->query("DELETE FROM $table WHERE id=$id");
    }
}
