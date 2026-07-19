<?php
// ============================================
// toggle.php
// Receives an id from JavaScript
// and flips the status value:
// if it's 0 -> becomes 1, if it's 1 -> becomes 0
// ============================================

require "config.php";
header('Content-Type: application/json; charset=utf-8');

$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

if ($id <= 0) {
    echo json_encode(["success" => false, "message" => "Invalid id"]);
    exit;
}

// One query flips the value directly in the database
// status = IF(status = 0, 1, 0)  =>  flips the value
$stmt = $conn->prepare("UPDATE user SET status = IF(status = 0, 1, 0) WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    // Return the new value so it can be shown instantly on the page
    $res = $conn->query("SELECT status FROM user WHERE id = $id");
    $newStatus = $res->fetch_assoc()['status'];
    echo json_encode(["success" => true, "newStatus" => $newStatus]);
} else {
    echo json_encode(["success" => false, "message" => $stmt->error]);
}

$stmt->close();
$conn->close();
?>
