<?php

class ProductController {

    public function index() {
        // Afficher tous les produits
        $productModel = new ProductModel();
        $products = $productModel->getAllProducts();
        require_once __DIR__ . '/../views/products.php';
    }

    // Afficher le formulaire de création de produit
    public function create() {
        require_once __DIR__ . '/../views/product_form.php';
    }

    // Enregistrer un nouveau produit
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];

            $productModel = new ProductModel();
            $productModel->createProduct($name, $price);

            header('Location: /products'); // Rediriger vers la liste des produits
        }
    }
}
