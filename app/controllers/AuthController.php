<?php

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function login() {
        $error = '';  // Initialisation de la variable d'erreur
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            // Chercher l'utilisateur par son nom d'utilisateur
            $user = $this->userModel->getUserByUsername($username);

            // Vérifier si l'utilisateur existe et si le mot de passe est correct
            if ($user && $this->userModel->verifyPassword($password, $user['password'])) {
                // Connexion réussie, on stocke les infos dans la session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                // Rediriger l'utilisateur en fonction de son rôle
                if ($_SESSION['role'] == 'admin') {
                    header('Location: /orders');  // Page admin
                } else {
                    header('Location: /order/create');  // Page client pour créer une commande
                }
                exit;
            } else {
                // Connexion échouée
                $error = "Nom d'utilisateur ou mot de passe incorrect.";
            }
        }

        // Passer l'erreur à la vue si nécessaire
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