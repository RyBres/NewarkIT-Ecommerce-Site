<?php
function getNavCategories(mysqli $conn): array
{
    $nav = [];

    // Step 1: Get all departments
    $res = $conn->query("SELECT department_id, name FROM departments ORDER BY department_id");
    while ($row = $res->fetch_assoc()) {
        $row['categories'] = [];
        $nav[$row['department_id']] = $row;
    }

    // Step 2: Get categories and attach them to their department
    $catRes = $conn->query("SELECT category_id, name, department_id FROM categories ORDER BY name");
    while ($row = $catRes->fetch_assoc()) {
        $nav[$row['department_id']]['categories'][] = $row;
    }

    return array_values($nav); // to reindex numerically
}
?>
