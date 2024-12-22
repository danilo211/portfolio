<?php
session_start();
include '../config/database.php';

if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit;
}

if (isset($_GET['id'])) {
    $tournament_id = $_GET['id'];
    // Aqui você pode implementar a lógica para editar o torneio, por exemplo:
    // $query = "SELECT * FROM tournaments WHERE id = ?";
    // $stmt = $conn->prepare($query);
    // ...
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Gerenciar Torneio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Gerenciar Torneio</h1>
    <p>Aqui você pode editar os detalhes do torneio.</p>
    <!-- Formulário para editar torneio -->
</body>
</html>
