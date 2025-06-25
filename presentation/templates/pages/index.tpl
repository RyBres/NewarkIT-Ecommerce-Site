<h1 class="mb-4">Welcome to NewarkIT</h1>

{if $products|@count > 0}
<div class="row row-cols-1 row-cols-md-3 g-4">
  {foreach from=$products item=product}
    <div class="col">
      <div class="card h-100 shadow-sm">
        <img src="/images/{$product.image}" class="card-img-top" alt="{$product.name}">
        <div class="card-body">
          <h5 class="card-title">{$product.name}</h5>
          <p class="card-text">{$product.description|truncate:100}</p>
          <p class="card-text fw-bold">${$product.price}</p>
          <a href="product.php?id={$product.id}" class="btn btn-primary">View Product</a>
        </div>
      </div>
    </div>
  {/foreach}
</div>
{else}
  <p>No products available.</p>
{/if}
	