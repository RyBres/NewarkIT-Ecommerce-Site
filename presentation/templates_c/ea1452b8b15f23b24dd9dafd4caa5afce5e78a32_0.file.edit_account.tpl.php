<?php
/* Smarty version 4.5.5, created on 2025-07-01 06:57:02
  from 'C:\Users\bresn\OneDrive\Documents\GitHub\NewarkIT-Ecommerce-Site\presentation\templates\pages\edit_account.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_68636a9e7c8778_93101416',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ea1452b8b15f23b24dd9dafd4caa5afce5e78a32' => 
    array (
      0 => 'C:\\Users\\bresn\\OneDrive\\Documents\\GitHub\\NewarkIT-Ecommerce-Site\\presentation\\templates\\pages\\edit_account.tpl',
      1 => 1751345743,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68636a9e7c8778_93101416 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>Edit Your Account</h2>

<?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
  <div class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
<?php }
if ($_smarty_tpl->tpl_vars['success']->value) {?>
  <div class="alert alert-success"><?php echo $_smarty_tpl->tpl_vars['success']->value;?>
</div>
<?php }?>

<form method="post" class="row g-3 mt-3">
  <div class="col-md-6">
    <label>First Name</label>
    <input type="text" name="first_name" class="form-control" required value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['user']->value['first_name'], ENT_QUOTES, 'UTF-8', true);?>
">
  </div>
  <div class="col-md-6">
    <label>Last Name</label>
    <input type="text" name="last_name" class="form-control" required value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['user']->value['last_name'], ENT_QUOTES, 'UTF-8', true);?>
">
  </div>

  <div class="col-md-6">
    <label>Email</label>
    <input type="email" name="email" class="form-control" required value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['user']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
">
  </div>

  <div class="col-md-6">
    <label>New Password <small>(leave blank to keep current)</small></label>
    <input type="password" name="password" class="form-control">
  </div>

  <div class="col-12">
    <label>Address Line 1</label>
    <input type="text" name="address_line1" class="form-control" required value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['user']->value['address_line1'], ENT_QUOTES, 'UTF-8', true);?>
">
  </div>

  <div class="col-12">
    <label>Address Line 2</label>
    <input type="text" name="address_line2" class="form-control" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['user']->value['address_line2'], ENT_QUOTES, 'UTF-8', true);?>
">
  </div>

  <div class="col-md-4">
    <label>City</label>
    <input type="text" name="city" class="form-control" required value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['user']->value['city'], ENT_QUOTES, 'UTF-8', true);?>
">
  </div>

  <div class="col-md-4">
    <label>State</label>
    <input type="text" name="state" class="form-control" required value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['user']->value['state'], ENT_QUOTES, 'UTF-8', true);?>
">
  </div>

  <div class="col-md-4">
    <label>ZIP</label>
    <input type="text" name="zip" class="form-control" required value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['user']->value['zip'], ENT_QUOTES, 'UTF-8', true);?>
">
  </div>

  <div class="col-12 mt-3">
    <button type="submit" class="btn btn-primary">Save Changes</button>
  </div>
</form>
<?php }
}
