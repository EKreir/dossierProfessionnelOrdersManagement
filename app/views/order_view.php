<?php include 'partials/header.php'; ?>

<h1>Détails de la commande</h1>

<p><strong>Nom du client :</strong> <?= $order['customer_name']; ?></p>
<p><strong>Email du client :</strong> <?= $order['customer_email']; ?></p>
<p><strong>Total de la commande :</strong> <?= $order['total']; ?> €</p>

<h2>Articles de la commande</h2>
<table>
    <thead>
        <tr>
            <th>Produit</th>
            <th>Quantité</th>
            <th>Prix</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orderItems as $item): ?>
            <tr>
                <td><?= $item['name']; ?></td>
                <td><?= $item['quantity']; ?></td>
                <td><?= $item['price']; ?> €</td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include 'partials/footer.php'; ?>