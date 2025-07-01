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

function get_cart_items($pdo) {
    if (isset($_SESSION['user_id'])) {
        // Logged-in user
        $stmt = $pdo->prepare("SELECT * FROM cart WHERE user_id = ?");
        $stmt->execute([$_SESSION['user_id']]);
    } else {
        // Guest
        $stmt = $pdo->prepare("SELECT * FROM cart WHERE session_id = ?");
        $stmt->execute([$_SESSION['session_id']]);
    }

    return $stmt->fetchAll();
}

function handle_login_cart_transition($pdo, $user_id) {
    // Remove guest cart
    $stmt = $pdo->prepare("DELETE FROM cart WHERE session_id = ?");
    $stmt->execute([$_SESSION['session_id']]);

    // Update session
    $_SESSION['user_id'] = $user_id;

    // (Optional) Load user's cart into session if needed
}

?>

