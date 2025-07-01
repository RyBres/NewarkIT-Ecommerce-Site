<?php
session_unset();
session_destroy();
session_start();
$_SESSION['session_id'] = session_create_id();

session_unset();
session_destroy();
header("Location: /NewarkIT-Ecommerce-Site/public/index.php");
exit;
?> 