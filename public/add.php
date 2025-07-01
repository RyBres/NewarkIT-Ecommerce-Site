<?php
session_start();
require_once '../include/db.php';

$product_id = (int) $_POST['product_id'];
$quantity = (int) $_POST['quantity'];

// Determine user or guest
$user_id = $_SESSION['user_id'] ?? null;
$session_id = session_id();

// Get current inventory for product
$stockCheck = $conn->prepare("SELECT quantity FROM inventory WHERE product_id = ?");
$stockCheck->bind_param("i", $product_id);
$stockCheck->execute();
$stockResult = $stockCheck->get_result();
$inventory = $stockResult->fetch_assoc();

if (!$inventory || $inventory['quantity'] < $quantity) {
    // Not enough stock
    $_SESSION['error'] = "Sorry, not enough stock available.";
    header("Location: ../public/view.php");
    exit;
}

// Start cart logic
if ($user_id) {
    $stmt = $conn->prepare("SELECT cart_id, quantity FROM cart WHERE user_id = ? AND product_id = ?");
    $stmt->bind_param("ii", $user_id, $product_id);
} else {
    $stmt = $conn->prepare("SELECT cart_id, quantity FROM cart WHERE session_id = ? AND product_id = ?");
    $stmt->bind_param("si", $session_id, $product_id);
}

$stmt->execute();
$result = $stmt->get_result();

// Check if user_id is set
if ($user_id) {
    $checkUser = $conn->prepare("SELECT user_id FROM user_account WHERE user_id = ?");
    $checkUser->bind_param("i", $user_id);
    $checkUser->execute();
    $userExists = $checkUser->get_result()->fetch_assoc();

    if (!$userExists) {
        // Clear invalid session and redirect
        unset($_SESSION['user_id']);
        $_SESSION['error'] = "Session error. Please log in again.";
        header("Location: ../public/login.php");
        exit;
    }
}

if ($row = $result->fetch_assoc()) {
    // Update quantity
    $newQty = $row['quantity'] + $quantity;
    $update = $conn->prepare("UPDATE cart SET quantity = ? WHERE cart_id = ?");
    $update->bind_param("ii", $newQty, $row['cart_id']);
    $update->execute();
} else {
    // Insert new item
    if ($user_id) {
        $insert = $conn->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)");
        $insert->bind_param("iii", $user_id, $product_id, $quantity);
    } else {
        $insert = $conn->prepare("INSERT INTO cart (session_id, product_id, quantity) VALUES (?, ?, ?)");
        $insert->bind_param("sii", $session_id, $product_id, $quantity);
    }
    $insert->execute();
}

header("Location: ../public/view.php");
exit;
?>
