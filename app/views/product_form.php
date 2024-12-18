<h1>Ajouter un nouveau produit</h1>
<form method="POST" action="/product/store">
    <label for="name">Nom du produit:</label>
    <input type="text" name="name" required>
    
    <label for="price">Prix:</label>
    <input type="number" name="price" step="0.01" required>
    
    <button type="submit">Ajouter le produit</button>
</form>
