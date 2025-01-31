<?php include 'partials/header.php'; ?>

<?php include 'partials/navbar.php'; ?>

<div class="container mt-5">
    <h1 class="display-4">Détails de la commande</h1>

    <div class="mb-4">
        <p><strong>Nom du client :</strong> <?= $order['customer_name']; ?></p>
        <p><strong>Email du client :</strong> <?= $order['customer_email']; ?></p>
        <p><strong>Total de la commande :</strong> <?= $order['total']; ?> €</p>
    </div>

    <h2>Articles de la commande</h2>
    <table class="table table-bordered">
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

    <a href="/orders" class="btn btn-secondary mt-3">Retour à la liste des commandes</a>
</div>

<?php include 'partials/footer.php'; ?>