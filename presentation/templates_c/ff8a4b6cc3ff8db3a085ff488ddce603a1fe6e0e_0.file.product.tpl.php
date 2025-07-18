<?php
/* Smarty version 4.5.5, created on 2025-07-01 05:43:43
  from 'C:\Users\bresn\OneDrive\Documents\GitHub\NewarkIT-Ecommerce-Site\presentation\templates\pages\product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6863596fdce014_15952860',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ff8a4b6cc3ff8db3a085ff488ddce603a1fe6e0e' => 
    array (
      0 => 'C:\\Users\\bresn\\OneDrive\\Documents\\GitHub\\NewarkIT-Ecommerce-Site\\presentation\\templates\\pages\\product.tpl',
      1 => 1751341366,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6863596fdce014_15952860 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\Users\\bresn\\OneDrive\\Documents\\GitHub\\NewarkIT-Ecommerce-Site\\smarty\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>
<div class="container py-4">
  <div class="row">
    <div class="col-md-6 text-center">
      <img src="../images/products/<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
" class="img-fluid rounded" alt="<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
" style="max-height: 300px; min-height: 300px">
    </div>
    <div class="col-md-6">
      <h2 class="fw-bold"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</h2>
      <p class="mt-3"><i><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['product']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
</i></p>
      <hr>
      <h5 class="fw-bold">Product Description:</h5>
      <p class="mt-3"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['product']->value['long_description'], ENT_QUOTES, 'UTF-8', true);?>
</p>

            <p class="fs-4">
        <?php if ($_smarty_tpl->tpl_vars['product']->value['discount_percent'] > 0) {?>
          <span class="text-muted text-decoration-line-through">$<?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['product']->value['price'],2);?>
</span>
          <span class="text-danger fw-bold">
            $<?php echo smarty_modifier_number_format(($_smarty_tpl->tpl_vars['product']->value['price']-($_smarty_tpl->tpl_vars['product']->value['price']*$_smarty_tpl->tpl_vars['product']->value['discount_percent']/100)),2);?>

          </span>
        <?php } else { ?>
          <span class="fw-bold">$<?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['product']->value['price'],2);?>
</span>
        <?php }?>
      </p>

            <?php if ($_smarty_tpl->tpl_vars['product']->value['stock_quantity'] <= 10 && $_smarty_tpl->tpl_vars['product']->value['stock_quantity'] > 0) {?>
        <div class="alert alert-warning mt-3">
          Hurry! Only <strong><?php echo $_smarty_tpl->tpl_vars['product']->value['stock_quantity'];?>
</strong> left in stock.
        </div>
      <?php } elseif ($_smarty_tpl->tpl_vars['product']->value['stock_quantity'] == 0) {?>
        <div class="alert alert-danger mt-3">
          <strong>Out of Stock</strong> — check back soon.
        </div>
      <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['product']->value['stock_quantity'] > 0) {?>
        <form method="post" action="../public/add.php" class="mt-3">
          <input type="hidden" name="product_id" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['product_id'];?>
">
          <div class="input-group" style="max-width: 180px;">
            <input type="number" name="quantity" value="1" min="1" max="<?php echo $_smarty_tpl->tpl_vars['product']->value['stock_quantity'];?>
" class="form-control">
            <button type="submit" class="btn btn-success">Add to Cart</button>
          </div>
        </form>
      <?php } else { ?>
        <button class="btn btn-secondary mt-3" disabled>Out of Stock</button>
      <?php }?>
    </div>
  </div>
</div>
<?php }
}
