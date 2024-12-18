<h1>Détails de la commande #<?php echo $order['id']; ?></h1>
<p>Client : <?php echo $order['customer_name']; ?></p>
<p>Email : <?php echo $order['customer_email']; ?></p>
<h2>Articles commandés</h2>
<ul>
    <?php foreach ($orderItems as $item): ?>
        <li>
            <?php echo $item['product_name']; ?> - Quantité : <?php echo $item['quantity']; ?>
        </li>
    <?php endforeach; ?>
</ul>
