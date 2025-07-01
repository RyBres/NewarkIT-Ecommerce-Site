<h1>Thank you for your purchase!</h1>

{if $error}
  <div class="alert alert-danger">{$error}</div>
{/if}

<p>Your order has been placed successfully. Below are your order details:</p>

<ul class="list-group my-3">
  {foreach from=$order_items item=item}
    <li class="list-group-item d-flex justify-content-between">
      <span>{$item.name} (x{$item.quantity})</span>
      <span>${$item.price * $item.quantity|number_format:2}</span>
    </li>
  {/foreach}
</ul>

<p><strong>Total Paid:</strong> ${$order.total|number_format:2}</p>
<p><strong>Shipping To:</strong> {$order.shipping_address}</p>

<a href="index.php" class="btn btn-primary mt-4">Return to Homepage</a>
