<?php
session_start();
require_once '../include/db.php';
require_once '../include/smarty.php';
require_once '../include/functions.php';

$navCats = getNavCategories($conn);
$smarty->assign('navCats', $navCats);
$smarty->assign('title', 'Register');

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // gather input
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $address_line1 = trim($_POST['address_line1']);
    $address_line2 = trim($_POST['address_line2'] ?? '');
    $city = trim($_POST['city']);
    $state = trim($_POST['state']);
    $zip = trim($_POST['zip']);

    // Validate inputs
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email address.";
    } elseif (empty($first_name) || empty($last_name) || empty($address_line1) || empty($city) || empty($state) || empty($zip)) {
        $error = "All required fields must be filled out.";
    } else {
        // Check for duplicate email
        $stmt = $conn->prepare("SELECT user_id FROM user_account WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($res->num_rows > 0) {
            $error = "An account with that email already exists.";
        } else {
            // Hash and insert new user
            $hashed = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("
                INSERT INTO user_account 
                (first_name, last_name, email, password, address_line1, address_line2, city, state, zip)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
            ");
            $stmt->bind_param(
                "sssssssss",
                $first_name, $last_name, $email, $hashed,
                $address_line1, $address_line2, $city, $state, $zip
            );
            $stmt->execute();

            // Log user in
            $_SESSION['user_id'] = $conn->insert_id;
            $_SESSION['user_name'] = $first_name;

            header("Location: ../public/index.php");
            exit;
        }
    }
}

$smarty->assign('error', $error);
$smarty->assign('user_logged_in', isset($_SESSION['user_id']));
$smarty->assign('user_name', $_SESSION['user_name'] ?? '');

$smarty->display('layouts/header.tpl');
$smarty->display('pages/register.tpl');
$smarty->display('layouts/footer.tpl');

?>