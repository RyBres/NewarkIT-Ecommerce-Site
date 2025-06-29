<?php
session_start();
session_unset();
session_destroy();
header("Location: /NewarkIT-Ecommerce-Site/public/index.php");
exit;
?>