<?php
/* Smarty version 4.5.5, created on 2025-07-01 06:59:53
  from 'C:\Users\bresn\OneDrive\Documents\GitHub\NewarkIT-Ecommerce-Site\presentation\templates\pages\account.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_68636b49208778_54311278',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '27270f8c16a697778afa9e8754ddf2ae28fa3bb2' => 
    array (
      0 => 'C:\\Users\\bresn\\OneDrive\\Documents\\GitHub\\NewarkIT-Ecommerce-Site\\presentation\\templates\\pages\\account.tpl',
      1 => 1751345991,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68636b49208778_54311278 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="d-flex justify-content-center align-items-center">
  <div class="card static-card shadow-sm rounded-4 p-4 bg-light" style="max-width: 400px; width: 100%;">
    <h4 class="mb-3" style="text-align: center; color: black;">My Account</h4>
    <div class="d-grid gap-3">
      <a href="../public/edit_account.php" class="btn btn-primary">Manage Account Info</a>
      <a href="../public/orders.php" class="btn btn-primary">View Order History</a>
      <a href="../public/view.php" class="btn btn-success">
	  View Cart</a>
      <a href="../public/logout.php" class="btn btn-danger">Logout</a>
    </div>
  </div>
</div>
<?php }
}
