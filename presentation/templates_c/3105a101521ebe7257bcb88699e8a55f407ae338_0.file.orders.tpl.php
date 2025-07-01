<?php
/* Smarty version 4.5.5, created on 2025-07-01 03:24:57
  from 'C:\Users\bresn\OneDrive\Documents\GitHub\NewarkIT-Ecommerce-Site\presentation\templates\pages\orders.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_686338e9bd7f91_88194954',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3105a101521ebe7257bcb88699e8a55f407ae338' => 
    array (
      0 => 'C:\\Users\\bresn\\OneDrive\\Documents\\GitHub\\NewarkIT-Ecommerce-Site\\presentation\\templates\\pages\\orders.tpl',
      1 => 1751333092,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_686338e9bd7f91_88194954 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\Users\\bresn\\OneDrive\\Documents\\GitHub\\NewarkIT-Ecommerce-Site\\smarty\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),));
?>
<h1 class="mb-4">My Orders</h1>
<hr>

<?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['orders']->value) > 0) {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orders']->value, 'order', false, 'order_id');
$_smarty_tpl->tpl_vars['order']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['order_id']->value => $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['order']->do_else = false;
?>
    <div class="rounded-table-wrapper mb-4">
      <table class="table mb-0 align-middle">
        <thead class="table-light">
          <tr>
            <th colspan="2" class="text-start py-3 px-4">
              <strong>Order #<?php echo $_smarty_tpl->tpl_vars['order_id']->value;?>
</strong> |
              Date: <?php echo $_smarty_tpl->tpl_vars['order']->value['meta']['order_date'];?>
 |
              Total: $<?php echo $_smarty_tpl->tpl_vars['order']->value['meta']['total'];?>
 |
              Status: <?php echo $_smarty_tpl->tpl_vars['order']->value['meta']['status'];?>

            </th>
          </tr>
        </thead>
        <tbody>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['order']->value['items'], 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
            <tr>
              <td style="width: 100px;" class="ps-4">
                <img src="../images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" class="img-fluid rounded shadow-sm" width="60">
              </td>
              <td class="align-middle">
                <strong><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</strong><br>
                Quantity: <?php echo $_smarty_tpl->tpl_vars['item']->value['quantity'];?>
 | Price: $<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

              </td>
            </tr>
          <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
      </table>
    </div>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} else { ?>
  <p>You have no past orders.</p>
<?php }
}
}
