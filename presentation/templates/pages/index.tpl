
<div class="carousel-frame mb-4" style="height: 425px;">
	<div id="homepageCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
	  <div class="carousel-inner">
		<div class="carousel-item active">
		  <img src="../images/banner-1.png" class="d-block w-100" alt="Banner 1">
		</div>
		<div class="carousel-item">
		  <img src="../images/banner-2.png" class="d-block w-100" alt="Banner 2">
		</div>
		<div class="carousel-item">
		  <img src="../images/banner-3.png" class="d-block w-100" alt="Banner 3">
		</div>
	  </div>

	  <!-- Arrows -->
	  <button class="carousel-control-prev" type="button" data-bs-target="#homepageCarousel" data-bs-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Previous</span>
	  </button>

	  <button class="carousel-control-next" type="button" data-bs-target="#homepageCarousel" data-bs-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Next</span>
	  </button>
	</div>
</div>

<h3 style="color: #000;">Featured Offers</h3>
<p style="color: #000;">Order online or in-store for the best deals on new tech. For a limited time only.</p>
<hr>

<!-- Product card grid -->
{if $products|@count > 0}
<div class="row row-cols-1 row-cols-md-3 g-4">
  {foreach from=$products item=product}
    <div class="col">
      <div class="card h-100 shadow-sm">
		{if $product.discount_percent > 0}
		<span class="badge bg-danger position-absolute top-0 end-0 m-2">Sale</span>
		{/if}
        <img src="../images/products/{$product.image}" class="card-img-top mx-auto d-block" alt="{$product.name}">
        <div class="card-body">
          <h5 class="card-title">{$product.name}</h5>
          <p class="card-text">{$product.description|truncate:100}</p>
          <p class="card-text">
		  {if $product.discount_percent > 0}
			<span class="text-muted text-decoration-line-through">${$product.price}</span>
			<span class="text-danger fw-bold">
			  ${$product.price - ($product.price * $product.discount_percent / 100)|number_format:2}
			</span>
		  {else}
			<span class="fw-bold">${$product.price}</span>
		  {/if}
		  </p>
          <a href="product.php?id={$product.product_id}" class="btn btn-primary">View Product</a>
        </div>
      </div>
    </div>
  {/foreach}
</div>
{else}
  <p>No products available.</p>
{/if}
	