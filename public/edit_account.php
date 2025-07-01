<?php
session_start();
require_once '../include/db.php';
require_once '../include/smarty.php';
require_once '../include/functions.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$error = '';
$success = '';

$stmt = $conn->prepare("SELECT first_name, last_name, email, address_line1, address_line2, city, state, zip FROM user_account WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name     = trim($_POST['first_name']);
    $last_name      = trim($_POST['last_name']);
    $email          = trim($_POST['email']);
    $address_line1  = trim($_POST['address_line1']);
    $address_line2  = trim($_POST['address_line2'] ?? '');
    $city           = trim($_POST['city']);
    $state          = trim($_POST['state']);
    $zip            = trim($_POST['zip']);
    $password       = $_POST['password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email.";
    } else {
        // Update user info
        if (!empty($password)) {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE user_account SET first_name=?, last_name=?, email=?, password=?, address_line1=?, address_line2=?, city=?, state=?, zip=? WHERE user_id=?");
            $stmt->bind_param("sssssssssi", $first_name, $last_name, $email, $hashed, $address_line1, $address_line2, $city, $state, $zip, $user_id);
        } else {
            $stmt = $conn->prepare("UPDATE user_account SET first_name=?, last_name=?, email=?, address_line1=?, address_line2=?, city=?, state=?, zip=? WHERE user_id=?");
            $stmt->bind_param("sssssss si", $first_name, $last_name, $email, $address_line1, $address_line2, $city, $state, $zip, $user_id);
        }
        $stmt->execute();

        $_SESSION['user_name'] = $first_name;
        $success = "Your information has been updated.";
    }

    // Refresh data
    $user = [
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email,
        'address_line1' => $address_line1,
        'address_line2' => $address_line2,
        'city' => $city,
        'state' => $state,
        'zip' => $zip
    ];
}

$smarty->assign('user', $user);
$smarty->assign('error', $error);
$smarty->assign('success', $success);
$smarty->assign('title', 'Edit Profile');
$smarty->assign('user_logged_in', true);
$smarty->assign('user_name', $_SESSION['user_name']);
$smarty->assign('navCats', getNavCategories($conn));

$smarty->display('layouts/header.tpl');
$smarty->display('pages/edit_account.tpl');
$smarty->display('layouts/footer.tpl');
?>