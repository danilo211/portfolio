<?php
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $date = $_POST['date'];

    $query = "INSERT INTO tournaments (name, date) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $name, $date);
    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Torneio registrado com sucesso."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Erro: " . $stmt->error]);
    }
}
?>
