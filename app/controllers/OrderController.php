<?php

class OrderController {

    public function index() {
        // Afficher toutes les commandes
        $orderModel = new OrderModel();
        $orders = $orderModel->getAllOrders();
        require_once __DIR__ . '/../views/orders.php';
    }

    public function create() {
        // Créer une commande (on va passer par un formulaire simple)
        echo "Créer une commande";
        require_once __DIR__ . '/../views/order_form.php';
    }

    public function store() {
        // Enregistrer une nouvelle commande dans la base de données
        echo "Enregistrer une nouvelle commande";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $customerName = $_POST['customer_name'];
            $customerEmail = $_POST['customer_email'];
            $total = $_POST['total']; // Total calculé côté front

            $orderModel = new OrderModel();
            $orderModel->createOrder($customerName, $customerEmail, $total);
            require_once __DIR__ . '/../views/order_confirmation.php';
        }
    }
}
