<?php
include '../config.php';

header('Content-Type: application/json');

$stmt = $pdo->query("SELECT * FROM pessoas");
$pessoas = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($pessoas);
?>
