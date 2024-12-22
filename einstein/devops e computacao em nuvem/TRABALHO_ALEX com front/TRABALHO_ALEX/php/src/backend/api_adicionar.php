<?php
// Arquivo: backend/api_adicionar.php
// Explicação: Esta API recebe dados via POST e insere uma nova pessoa no banco.

include 'db_conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];

    if ($nome && $idade) {
        $conexao = conectarBanco();
        $sql = "INSERT INTO pessoas (nome, idade) VALUES ('$nome', $idade)";

        if ($conexao->query($sql) === TRUE) {
            echo json_encode(["mensagem" => "Pessoa adicionada com sucesso!"]);
        } else {
            echo json_encode(["erro" => "Erro ao adicionar pessoa: " . $conexao->error]);
        }

        $conexao->close();
    } else {
        echo json_encode(["erro" => "Dados incompletos"]);
    }
}
?>
