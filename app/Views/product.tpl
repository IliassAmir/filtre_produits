<h1>Liste des produits</h1>

<form method="get" action="">
    <label>Catégorie : 
        <input type="text" name="category" value="<?= $filters['category'] ?? '' ?>">
    </label>
    <label>Prix minimum : 
        <input type="number" name="min_price" value="<?= $filters['min_price'] ?? '' ?>">
    </label>
    <button type="submit">Filtrer</button>
</form>

<?php if (!empty($errors)): ?>
    <ul>
        <?php foreach ($errors as $err): ?>
            <li><?= esc($err) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if (!empty($products)): ?>
    <ul>
        <?php foreach ($products as $p): ?>
            <li>
                <?= esc($p['name']) ?> - 
                <?= esc($p['category']) ?> - 
                <?= esc($p['price']) ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Aucun produit trouvé</p>
<?php endif; ?>

<footer>
    <p class="text-center text-muted">© 2025 - Version principale</p>
    <p class="text-center text-muted">© 2025 - Mon Filtre</p>
    <p class="text-center text-muted">© 2025 - Mon Filtre Produit - Modif Test</p>
</footer>
