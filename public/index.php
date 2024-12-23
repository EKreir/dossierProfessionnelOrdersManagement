<?php

session_start();

// Redirection vers la page de login si l'utilisateur arrive sur la racine
if ($_SERVER['REQUEST_URI'] === '/') {
    header('Location: /login');
    exit();
}

// Inclusion des fichiers nécessaires
require_once '../core/Database.php';
require_once '../core/Router.php';

// Contrôleurs
require_once '../app/controllers/OrderController.php';
require_once '../app/controllers/ProductController.php';
require_once '../app/controllers/AuthController.php';
// Modèles
require_once '../app/models/OrderModel.php';
require_once '../app/models/ProductModel.php';
require_once '../app/models/User.php';



// Initialisation du routeur
$router = new Router();

// Routes pour les produits
$router->addRoute('/products', 'ProductController', 'index');         // Afficher tous les produits
$router->addRoute('/product/create', 'ProductController', 'create');   // Formulaire pour ajouter un produit
$router->addRoute('/product/store', 'ProductController', 'store');     // Enregistrer un produit

// Routes pour les commandes
$router->addRoute('/orders', 'OrderController', 'index');             // Afficher toutes les commandes
$router->addRoute('/order/create', 'OrderController', 'create');      // Formulaire pour créer une commande
$router->addRoute('/order/store', 'OrderController', 'store');        // Enregistrer une commande
$router->addRoute('/order/view/{id}', 'OrderController', 'view');     // Détails d'une commande spécifique
$router->addRoute('/order/confirmation', 'OrderController', 'confirmation');  // Page de confirmation après la commande

// Routes pour l'authentification
$router->addRoute('/login', 'AuthController', 'login');               // Page de connexion
$router->addRoute('/register', 'AuthController', 'register');         // Page d'inscription
$router->addRoute('/logout', 'AuthController', 'logout');             // Déconnexion

// Gérer la requête
$router->handleRequest();
