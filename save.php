<?php
// ============================================
// save.php
// Receives name and age from JavaScript (POST)
// and saves them into the "user" table with
// status = 0 by default
// ============================================

require "config.php";
header('Content-Type: application/json; charset=utf-8');

// Check that values were actually sent
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$age  = isset($_POST['age'])  ? trim($_POST['age'])  : '';

if ($name === '' || $age === '') {
    echo json_encode(["success" => false, "message" => "Name and age are required"]);
    exit;
}

// Using a Prepared Statement to prevent SQL Injection
$stmt = $conn->prepare("INSERT INTO user (name, age, status) VALUES (?, ?, 0)");
$stmt->bind_param("si", $name, $age); // s = string, i = integer

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Record saved successfully"]);
} else {
    echo json_encode(["success" => false, "message" => "Error: " . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
