<h1>Liste des commandes</h1>
<ul>
    <?php foreach ($orders as $order): ?>
        <li>Commande #<?php echo $order['id']; ?> - <?php echo $order['customer_name']; ?> - <?php echo $order['total']; ?> €</li>
    <?php endforeach; ?>
</ul>
