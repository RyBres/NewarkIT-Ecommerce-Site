<?php
/* Smarty version 4.5.5, created on 2025-06-25 07:17:42
  from 'C:\Users\bresn\OneDrive\Documents\GitHub\NewarkIT-Ecommerce-Site\presentation\templates\pages\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_685b8676e2b108_46452851',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '59610cafd2a57c7410805ca2836baaefeef0a18d' => 
    array (
      0 => 'C:\\Users\\bresn\\OneDrive\\Documents\\GitHub\\NewarkIT-Ecommerce-Site\\presentation\\templates\\pages\\index.tpl',
      1 => 1750828324,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_685b8676e2b108_46452851 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\Users\\bresn\\OneDrive\\Documents\\GitHub\\NewarkIT-Ecommerce-Site\\smarty\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),1=>array('file'=>'C:\\Users\\bresn\\OneDrive\\Documents\\GitHub\\NewarkIT-Ecommerce-Site\\smarty\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>
<h1 class="mb-4">Welcome to NewarkIT</h1>

<?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['products']->value) > 0) {?>
<div class="row row-cols-1 row-cols-md-3 g-4">
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
    <div class="col">
      <div class="card h-100 shadow-sm">
        <img src="/images/<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
" class="card-img-top" alt="<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
">
        <div class="card-body">
          <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</h5>
          <p class="card-text"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['product']->value['description'],100);?>
</p>
          <p class="card-text fw-bold">$<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
</p>
          <a href="product.php?id=<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" class="btn btn-primary">View Product</a>
        </div>
      </div>
    </div>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>
<?php } else { ?>
  <p>No products available.</p>
<?php }?>
	<?php }
}
