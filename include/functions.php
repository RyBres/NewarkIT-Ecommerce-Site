<?php
function getNavCategories(mysqli $conn): array
{
    // fetch parents
    $parents = [];
    $res = $conn->query("SELECT id, name FROM categories WHERE parent_id IS NULL ORDER BY name");
    while ($row = $res->fetch_assoc()) {
        $row['subcats'] = [];
        $parents[$row['id']] = $row;
    }

    // fetch subs
    $sub = $conn->query("SELECT id, name, parent_id FROM categories WHERE parent_id IS NOT NULL ORDER BY name");
    while ($row = $sub->fetch_assoc()) {
        $parents[$row['parent_id']]['subcats'][] = $row;
    }

    return array_values($parents); // re-index nicely
}
?>