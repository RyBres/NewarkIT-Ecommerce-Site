<?php
session_start();
require_once '../include/db.php';

$product_id = (int) $_POST['product_id'];
$quantity = (int) $_POST['quantity'];
$session_id = session_id();

// Check if product already exists in the cart
$stmt = $conn->prepare("SELECT cart_id, quantity FROM cart WHERE session_id = ? AND product_id = ?");
$stmt->bind_param("si", $session_id, $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    // Update existing quantity
    $newQty = $row['quantity'] + $quantity;
    $update = $conn->prepare("UPDATE cart SET quantity = ? WHERE cart_id = ?");
    $update->bind_param("ii", $newQty, $row['cart_id']);
    $update->execute();
} else {
    // Insert new item
    $insert = $conn->prepare("INSERT INTO cart (session_id, product_id, quantity) VALUES (?, ?, ?)");
    $insert->bind_param("sii", $session_id, $product_id, $quantity);
    $insert->execute();
}

header("Location: ../public/view.php");
exit;
?>
