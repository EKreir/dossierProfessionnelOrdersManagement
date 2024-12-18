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

    // Récupérer un produit par son ID
    public function getProductById($id) {
        $query = "SELECT * FROM products WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Ajouter un produit à la base de données
    public function createProduct($name, $price) {
        $query = "INSERT INTO products (name, price) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$name, $price]);
    }
}
