<?php
session_start();
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $admin_username = $_POST['username'];
    $admin_password = $_POST['password'];

    // Substitua com as credenciais reais do administrador
    if ($admin_username === 'admin' && $admin_password === 'senha_mestra') {
        $_SESSION['admin'] = $admin_username;
        header('Location: admin_dashboard.php');
        exit;
    } else {
        echo "Credenciais inválidas.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login do Administrador</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Login do Administrador</h1>
    <form method="post" action="">
        <label for="username">Nome de Usuário:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required>
        
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
