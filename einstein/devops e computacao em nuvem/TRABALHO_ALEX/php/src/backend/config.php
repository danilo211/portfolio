<?php
$host = 'localhost'; // ou o IP do seu servidor MySQL
$db = 'TRABALHO_ALEX';
$user = 'root'; // ou o usuário que você estiver utilizando
$pass = ''; // ou a senha do usuário

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erro na conexão: ' . $e->getMessage();
    exit;
}
?>
