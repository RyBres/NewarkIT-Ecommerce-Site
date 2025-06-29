<?php
/* Smarty version 4.5.5, created on 2025-06-29 03:39:59
  from 'C:\Users\bresn\OneDrive\Documents\GitHub\NewarkIT-Ecommerce-Site\presentation\templates\pages\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6860996f8a17d5_87091030',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0512dbf6916820629c71acb8f4443854859c09c0' => 
    array (
      0 => 'C:\\Users\\bresn\\OneDrive\\Documents\\GitHub\\NewarkIT-Ecommerce-Site\\presentation\\templates\\pages\\login.tpl',
      1 => 1751161144,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6860996f8a17d5_87091030 (Smarty_Internal_Template $_smarty_tpl) {
?><h2 class="mb-4">Login</h2>

<?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
  <div class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
<?php }?>

<form method="post" action="../public/login.php">
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>

  <button type="submit" class="btn btn-primary">Login</button>
  <p class="mt-3">
  No account? <a href="../public/register.php">Register here</a>.
  </p>

</form>
<?php }
}
