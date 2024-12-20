<?php include 'partials/header.php'; ?>

<?php include 'partials/navbar.php'; ?>

<div class="container mt-5">
    <h1 class="display-4">Liste des commandes</h1>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th># Commande</th>
                <th>Nom du client</th>
                <th>Voir la commande</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td>#<?php echo $order['id']; ?></td>
                    <td><?php echo $order['customer_name']; ?></td>
                    <td>
                        <a href="/order/view/<?php echo $order['id']; ?>" class="btn btn-info btn-sm">Voir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?php include 'partials/footer.php'; ?>
