<h1>Liste des produits</h1>
<ul>
    <?php foreach ($products as $product): ?>
        <li><?php echo $product['name']; ?> - <?php echo $product['price']; ?> €</li>
    <?php endforeach; ?>
</ul>
