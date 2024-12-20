<?php

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            // Chercher l'utilisateur dans la base de données
            $user = $this->userModel->getUserByUsername($username);

            // Si l'utilisateur existe et que le mot de passe est correct
            if ($user && $this->userModel->verifyPassword($password, $user['password'])) {
                // Définir les variables de session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                // Redirection en fonction du rôle
                if ($user['role'] == 'admin') {
                    header('Location: /orders'); // Redirige vers la page des commandes pour l'admin
                } else {
                    header('Location: /order/create'); // Redirige vers la page de création de commande pour le client
                }
                exit;
            } else {
                $error = "Nom d'utilisateur ou mot de passe incorrect.";
            }
        }

        require_once __DIR__ . '/../views/auth/login.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $passwordConfirm = $_POST['password_confirm'] ?? '';

            if ($password === $passwordConfirm) {
                $this->userModel->createUser($username, $password);
                header('Location: /login');
                exit;
            } else {
                $error = "Les mots de passe ne correspondent pas.";
            }
        }
        require_once __DIR__ . '/../views/auth/register.php';
    }

    public function logout() {
        session_unset();
        session_destroy();
        header('Location: /login');
        exit;
    }
}