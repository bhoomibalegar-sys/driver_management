<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';

if (!$conn) {
    die("Database connection failed");
}

$sql = "SELECT * FROM drivers";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}

$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>
