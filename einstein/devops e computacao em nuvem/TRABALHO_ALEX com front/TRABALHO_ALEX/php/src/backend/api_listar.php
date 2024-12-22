<?php
// Arquivo: backend/api_listar.php
// Explicação: Esta API retorna todas as pessoas cadastradas no banco.

include 'db_conexao.php';

$conexao = conectarBanco();
$sql = "SELECT * FROM pessoas";
$resultado = $conexao->query($sql);

$pessoas = [];

if ($resultado->num_rows > 0) {
    while($row = $resultado->fetch_assoc()) {
        $pessoas[] = $row;
    }
}

echo json_encode($pessoas);  // Retorna as pessoas em formato JSON

$conexao->close();
?>
