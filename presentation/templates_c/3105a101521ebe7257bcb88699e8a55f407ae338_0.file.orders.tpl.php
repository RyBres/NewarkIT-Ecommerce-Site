<?php
/* Smarty version 4.5.5, created on 2025-06-30 00:16:24
  from 'C:\Users\bresn\OneDrive\Documents\GitHub\NewarkIT-Ecommerce-Site\presentation\templates\pages\orders.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6861bb38effb94_56248846',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3105a101521ebe7257bcb88699e8a55f407ae338' => 
    array (
      0 => 'C:\\Users\\bresn\\OneDrive\\Documents\\GitHub\\NewarkIT-Ecommerce-Site\\presentation\\templates\\pages\\orders.tpl',
      1 => 1751235383,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6861bb38effb94_56248846 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\Users\\bresn\\OneDrive\\Documents\\GitHub\\NewarkIT-Ecommerce-Site\\smarty\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),));
?>
<h2 class="mb-4">My Orders</h2>

<?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['orders']->value) > 0) {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orders']->value, 'order', false, 'order_id');
$_smarty_tpl->tpl_vars['order']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['order_id']->value => $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['order']->do_else = false;
?>
    <div class = "card mb-4">
	  <div class="card-header">
	    <strong>Order #<?php echo $_smarty_tpl->tpl_vars['order_id']->value;?>
</strong> | Date: <?php echo $_smarty_tpl->tpl_vars['order']->value['meta']['order_date'];?>
 | Total: $<?php echo $_smarty_tpl->tpl_vars['order']->value['meta']['total'];?>
 | Status: <?php echo $_smarty_tpl->tpl_vars['order']->value['meta']['status'];?>

	  </div>
	  <ul class="list-group list-group-flush">
	    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['order']->value['items'], 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
	      <li class="list-group-item d-flex justify-content-between align-items-center">
		    <div class="d-flex align-items-center">
		      <img src="../images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" width="60" class="me-3">
			  <div>
			    <strong><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</strong><br>
			    Quantity: <?php echo $_smarty_tpl->tpl_vars['item']->value['quantity'];?>
 | Price: $<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

			  </div>
		    </div>
		  </li>
	    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	  </ul>
    </div>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} else { ?>
  <p>You have no past orders.</p>
<?php }
}
}
