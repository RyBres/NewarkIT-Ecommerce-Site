<?php
session_start();
require_once '../include/db.php';

$user_id = $_SESSION['user_id'] ?? null;
$session_id = session_id();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'], $_POST['quantity'])) {
    $product_id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];

    // Fetch current inventory
    $stockStmt = $conn->prepare("SELECT quantity FROM inventory WHERE product_id = ?");
    $stockStmt->bind_param("i", $product_id);
    $stockStmt->execute();
    $stockResult = $stockStmt->get_result()->fetch_assoc();
    $stock = $stockResult['quantity'] ?? 0;

    if ($quantity > $stock) {
        $_SESSION['error'] = "Not enough inventory for this product.";
        header("Location: ../public/view.php");
        exit;
    }

    // Remove item if quantity is 0 or less
    if ($quantity <= 0) {
        if ($user_id) {
            $stmt = $conn->prepare("DELETE FROM cart WHERE user_id = ? AND product_id = ?");
            $stmt->bind_param("ii", $user_id, $product_id);
        } else {
            $stmt = $conn->prepare("DELETE FROM cart WHERE session_id = ? AND product_id = ?");
            $stmt->bind_param("si", $session_id, $product_id);
        }
    } else {
        // Update quantity
        if ($user_id) {
            $stmt = $conn->prepare("UPDATE cart SET quantity = ? WHERE user_id = ? AND product_id = ?");
            $stmt->bind_param("iii", $quantity, $user_id, $product_id);
        } else {
            $stmt = $conn->prepare("UPDATE cart SET quantity = ? WHERE session_id = ? AND product_id = ?");
            $stmt->bind_param("isi", $quantity, $session_id, $product_id);
        }
    }

    $stmt->execute();
}

header("Location: ../public/view.php");
exit;
