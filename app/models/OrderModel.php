<?php
class OrderModel {

    private $conn;

    public function __construct() {
        $this->conn = (new Database())->getConnection();
    }

    // Obtenir toutes les commandes
    public function getAllOrders() {
        $query = "SELECT * FROM orders";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Créer une nouvelle commande
    public function createOrder($customerName, $customerEmail, $total) {
        $query = "INSERT INTO orders (customer_name, customer_email, total) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$customerName, $customerEmail, $total]);
    }
}
