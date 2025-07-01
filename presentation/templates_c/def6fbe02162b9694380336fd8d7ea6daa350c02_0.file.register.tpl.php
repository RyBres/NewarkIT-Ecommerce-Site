<?php
/* Smarty version 4.5.5, created on 2025-07-01 06:43:01
  from 'C:\Users\bresn\OneDrive\Documents\GitHub\NewarkIT-Ecommerce-Site\presentation\templates\pages\register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_68636755221a64_23866708',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'def6fbe02162b9694380336fd8d7ea6daa350c02' => 
    array (
      0 => 'C:\\Users\\bresn\\OneDrive\\Documents\\GitHub\\NewarkIT-Ecommerce-Site\\presentation\\templates\\pages\\register.tpl',
      1 => 1751344978,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68636755221a64_23866708 (Smarty_Internal_Template $_smarty_tpl) {
?><h2 class="mb-4">Register</h2>

<?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
  <div class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
<?php }?>

<form method="post" action="../public/register.php">
  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="first_name" class="form-label">First Name</label>
      <input type="text" class="form-control" id="first_name" name="first_name" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="last_name" class="form-label">Last Name</label>
      <input type="text" class="form-control" id="last_name" name="last_name" required>
    </div>
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>

  <hr>
  <h5>Shipping Address</h5>

  <div class="mb-3">
    <label for="address_line1" class="form-label">Address Line 1</label>
    <input type="text" class="form-control" id="address_line1" name="address_line1" required>
  </div>

  <div class="mb-3">
    <label for="address_line2" class="form-label">Address Line 2 (optional)</label>
    <input type="text" class="form-control" id="address_line2" name="address_line2">
  </div>

  <div class="row">
    <div class="col-md-4 mb-3">
      <label for="city" class="form-label">City</label>
      <input type="text" class="form-control" id="city" name="city" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="state" class="form-label">State</label>
      <input type="text" class="form-control" id="state" name="state" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="zip" class="form-label">ZIP Code</label>
      <input type="text" class="form-control" id="zip" name="zip" required>
    </div>
  </div>

  <button type="submit" class="btn btn-success">Register</button>
</form>

<p class="mt-3">
  Already have an account? <a href="../public/login.php">Login here</a>.
</p>
<?php }
}
