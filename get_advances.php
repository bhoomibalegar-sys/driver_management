<?php
include 'db.php';

$sql = "SELECT da.*, d.name 
        FROM driver_advance da
        JOIN drivers d ON da.driver_id = d.id
        ORDER BY da.id DESC";

$result = $conn->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>