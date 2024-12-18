<h1>Passer une commande</h1>
<form method="POST" action="/order/store">
    <label for="customer_name">Nom :</label>
    <input type="text" name="customer_name" required>
    <label for="customer_email">Email :</label>
    <input type="email" name="customer_email" required>
    <label for="total">Total :</label>
    <input type="number" name="total" step="0.01" required>
    <button type="submit">Commander</button>
</form>
