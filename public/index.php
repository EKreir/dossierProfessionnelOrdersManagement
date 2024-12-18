<?php

require_once '../core/Database.php';
require_once '../core/Router.php';
require_once '../app/controllers/OrderController.php';
require_once '../app/controllers/ProductController.php';
require_once '../app/models/OrderModel.php';
require_once '../app/models/ProductModel.php';

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

// Gérer la requête
$router->handleRequest();
