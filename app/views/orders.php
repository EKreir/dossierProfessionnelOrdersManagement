<h1>Liste des commandes</h1>
<ul>
    <?php foreach ($orders as $order): ?>
        <li>
            <a href="/order/view/<?php echo $order['id']; ?>">
                Commande #<?php echo $order['id']; ?> - <?php echo $order['customer_name']; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
