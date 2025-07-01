<?php
/* Smarty version 4.5.5, created on 2025-07-01 03:20:23
  from 'C:\Users\bresn\OneDrive\Documents\GitHub\NewarkIT-Ecommerce-Site\presentation\templates\pages\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_686337d76cb7d4_64425654',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0512dbf6916820629c71acb8f4443854859c09c0' => 
    array (
      0 => 'C:\\Users\\bresn\\OneDrive\\Documents\\GitHub\\NewarkIT-Ecommerce-Site\\presentation\\templates\\pages\\login.tpl',
      1 => 1751332803,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_686337d76cb7d4_64425654 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['error']->value) {?>
  <div class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
<?php }?>

<div class="d-flex justify-content-center align-items-center">
<div class="card static-card shadow-sm rounded-4 p-4 bg-light" style="max-width: 400px; width: 100%;">
  <form method="post" action="../public/login.php">
    <h4 class="mb-3" style="text-align: center; color: black;">Log In</h4>

    <div class="mb-3">
      <label for="email" class="form-label" style="color: black;">Email</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <div class="mb-3">
      <label for="password" class="form-label" style="color: black;">Password</label>
      <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <div class="d-grid gap-2">
      <button type="submit" class="btn btn-primary">Login</button>
    </div>

    <p class="mt-3 mb-0 text-center" style="color: black;">
      No account? <a href="../public/register.php">Register here</a>.
    </p>
  </form>
</div>
</div><?php }
}
