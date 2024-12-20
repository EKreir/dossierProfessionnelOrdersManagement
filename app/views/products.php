<?php include 'partials/header.php'; ?>

<?php include 'partials/navbar.php'; ?>

<div class="container mt-5">
    <h1 class="display-4 mb-4">Liste des produits</h1>
    
    <!-- Lien pour ajouter un produit -->
    <a href="/product/create" class="btn btn-primary mb-3">Ajouter un produit</a>
    
    <ul class="list-group">
        <?php foreach ($products as $product): ?>
            <li class="list-group-item">
                <strong><?php echo $product['name']; ?></strong> - 
                <?php echo $product['price']; ?> € 
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<?php include 'partials/footer.php'; ?>