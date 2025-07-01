<h1 class="mb-4">Hot Deals & Discounts</h1>
<hr>
{if $products|@count > 0}
  <div class="row row-cols-1 row-cols-md-3 g-4">
    {foreach from=$products item=product}
      <div class="col">
        <div class="card h-100 shadow-sm position-relative">
          <span class="badge bg-danger position-absolute top-0 end-0 m-2">Sale</span>
          <img src="../images/products/{$product.image}" class="card-img-top mx-auto d-block" alt="{$product.name}">
          <div class="card-body">
            <h5 class="card-title fw-bold">{$product.name}</h5>
            <p class="card-text">{$product.description|truncate:100}</p>
            <p class="card-text">
              <span class="text-muted text-decoration-line-through">${$product.price|number_format:2}</span>
              <span class="text-danger fw-bold">
                ${($product.price - ($product.price * $product.discount_percent / 100))|number_format:2}
              </span>
            </p>
            <a href="product.php?id={$product.product_id}" class="btn btn-primary">View Product</a>
          </div>
        </div>
      </div>
    {/foreach}
  </div>
{else}
  <p>No deals at the moment. Check back soon!</p>
{/if}
