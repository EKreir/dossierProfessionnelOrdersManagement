<?php

class ProductController {

    public function index() {
        // Afficher tous les produits
        $productModel = new ProductModel();
        $products = $productModel->getAllProducts();
        require_once __DIR__ . '/../views/products.php';
    }
}
