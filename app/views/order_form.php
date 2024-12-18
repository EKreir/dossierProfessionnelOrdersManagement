<?php include 'partials/header.php'; ?>

<h1>Passer une commande</h1>
<form method="POST" action="/order/store">
    <label for="customer_name">Nom :</label>
    <input type="text" name="customer_name" required>
    
    <label for="customer_email">Email :</label>
    <input type="email" name="customer_email" required>
    
    <label for="product_id">Produit :</label>
    <select name="product_id" required>
        <?php foreach ($products as $product): ?>
            <option value="<?php echo $product['id']; ?>">
                <?php echo $product['name']; ?> - <?php echo $product['price']; ?> €
            </option>
        <?php endforeach; ?>
    </select>
    
    <label for="quantity">Quantité :</label>
    <input type="number" name="quantity" required>
    
    <button type="submit">Commander</button>
</form>

<?php include 'partials/footer.php'; ?>