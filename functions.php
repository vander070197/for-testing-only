<?php
require_once "db.php";

class UserFunctions {

    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    // ADD DATA
    public function addUser($name, $email) {
        $stmt = $this->conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $email);
        return $stmt->execute();
    }

    // DELETE DATA
    public function deleteUser($id) {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // VIEW DATA
    public function getUsers() {
        $result = $this->conn->query("SELECT * FROM users ORDER BY id DESC");
        return $result;
    }
}
