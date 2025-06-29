<?php
/* Smarty version 4.5.5, created on 2025-06-29 21:03:52
  from 'C:\Users\bresn\OneDrive\Documents\GitHub\NewarkIT-Ecommerce-Site\presentation\templates\pages\account.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_68618e185776f1_46264943',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '27270f8c16a697778afa9e8754ddf2ae28fa3bb2' => 
    array (
      0 => 'C:\\Users\\bresn\\OneDrive\\Documents\\GitHub\\NewarkIT-Ecommerce-Site\\presentation\\templates\\pages\\account.tpl',
      1 => 1751223799,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68618e185776f1_46264943 (Smarty_Internal_Template $_smarty_tpl) {
?><h2 class="mb-4">My Account</h2>

<p>Welcome back, <?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
!</p>

<ul>
  <li><a href="../public/orders.php">View Order History</a></li>
  <li><a href="../public/view.php">View Cart</a></li>
  <li><a href="../public/logout.php" class="text-danger">Logout</a></li>
</ul><?php }
}
