<?php
header('Content-Type: application/json');
require_once '../include/db.php';

$q = isset($_GET['q']) ? trim($_GET['q']) : '';

if (strlen($q) < 2) {
  echo json_encode([]);
  exit;
}

$term = "%" . $conn->real_escape_string($q) . "%";

$stmt = $conn->prepare("
  SELECT product_id, name
  FROM products
  WHERE name LIKE ?
  ORDER BY name ASC LIMIT 5
");
$stmt->bind_param("s", $term);
$stmt->execute();

$result = $stmt->get_result();
$suggestions = [];

while ($row = $result->fetch_assoc()) {
  $suggestions[] = $row;
}

echo json_encode($suggestions);
?>