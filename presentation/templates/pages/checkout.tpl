<h1 class="mb-4">Checkout</h1>

<form method="post" class="row g-3">
  <div class="col-md-6">
    <label class="form-label">Full Name</label>
    <input type="text" name="name" class="form-control" required>
  </div>
  <div class="col-md-6">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control" required>
  </div>
  <div class="col-12">
    <label class="form-label">Shipping Address</label>
    <textarea name="address" class="form-control" rows="3" required></textarea>
  </div>

  <h5 class="mt-4">Order Summary:</h5>
  <ul class="list-group mb-3">
    {foreach from=$cart_items item=item}
      <li class="list-group-item d-flex justify-content-between align-items-center">
        {$item.name} (x{$item.quantity})
        <span>${$item.subtotal|number_format:2}</span>
      </li>
    {/foreach}
    <li class="list-group-item d-flex justify-content-between">
      <strong>Total:</strong>
      <strong>${$cart_total}</strong>
    </li>
  </ul>

  <div class="col-12">
    <button type="submit" class="btn btn-success">Place Order</button>
  </div>
</form>
