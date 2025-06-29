<div class="container py-4">
  <div class="row">
    <div class="col-md-6 text-center">
      <img src="../images/products/{$product.image}" class="img-fluid rounded" alt="{$product.name}">
    </div>
    <div class="col-md-6">
      <h2 class="fw-bold">{$product.name}</h2>
      <p class="mt-3">{$product.description|escape}</p>
      <hr>
	  <h5 class="fw-bold">Product Description:</h5>
	  <p class="mt-3">{$product.long_description|escape}</p>
      <p class="fs-4">
        {if $product.discount_percent > 0}
          <span class="text-muted text-decoration-line-through">${$product.price}</span>
          <span class="text-danger fw-bold">
            ${$product.price - ($product.price * $product.discount_percent / 100)|number_format:2}
          </span>
        {else}
          <span class="fw-bold">${$product.price}</span>
        {/if}
      </p>
	  <form method="post" action="../public/add.php" class="mt-3">
	    <input type="hidden" name="product_id" value="{$product.product_id}">
	    <div class="input-group" style="max-width: 160px;">
	      <input type="number" name="quantity" value="1" min="1" class="form-control">
	      <button type="submit" class="btn btn-success">Add to Cart</button>
	    </div>
	  </form>

    </div>
  </div>
</div>
