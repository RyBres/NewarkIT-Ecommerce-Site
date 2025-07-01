<h1 class="mb-4">My Orders</h1>
<hr>

{if $orders|@count > 0}
  {foreach $orders as $order_id => $order}
    <div class="rounded-table-wrapper mb-4">
      <table class="table mb-0 align-middle">
        <thead class="table-light">
          <tr>
            <th colspan="2" class="text-start py-3 px-4">
              <strong>Order #{$order_id}</strong> |
              Date: {$order.meta.order_date} |
              Total: ${$order.meta.total} |
              Status: {$order.meta.status}
            </th>
          </tr>
        </thead>
        <tbody>
          {foreach $order.items as $item}
            <tr>
              <td style="width: 100px;" class="ps-4">
                <img src="../images/products/{$item.image}" alt="{$item.name}" class="img-fluid rounded shadow-sm" width="60">
              </td>
              <td class="align-middle">
                <strong>{$item.name}</strong><br>
                Quantity: {$item.quantity} | Price: ${$item.price}
              </td>
            </tr>
          {/foreach}
        </tbody>
      </table>
    </div>
  {/foreach}
{else}
  <p>You have no past orders.</p>
{/if}
