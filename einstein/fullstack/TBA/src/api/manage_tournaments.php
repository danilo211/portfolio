<?php
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tournament_id = $_POST['id'];
    $name = $_POST['name'];
    $date = $_POST['date'];

    $query = "UPDATE tournaments SET name = ?, date = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $name, $date, $tournament_id);
    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Torneio atualizado com sucesso."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Erro: " . $stmt->error]);
    }
}
?>
