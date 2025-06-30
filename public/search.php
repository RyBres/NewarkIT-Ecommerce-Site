<?php
session_start();
require_once '../include/db.php';
require_once '../include/smarty.php';
require_once '../include/functions.php';

$searchTerm = isset($_GET['q']) ? trim($_GET['q']) : '';

$products = [];

if (!empty($searchTerm)) {
	$term = "%" . $conn->real_escape_string($searchTerm) . "%";
	$stmt = $conn->prepare("
		SELECT * FROM products
		WHERE name LIKE ? OR description LIKE ?
		ORDER BY product_id DESC
	");
	$stmt->bind_param("ss", $term, $term);
	$stmt->execute();
	$result = $stmt->get_result();
	while ($row = $result->fetch_assoc()) {
		$products[] = $row;
	}
	$stmt->close();
}

$smarty->assign('products', $products);
$smarty->assign('searchTerm', $searchTerm);
$smarty->assign('title', "Search Results for \"$searchTerm\"");
$smarty->assign('navCats', getNavCategories($conn));

$smarty->assign('user_logged_in', isset($_SESSION['user_id']));
$smarty->assign('user_name', $_SESSION['user_name'] ?? '');

$smarty->display('layouts/header.tpl');
$smarty->display('pages/search.tpl');
$smarty->display('layouts/footer.tpl');

?>