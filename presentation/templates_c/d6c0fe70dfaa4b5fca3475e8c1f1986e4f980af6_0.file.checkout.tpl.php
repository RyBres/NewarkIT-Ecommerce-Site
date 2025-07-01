<?php
/* Smarty version 4.5.5, created on 2025-07-01 06:49:17
  from 'C:\Users\bresn\OneDrive\Documents\GitHub\NewarkIT-Ecommerce-Site\presentation\templates\pages\checkout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_686368cdddffd9_45724196',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd6c0fe70dfaa4b5fca3475e8c1f1986e4f980af6' => 
    array (
      0 => 'C:\\Users\\bresn\\OneDrive\\Documents\\GitHub\\NewarkIT-Ecommerce-Site\\presentation\\templates\\pages\\checkout.tpl',
      1 => 1751345221,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_686368cdddffd9_45724196 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\Users\\bresn\\OneDrive\\Documents\\GitHub\\NewarkIT-Ecommerce-Site\\smarty\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>
<h1 class="mb-4">Checkout</h1>

<form method="post" class="row g-3">
  <div class="col-md-6">
    <label class="form-label">First Name</label>
    <input type="text" name="first_name" class="form-control" required value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['userInfo']->value['first_name'], ENT_QUOTES, 'UTF-8', true);?>
">
  </div>
  <div class="col-md-6">
    <label class="form-label">Last Name</label>
    <input type="text" name="last_name" class="form-control" required value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['userInfo']->value['last_name'], ENT_QUOTES, 'UTF-8', true);?>
">
  </div>

  <div class="col-md-6">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control" required value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['userInfo']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
">
  </div>

  <div class="col-md-6">
    <label class="form-label">Address Line 1</label>
    <input type="text" name="address_line1" class="form-control" required value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['userInfo']->value['address_line1'], ENT_QUOTES, 'UTF-8', true);?>
">
  </div>

  <div class="col-md-6">
    <label class="form-label">Address Line 2</label>
    <input type="text" name="address_line2" class="form-control" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['userInfo']->value['address_line2'], ENT_QUOTES, 'UTF-8', true);?>
">
  </div>

  <div class="col-md-4">
    <label class="form-label">City</label>
    <input type="text" name="city" class="form-control" required value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['userInfo']->value['city'], ENT_QUOTES, 'UTF-8', true);?>
">
  </div>

  <div class="col-md-4">
    <label class="form-label">State</label>
    <input type="text" name="state" class="form-control" required value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['userInfo']->value['state'], ENT_QUOTES, 'UTF-8', true);?>
">
  </div>

  <div class="col-md-4">
    <label class="form-label">ZIP Code</label>
    <input type="text" name="zip" class="form-control" required value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['userInfo']->value['zip'], ENT_QUOTES, 'UTF-8', true);?>
">
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
