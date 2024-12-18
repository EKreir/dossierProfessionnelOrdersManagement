<?php

class ProductModel {

    private $conn;

    public function __construct() {
        $this->conn = (new Database())->getConnection();
    }

    // Obtenir tous les produits
    public function getAllProducts() {
        $query = "SELECT * FROM products";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
