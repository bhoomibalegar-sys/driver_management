<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';

// Check DB connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Read JSON input
$raw = file_get_contents("php://input");
$data = json_decode($raw, true);

// Debug input
if (!$data) {
    echo "No JSON received";
    exit;
}

if (!isset($data['name']) || trim($data['name']) == "") {
    echo "Driver name missing";
    exit;
}

$name = $conn->real_escape_string($data['name']);

// Insert query
$sql = "INSERT INTO drivers (name) VALUES ('$name')";

if ($conn->query($sql)) {
    echo "SUCCESS";
} else {
    echo "DB ERROR: " . $conn->error;
}
?>
