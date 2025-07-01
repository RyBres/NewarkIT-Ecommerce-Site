<h1 class="mb-4">Checkout</h1>

<form method="post" class="row g-3">
  <div class="col-md-6">
    <label class="form-label">First Name</label>
    <input type="text" name="first_name" class="form-control" required value="{$userInfo.first_name|escape}">
  </div>
  <div class="col-md-6">
    <label class="form-label">Last Name</label>
    <input type="text" name="last_name" class="form-control" required value="{$userInfo.last_name|escape}">
  </div>

  <div class="col-md-6">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control" required value="{$userInfo.email|escape}">
  </div>

  <div class="col-md-6">
    <label class="form-label">Address Line 1</label>
    <input type="text" name="address_line1" class="form-control" required value="{$userInfo.address_line1|escape}">
  </div>

  <div class="col-md-6">
    <label class="form-label">Address Line 2</label>
    <input type="text" name="address_line2" class="form-control" value="{$userInfo.address_line2|escape}">
  </div>

  <div class="col-md-4">
    <label class="form-label">City</label>
    <input type="text" name="city" class="form-control" required value="{$userInfo.city|escape}">
  </div>

  <div class="col-md-4">
    <label class="form-label">State</label>
    <input type="text" name="state" class="form-control" required value="{$userInfo.state|escape}">
  </div>

  <div class="col-md-4">
    <label class="form-label">ZIP Code</label>
    <input type="text" name="zip" class="form-control" required value="{$userInfo.zip|escape}">
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
