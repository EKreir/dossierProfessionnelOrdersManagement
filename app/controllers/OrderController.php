<?php

class OrderController {

    public function __construct() {
        // Vérifier si l'utilisateur est connecté
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login'); // Rediriger vers la page de login si l'utilisateur n'est pas connecté
            exit;
        }
    }

    public function index() {
        // Vérifier si l'utilisateur est un admin
        if ($_SESSION['role'] != 'admin') {
            header('Location: /order/create'); // Rediriger vers la page de création de commande si ce n'est pas un admin
            exit;
        }

        // Afficher toutes les commandes
        $orderModel = new OrderModel();
        $orders = $orderModel->getAllOrders();
        require_once __DIR__ . '/../views/orders.php';
    }

    public function view($id) {
        // Vérifier si l'utilisateur est un admin ou le client de la commande
        $orderModel = new OrderModel();
        $order = $orderModel->getOrderById($id);
        
        if ($_SESSION['role'] != 'admin' && $order['customer_id'] != $_SESSION['user_id']) {
            header('Location: /orders'); // Rediriger si l'utilisateur n'a pas accès à cette commande
            exit;
        }

        $orderItems = $orderModel->getOrderItems($id);
        require_once __DIR__ . '/../views/order_view.php';
    }

    public function create() {
        // Vérifier si l'utilisateur est un client
        if ($_SESSION['role'] == 'admin') {
            header('Location: /orders'); // Rediriger vers l'admin si c'est un administrateur
            exit;
        }

        // Créer une commande (on va passer par un formulaire simple)
        $productModel = new ProductModel();
        $products = $productModel->getAllProducts();
        require_once __DIR__ . '/../views/order_form.php';
    }
    
    public function store() {
        // Vérifier si l'utilisateur est un client
        if ($_SESSION['role'] == 'admin') {
            header('Location: /orders'); // Rediriger vers la page des commandes si c'est un administrateur
            exit;
        }

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
            exit;
        }
    }

    public function confirmation() {
        // Vérifier si l'utilisateur est un client ou un admin
        if ($_SESSION['role'] == 'admin') {
            header('Location: /orders'); // Rediriger vers la page admin si c'est un administrateur
            exit;
        }

        // Afficher une page de confirmation après avoir créé une commande
        require_once __DIR__ . '/../views/order_confirmation.php';
    }
}
