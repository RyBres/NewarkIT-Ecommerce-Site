<?php
/* Smarty version 4.5.5, created on 2025-06-30 15:51:56
  from 'C:\Users\bresn\OneDrive\Documents\GitHub\NewarkIT-Ecommerce-Site\presentation\templates\pages\cart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6862967c8ab6e4_18995384',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e989caaedb0c12aefd765cb6c8827ff3fc09655b' => 
    array (
      0 => 'C:\\Users\\bresn\\OneDrive\\Documents\\GitHub\\NewarkIT-Ecommerce-Site\\presentation\\templates\\pages\\cart.tpl',
      1 => 1751291512,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6862967c8ab6e4_18995384 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\Users\\bresn\\OneDrive\\Documents\\GitHub\\NewarkIT-Ecommerce-Site\\smarty\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),1=>array('file'=>'C:\\Users\\bresn\\OneDrive\\Documents\\GitHub\\NewarkIT-Ecommerce-Site\\smarty\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>
<div class="container">
  <h1 class="mb-4">Your Cart</h1>
  <hr>
  <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['cart_items']->value) > 0) {?>
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
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cart_items']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
        <tr>
          <td style="width: 100px;">
            <img src="../images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" class="img-fluid rounded shadow-sm">
          </td>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
          <td>
            <?php if ($_smarty_tpl->tpl_vars['item']->value['discount_percent'] > 0) {?>
              <span class="text-muted text-decoration-line-through">$<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
</span><br>
              <span class="text-danger fw-bold">
                $<?php echo $_smarty_tpl->tpl_vars['item']->value['price']-smarty_modifier_number_format(($_smarty_tpl->tpl_vars['item']->value['price']*$_smarty_tpl->tpl_vars['item']->value['discount_percent']/100),2);?>

              </span>
            <?php } else { ?>
              <span class="fw-bold">$<?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['item']->value['price'],2);?>
</span>
            <?php }?>
          </td>
          <td>
            <form method="post" action="../public/update.php" class="d-flex">
              <input type="hidden" name="product_id" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['product_id'];?>
">
              <input type="number" name="quantity" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['quantity'];?>
" class="form-control form-control-sm me-2" style="width: 70px;" min="1">
              <button type="submit" class="btn btn-primary btn-sm">Update</button>
            </form>
          </td>
          <td class="fw-bold">
            $<?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['item']->value['subtotal'],2);?>

          </td>
          <td>
            <form method="post" action="../public/remove.php">
              <input type="hidden" name="product_id" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['product_id'];?>
">
              <button type="submit" class="btn btn-sm btn-danger">Remove</button>
            </form>
          </td>
        </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="4" class="text-end fw-bold">Total:</td>
          <td class="fw-bold fs-5">$<?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['cart_total']->value,2);?>
</td>
          <td></td>
        </tr>
      </tfoot>
    </table>

    <div class="text-end">
      <a href="../public/checkout.php" class="btn btn-success btn-lg">Proceed to Checkout</a>
    </div>
  <?php } else { ?>
    <p>Your cart is currently empty.</p>
  <?php }?>
</div>
<?php }
}
