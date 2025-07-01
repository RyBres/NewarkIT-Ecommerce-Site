<?php
session_start();
require_once '../include/db.php';

$session_id = session_id();
$user_id = $_SESSION['user_id'] ?? null;

$product_id = isset($_POST['product_id']) ? (int) $_POST['product_id'] : 0;

if ($user_id) {
	if ($product_id > 0) {
		$stmt = $conn->prepare("DELETE FROM cart WHERE user_id = ? AND product_id = ?");
		$stmt->bind_param("si", $user_id, $product_id);
	}
} else {
	if ($product_id > 0) {
		$stmt = $conn->prepare("DELETE FROM cart WHERE session_id = ? AND product_id = ?");
		$stmt->bind_param("si", $session_id, $product_id);
	}
}
$stmt->execute();

header("Location: ../public/view.php");
?>