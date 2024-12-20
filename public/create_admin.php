<?php

// Remplacer ces variables par les informations de connexion à ta base de données
$host = 'localhost';        // Adresse de la base de données
$dbname = 'commerce'; // Nom de ta base de données
$username = 'eliess';         // Nom d'utilisateur de la base de données (par défaut pour XAMPP/MAMP)
$password = 'Eliess2001#@!';             // Mot de passe de la base de données (par défaut vide pour XAMPP/MAMP)

try {
    // Connexion à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Vérifier si l'utilisateur admin existe déjà
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => 'admin']);
    $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingUser) {
        echo "L'utilisateur 'admin' existe déjà dans la base de données.";
    } else {
        // Création du mot de passe hashé pour l'admin
        $adminPassword = 'admin'; // Change ce mot de passe si tu veux
        $hashedPassword = password_hash($adminPassword, PASSWORD_DEFAULT);

        // Insérer l'utilisateur admin dans la base de données
        $stmt = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (:username, :password, :role)");
        $stmt->execute([
            'username' => 'admin',
            'password' => $hashedPassword,
            'role' => 'admin'
        ]);

        echo "L'utilisateur 'admin' a été créé avec succès.";
    }
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
