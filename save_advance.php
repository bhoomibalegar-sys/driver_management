<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';

// Check DB connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get JSON input
$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    echo json_encode(["message" => "No data received"]);
    exit;
}

$driver_id = $data['driver_id'];
$amount = $data['amount'];
$reason = $data['reason'];
$date = $data['advance_date'];

// Insert query
$sql = "INSERT INTO driver_advance (driver_id, amount, reason, advance_date)
        VALUES ('$driver_id', '$amount', '$reason', '$date')";

if ($conn->query($sql)) {
    echo json_encode(["message" => "Advance saved successfully"]);
} else {
    echo json_encode(["message" => "DB Error: " . $conn->error]);
}
?>
