<?php
/* Smarty version 4.5.5, created on 2025-06-29 02:19:15
  from 'C:\Users\bresn\OneDrive\Documents\GitHub\NewarkIT-Ecommerce-Site\presentation\templates\pages\checkout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_68608683a3ecd8_93404014',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd6c0fe70dfaa4b5fca3475e8c1f1986e4f980af6' => 
    array (
      0 => 'C:\\Users\\bresn\\OneDrive\\Documents\\GitHub\\NewarkIT-Ecommerce-Site\\presentation\\templates\\pages\\checkout.tpl',
      1 => 1751155428,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68608683a3ecd8_93404014 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\Users\\bresn\\OneDrive\\Documents\\GitHub\\NewarkIT-Ecommerce-Site\\smarty\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>
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
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cart_items']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
 (x<?php echo $_smarty_tpl->tpl_vars['item']->value['quantity'];?>
)
        <span>$<?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['item']->value['subtotal'],2);?>
</span>
      </li>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <li class="list-group-item d-flex justify-content-between">
      <strong>Total:</strong>
      <strong>$<?php echo $_smarty_tpl->tpl_vars['cart_total']->value;?>
</strong>
    </li>
  </ul>

  <div class="col-12">
    <button type="submit" class="btn btn-success">Place Order</button>
  </div>
</form>
<?php }
}
