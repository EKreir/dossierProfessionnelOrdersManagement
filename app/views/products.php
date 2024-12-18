<?php include 'partials/header.php'; ?>

<h1>Liste des produits</h1>
<a href="/product/create">Ajouter un produit</a>
<ul>
    <?php foreach ($products as $product): ?>
        <li>
            <?php echo $product['name']; ?> - 
            <?php echo $product['price']; ?> € - 
        </li>
    <?php endforeach; ?>
</ul>

<?php include 'partials/footer.php'; ?>