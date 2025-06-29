<h2 class="mb-4">My Orders</h2>

{if $orders|@count > 0}
  {foreach $orders as $order_id => $order}
    <div class = "card mb-4">
	  <div class="card-header">
	    <strong>Order #{$order_id}</strong> | Date: {$order.meta.order_date} | Total: ${$order.meta.total} | Status: {$order.meta.status}
	  </div>
	  <ul class="list-group list-group-flush">
	    {foreach $order.items as $item}
	      <li class="list-group-item d-flex justify-content-between align-items-center">
		    <div class="d-flex align-items-center">
		      <img src="../images/products/{$item.image}" alt="{$item.name}" width="60" class="me-3">
			  <div>
			    <strong>{$item.name}</strong><br>
			    Quantity: {$item.quantity} | Price: ${$item.price}
			  </div>
		    </div>
		  </li>
	    {/foreach}
	  </ul>
    </div>
  {/foreach}
{else}
  <p>You have no past orders.</p>
{/if}