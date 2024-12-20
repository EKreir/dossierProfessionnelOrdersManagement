<?php

class User {
    private $conn;

    public function __construct() {
        $this->conn = (new Database())->getConnection();
    }

    public function createUser($username, $password, $role = 'client') {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$username, $hashedPassword, $role]);
    }

    public function getUserByUsername($username) {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function verifyPassword($inputPassword, $storedPassword) {
        return password_verify($inputPassword, $storedPassword);
    }
}