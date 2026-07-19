<?php
// ============================================
// Config file - Database connection settings
// This file is included by all other PHP files
// ============================================

$servername = "sql110.infinityfree.com";
$username   = "if0_42443222";
$password   = "Nn123456aa";
$dbname     = "if0_42443222_myfrist";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    http_response_code(500);
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Use utf8mb4 charset for proper Arabic/Unicode support
$conn->set_charset("utf8mb4");
?>
