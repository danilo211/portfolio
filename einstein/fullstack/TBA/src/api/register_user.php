<?php
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $rank = $_POST['rank'];
    $route = $_POST['route'];

    $query = "INSERT INTO users (username, password, rank, route) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $username, $password, $rank, $route);
    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Usuário registrado com sucesso."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Erro: " . $stmt->error]);
    }
}
?>
