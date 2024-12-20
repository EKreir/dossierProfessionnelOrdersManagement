<?php include 'partials/header.php'; ?>

<?php include 'partials/navbar.php'; ?>

<div class="container mt-5">
    <h1 class="display-4 mb-4">Ajouter un nouveau produit</h1>

    <form method="POST" action="/product/store">
        <div class="mb-3">
            <label for="name" class="form-label">Nom du produit :</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prix :</label>
            <input type="number" name="price" id="price" class="form-control" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-success">Ajouter le produit</button>
    </form>
</div>

<?php include 'partials/footer.php'; ?>
