<?php
/* Smarty version 4.5.5, created on 2025-06-29 03:40:00
  from 'C:\Users\bresn\OneDrive\Documents\GitHub\NewarkIT-Ecommerce-Site\presentation\templates\pages\register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_68609970aa3811_91719757',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'def6fbe02162b9694380336fd8d7ea6daa350c02' => 
    array (
      0 => 'C:\\Users\\bresn\\OneDrive\\Documents\\GitHub\\NewarkIT-Ecommerce-Site\\presentation\\templates\\pages\\register.tpl',
      1 => 1751161084,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68609970aa3811_91719757 (Smarty_Internal_Template $_smarty_tpl) {
?><h2 class="mb-4">Register</h2>

<?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
  <div class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
<?php }?>

<form method="post" action="../public/register.php">
  <div class="mb-3">
    <label for="name" class="form-label">Full Name</label>
	<input type="text" class="form-control" id="name" name="name" required>
  </div>
  
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>
  
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
	<input type="password" class="form-control" id="password" name="password" required>
  </div>
  
  <button type="submit" class="btn btn-success">Register</button>
</form>

<p class="mt-3">
  Already have an account? <a href="../public/login.php">Login here</a>.
</p><?php }
}
