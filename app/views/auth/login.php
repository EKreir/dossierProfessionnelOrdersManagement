<?php include __DIR__ . '/../partials/header.php'; ?>

<form action="/login" method="POST">
    <input type="text" name="username" placeholder="Nom d'utilisateur" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button type="submit">Se connecter</button>
    
    <?php if (isset($error) && !empty($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
</form>

<?php include __DIR__ . '/../partials/footer.php'; ?>
