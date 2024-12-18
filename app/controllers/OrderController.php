<?php

class OrderController {

    public function index() {
        // Afficher toutes les commandes
        $orderModel = new OrderModel();
        $orders = $orderModel->getAllOrders();
        require_once __DIR__ . '/../views/orders.php';
    }

    public function view($id) {
    $orderModel = new OrderModel();
    $order = $orderModel->getOrderById($id);
    $orderItems = $orderModel->getOrderItems($id);
    require_once __DIR__ . '/../views/order_view.php';
}


    public function create() {
        // Créer une commande (on va passer par un formulaire simple)
        $productModel = new ProductModel();
    $products = $productModel->getAllProducts();
        require_once __DIR__ . '/../views/order_form.php';
    }
    
    public function store() {
    // Enregistrer une nouvelle commande dans la base de données
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $customerName = $_POST['customer_name'];
        $customerEmail = $_POST['customer_email'];
        $productId = $_POST['product_id'];
        $quantity = $_POST['quantity'];

        // Calculer le total de la commande
        $productModel = new ProductModel();
        $product = $productModel->getProductById($productId);  // Appel de la méthode qui pose problème
        $total = $product['price'] * $quantity;

        // Enregistrer la commande
        $orderModel = new OrderModel();
        $orderModel->createOrder($customerName, $customerEmail, $total);

        // Enregistrer les articles de la commande
        $orderId = $orderModel->getLastOrderId();
        $orderModel->addOrderItem($orderId, $productId, $quantity);

        header('Location: /order/confirmation'); // Rediriger vers une page de confirmation
    }
}

public function confirmation() {
    // Afficher une page de confirmation après avoir créé une commande
    require_once __DIR__ . '/../views/order_confirmation.php';
}


}
