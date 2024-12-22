<?php
include '../config/database.php';

$query = "SELECT * FROM tournaments";
$result = $conn->query($query);

$tournaments = [];
while ($row = $result->fetch_assoc()) {
    $tournaments[] = $row;
}

echo json_encode($tournaments);
?>
