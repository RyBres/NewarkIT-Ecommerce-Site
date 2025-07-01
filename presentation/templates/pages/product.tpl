<div class="container py-4">
  <div class="row">
    <div class="col-md-6 text-center">
      <img src="../images/products/{$product.image}" class="img-fluid rounded" alt="{$product.name}" style="max-height: 300px; min-height: 300px">
    </div>
    <div class="col-md-6">
      <h2 class="fw-bold">{$product.name}</h2>
      <p class="mt-3"><i>{$product.description|escape}</i></p>
      <hr>
      <h5 class="fw-bold">Product Description:</h5>
      <p class="mt-3">{$product.long_description|escape}</p>

      {* Price *}
      <p class="fs-4">
        {if $product.discount_percent > 0}
          <span class="text-muted text-decoration-line-through">${$product.price|number_format:2}</span>
          <span class="text-danger fw-bold">
            ${($product.price - ($product.price * $product.discount_percent / 100))|number_format:2}
          </span>
        {else}
          <span class="fw-bold">${$product.price|number_format:2}</span>
        {/if}
      </p>

      {* Stock Alert *}
      {if $product.stock_quantity <= 10 && $product.stock_quantity > 0}
        <div class="alert alert-warning mt-3">
          Hurry! Only <strong>{$product.stock_quantity}</strong> left in stock.
        </div>
      {elseif $product.stock_quantity == 0}
        <div class="alert alert-danger mt-3">
          <strong>Out of Stock</strong> — check back soon.
        </div>
      {/if}

      {* Add to Cart form *}
      {if $product.stock_quantity > 0}
        <form method="post" action="../public/add.php" class="mt-3">
          <input type="hidden" name="product_id" value="{$product.product_id}">
          <div class="input-group" style="max-width: 180px;">
            <input type="number" name="quantity" value="1" min="1" max="{$product.stock_quantity}" class="form-control">
            <button type="submit" class="btn btn-success">Add to Cart</button>
          </div>
        </form>
      {else}
        <button class="btn btn-secondary mt-3" disabled>Out of Stock</button>
      {/if}
    </div>
  </div>
</div>
