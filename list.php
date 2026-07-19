<?php
// ============================================
// list.php
// Returns all records from the "user" table
// as JSON, so JavaScript can render them in
// the table without a page refresh
// ============================================

require "config.php";
header('Content-Type: application/json; charset=utf-8');

$sql = "SELECT id, name, age, status FROM user ORDER BY id DESC";
$result = $conn->query($sql);

$rows = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
}

echo json_encode($rows);

$conn->close();
?>
