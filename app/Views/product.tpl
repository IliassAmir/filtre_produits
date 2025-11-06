
{extends file='themes/main.tpl'}

{block output}

<h1>Liste des produits</h1>

<form method="get" action="">
    <label>Catégorie : <input type="text" name="category" value="{$filters.category|default:''}"></label>
    <label>Prix minimum : <input type="number" name="min_price" value="{$filters.min_price|default:''}"></label>
    <button type="submit">Filtrer</button>
</form>

{if isset($errors) && $errors|@count > 0}
    <ul>
        {foreach from=$errors item=err}<li>{$err}</li>{/foreach}
    </ul>
{/if}

{if isset($products) && $products|@count > 0}
    <ul>
        {foreach from=$products item=p}
            <li>{$p.name} - {$p.category} - {$p.price}</li>
        {/foreach}
    </ul>
{else}
    <p>Aucun produit trouvé</p>
{/if}

<p class="text-center text-muted">© 2025 - Version principale</p>
<p class="text-center text-muted">© 2025 - Mon Filtre</p>
<p class="text-center text-muted">© 2025 - Mon Filtre Produit - Modif Test</p>


{/block}
