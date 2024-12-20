<?php

class OrderController {

    public function __construct() {
        // On démarre la session si ce n'est pas déjà fait
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Si l'utilisateur est connecté et qu'il est admin, il peut accéder aux actions admin
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
            // L'admin a accès à toutes les pages admin
            return; // On ne fait rien ici, l'accès est autorisé
        } elseif (isset($_SESSION['role']) && $_SESSION['role'] === 'client') {
            // Les clients peuvent créer des commandes, mais pas accéder à la gestion des commandes admin
            return;
        } else {
            // Si l'utilisateur n'est pas connecté, on redirige vers la page de connexion
            header('Location: /login');
            exit;
        }
    }

    // Afficher toutes les commandes (réservé à l'admin)
    public function index() {
        if ($_SESSION['role'] === 'admin') {
            $orderModel = new OrderModel();
            $orders = $orderModel->getAllOrders();
            require_once __DIR__ . '/../views/orders.php';
        } else {
            // Redirige le client s'il essaie d'accéder à cette page
            header('Location: /');  // Par exemple, redirige vers la page d'accueil ou une page d'erreur
            exit;
        }
    }

    // Afficher les détails d'une commande (réservé à l'admin)
    public function view($id) {
        if ($_SESSION['role'] === 'admin') {
            $orderModel = new OrderModel();
            $order = $orderModel->getOrderById($id);
            $orderItems = $orderModel->getOrderItems($id);
            require_once __DIR__ . '/../views/order_view.php';
        } else {
            // Redirige le client s'il essaie d'accéder à cette page
            header('Location: /');  // Ou redirige vers une autre page selon ton besoin
            exit;
        }
    }

    // Créer une commande (accessible au client)
    public function create() {
        if ($_SESSION['role'] === 'client') {
            $productModel = new ProductModel();
            $products = $productModel->getAllProducts();
            require_once __DIR__ . '/../views/order_form.php';
        } else {
            // Si l'utilisateur n'est pas un client, on redirige vers la page d'accueil ou autre page pertinente
            header('Location: /login');  // Ou une autre page qui indique que seuls les clients peuvent passer des commandes
            exit;
        }
    }

    // Enregistrer une nouvelle commande (accessible au client)
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SESSION['role'] === 'client') {
            $customerName = $_POST['customer_name'];
            $customerEmail = $_POST['customer_email'];
            $productId = $_POST['product_id'];
            $quantity = $_POST['quantity'];

            // Calculer le total de la commande
            $productModel = new ProductModel();
            $product = $productModel->getProductById($productId);
            $total = $product['price'] * $quantity;

            // Enregistrer la commande
            $orderModel = new OrderModel();
            $orderModel->createOrder($customerName, $customerEmail, $total);

            // Enregistrer les articles de la commande
            $orderId = $orderModel->getLastOrderId();
            $orderModel->addOrderItem($orderId, $productId, $quantity);

            header('Location: /order/confirmation');
            exit;
        } else {
            // Si l'utilisateur n'est pas un client ou si la méthode n'est pas POST, redirige-le
            header('Location: /login');
            exit;
        }
    }

    // Afficher une page de confirmation après avoir créé une commande
    public function confirmation() {
        require_once __DIR__ . '/../views/order_confirmation.php';
    }
}