<?php include 'partials/header.php'; ?>

<div class="container mt-5">
    <h1 class="text-center">Passer une commande</h1>

    <div class="d-flex justify-content-end mb-3">
        <form action="/logout" method="POST">
            <button type="submit" class="btn btn-danger">Déconnexion</button>
        </form>
    </div>

    <form method="POST" action="/order/store" class="col-md-8 mx-auto">
        <div class="mb-3">
            <label for="customer_name" class="form-label">Nom :</label>
            <input type="text" class="form-control" name="customer_name" required>
        </div>
        
        <div class="mb-3">
            <label for="customer_email" class="form-label">Email :</label>
            <input type="email" class="form-control" name="customer_email" required>
        </div>
        
        <div class="mb-3">
            <label for="product_id" class="form-label">Produit :</label>
            <select name="product_id" class="form-select" required>
                <?php foreach ($products as $product): ?>
                    <option value="<?php echo $product['id']; ?>">
                        <?php echo $product['name']; ?> - <?php echo $product['price']; ?> €
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantité :</label>
            <input type="number" class="form-control" name="quantity" required>
        </div>
        
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Commander</button>
        </div>
    </form>
</div>

<?php include 'partials/footer.php'; ?>
