<?php
/* Smarty version 4.5.5, created on 2025-07-01 07:11:29
  from 'C:\Users\bresn\OneDrive\Documents\GitHub\NewarkIT-Ecommerce-Site\presentation\templates\pages\confirmation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_68636e01a11b05_83532017',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6032b042410e94134e520b01d998d8caffe77b9f' => 
    array (
      0 => 'C:\\Users\\bresn\\OneDrive\\Documents\\GitHub\\NewarkIT-Ecommerce-Site\\presentation\\templates\\pages\\confirmation.tpl',
      1 => 1751346665,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68636e01a11b05_83532017 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\Users\\bresn\\OneDrive\\Documents\\GitHub\\NewarkIT-Ecommerce-Site\\smarty\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>
<h1>Thank you for your purchase!</h1>

<?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
  <div class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
<?php }?>

<p>Your order has been placed successfully. Below are your order details:</p>

<ul class="list-group my-3">
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['order_items']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
    <li class="list-group-item d-flex justify-content-between">
      <span><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
 (x<?php echo $_smarty_tpl->tpl_vars['item']->value['quantity'];?>
)</span>
      <span>$<?php echo $_smarty_tpl->tpl_vars['item']->value['price']*smarty_modifier_number_format($_smarty_tpl->tpl_vars['item']->value['quantity'],2);?>
</span>
    </li>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul>

<p><strong>Total Paid:</strong> $<?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['order']->value['total'],2);?>
</p>
<p><strong>Shipping To:</strong> <?php echo $_smarty_tpl->tpl_vars['order']->value['shipping_address'];?>
</p>

<a href="index.php" class="btn btn-primary mt-4">Return to Homepage</a>
<?php }
}
