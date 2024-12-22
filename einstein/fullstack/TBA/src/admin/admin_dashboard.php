<?php
session_start();
include '../config/database.php';

if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit;
}

$query = "SELECT * FROM teams";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel do Administrador</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Painel do Administrador</h1>
    <p>Bem-vindo, <?php echo $_SESSION['admin']; ?>!</p>
    <h2>Gerenciar Times</h2>
    <table>
        <tr>
            <th>Nome do Time</th>
            <th>Top</th>
            <th>Elo Top</th>
            <th>Jungle</th>
            <th>Elo Jungle</th>
            <th>Mid</th>
            <th>Elo Mid</th>
            <th>ADC</th>
            <th>Elo ADC</th>
            <th>Suporte</th>
            <th>Elo Suporte</th>
        </tr>
        <?php while ($team = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $team['nome_time']; ?></td>
                <td><?php echo $team['topo']; ?></td>
                <td><?php echo $team['elo_top']; ?></td>
                <td><?php echo $team['jungle']; ?></td>
                <td><?php echo $team['elo_jungle']; ?></td>
                <td><?php echo $team['mid']; ?></td>
                <td><?php echo $team['elo_mid']; ?></td>
                <td><?php echo $team['adc']; ?></td>
                <td><?php echo $team['elo_adc']; ?></td>
                <td><?php echo $team['suporte']; ?></td>
                <td><?php echo $team['elo_suporte']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
