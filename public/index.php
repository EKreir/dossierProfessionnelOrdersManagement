<?php

require_once '../core/Database.php';
require_once '../core/Router.php';
require_once '../app/controllers/OrderController.php';
require_once '../app/controllers/ProductController.php';
require_once '../app/models/OrderModel.php';
require_once '../app/models/ProductModel.php';

$router = new Router();
$router->addRoute('/orders', 'OrderController', 'index');
$router->addRoute('/order/create', 'OrderController', 'create');
$router->addRoute('/order/store', 'OrderController', 'store');
$router->addRoute('/products', 'ProductController', 'index');

// Gérer la requête
$router->handleRequest();
