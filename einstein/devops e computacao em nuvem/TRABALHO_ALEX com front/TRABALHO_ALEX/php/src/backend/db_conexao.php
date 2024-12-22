<?php
// Conecta ao banco de dados
function conectarBanco() {
    $host = 'localhost'; // Endereço do servidor MySQL
    $usuario = 'root';   // Nome de usuário do MySQL
    $senha = 'MYSQL_ROOT_PASSWORD';         // Senha do root
    $banco = 'db_pessoas'; // Nome do banco de dados

    $conexao = new mysqli($host, $usuario, $senha, $banco);

    // Verifica se ocorreu algum erro na conexão
    if ($conexao->connect_error) {
        die("Falha na conexão: " . $conexao->connect_error);
    }

    return $conexao;
}
?>
