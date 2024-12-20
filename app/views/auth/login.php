<?php include __DIR__ . '/../partials/header.php'; ?>

<div class="container mt-5">
    <h2 class="text-center">Se connecter</h2>
    <form action="/login" method="POST" class="col-md-6 mx-auto">
        <div class="mb-3">
            <label for="username" class="form-label">Nom d'utilisateur</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Nom d'utilisateur" required>
        </div>
        
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" required>
        </div>

        <?php if (isset($error) && !empty($error)): ?>
            <div class="alert alert-danger">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </div>
    </form>

    <div class="d-flex justify-content-center mt-3">
        <a href="/register" class="btn btn-secondary">S'inscrire</a>
    </div>

</div>

<?php include __DIR__ . '/../partials/footer.php'; ?>