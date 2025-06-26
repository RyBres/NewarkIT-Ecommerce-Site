<div class="container py-4">
  <h2 class="mb-4">Your Cart</h2>

  {if $cart_items|@count > 0}
    <table class="table align-middle">
      <thead class="table-light">
        <tr>
          <th scope="col">Product</th>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">Quantity</th>
          <th scope="col">Subtotal</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        {foreach $cart_items as $item}
        <tr>
          <td style="width: 100px;">
            <img src="/images/products/{$item.image}" alt="{$item.name}" class="img-fluid rounded shadow-sm">
          </td>
          <td>{$item.name}</td>
          <td>
            {if $item.discount_percent > 0}
              <span class="text-muted text-decoration-line-through">${$item.price}</span><br>
              <span class="text-danger fw-bold">
                ${$item.price - ($item.price * $item.discount_percent / 100)|number_format:2}
              </span>
            {else}
              <span class="fw-bold">${$item.price}</span>
            {/if}
          </td>
          <td>
            <form method="post" action="/cart/update.php" class="d-flex">
              <input type="hidden" name="product_id" value="{$item.product_id}">
              <input type="number" name="quantity" value="{$item.quantity}" class="form-control form-control-sm me-2" style="width: 70px;" min="1">
              <button type="submit" class="btn btn-outline-primary btn-sm">Update</button>
            </form>
          </td>
          <td class="fw-bold">
            ${$item.subtotal|number_format:2}
          </td>
          <td>
            <form method="post" action="/cart/remove.php">
              <input type="hidden" name="product_id" value="{$item.product_id}">
              <button type="submit" class="btn btn-sm btn-outline-danger">×</button>
            </form>
          </td>
        </tr>
        {/foreach}
      </tbody>
      <tfoot>
        <tr>
          <td colspan="4" class="text-end fw-bold">Total:</td>
          <td class="fw-bold fs-5">${$cart_total|number_format:2}</td>
          <td></td>
        </tr>
      </tfoot>
    </table>

    <div class="text-end">
      <a href="/checkout.php" class="btn btn-success btn-lg">Proceed to Checkout</a>
    </div>
  {else}
    <p>Your cart is currently empty.</p>
  {/if}
</div>
