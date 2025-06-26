<?php
/* Smarty version 4.5.5, created on 2025-06-26 03:10:43
  from 'C:\Users\bresn\OneDrive\Documents\GitHub\NewarkIT-Ecommerce-Site\presentation\templates\pages\category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_685c9e13e17708_43920035',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e22ca204e6c059e8aa702e01c8ece5f2bb4c38cc' => 
    array (
      0 => 'C:\\Users\\bresn\\OneDrive\\Documents\\GitHub\\NewarkIT-Ecommerce-Site\\presentation\\templates\\pages\\category.tpl',
      1 => 1750900153,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_685c9e13e17708_43920035 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\Users\\bresn\\OneDrive\\Documents\\GitHub\\NewarkIT-Ecommerce-Site\\smarty\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),1=>array('file'=>'C:\\Users\\bresn\\OneDrive\\Documents\\GitHub\\NewarkIT-Ecommerce-Site\\smarty\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),2=>array('file'=>'C:\\Users\\bresn\\OneDrive\\Documents\\GitHub\\NewarkIT-Ecommerce-Site\\smarty\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>
<h1 class="mb-4"><?php echo $_smarty_tpl->tpl_vars['categoryName']->value;?>
</h1>

<?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['products']->value) > 0) {?>
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
      <div class="col">
        <div class="card h-100 shadow-sm position-relative">
          <?php if ($_smarty_tpl->tpl_vars['product']->value['discount_percent'] > 0) {?>
            <span class="badge bg-danger position-absolute top-0 end-0 m-2">Sale</span>
          <?php }?>
          <img src="../images/products/<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
" class="card-img-top mx-auto d-block" alt="<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
">
          <div class="card-body">
            <h5 class="card-title fw-bold"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</h5>
            <p class="card-text"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['product']->value['description'],100);?>
</p>
            <p class="card-text">
              <?php if ($_smarty_tpl->tpl_vars['product']->value['discount_percent'] > 0) {?>
                <span class="text-muted text-decoration-line-through">$<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
</span>
                <span class="text-danger fw-bold">
                  $<?php echo $_smarty_tpl->tpl_vars['product']->value['price']-smarty_modifier_number_format(($_smarty_tpl->tpl_vars['product']->value['price']*$_smarty_tpl->tpl_vars['product']->value['discount_percent']/100),2);?>

                </span>
              <?php } else { ?>
                <span class="fw-bold">$<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
</span>
              <?php }?>
            </p>
            <a href="product.php?id=<?php echo $_smarty_tpl->tpl_vars['product']->value['product_id'];?>
" class="btn btn-primary">View Product</a>
          </div>
        </div>
      </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </div>
<?php } else { ?>
  <p>No products in this category yet.</p>
<?php }
}
}
