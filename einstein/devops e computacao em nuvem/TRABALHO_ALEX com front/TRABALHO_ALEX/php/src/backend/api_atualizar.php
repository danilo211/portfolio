<?php
// Arquivo: backend/api_atualizar.php
// Explicação: Esta API atualiza o nome e a idade de uma pessoa com base no ID.

include 'db_conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];

    if ($id && $nome && $idade) {
        $conexao = conectarBanco();
        $sql = "UPDATE pessoas SET nome='$nome', idade=$idade WHERE id=$id";

        if ($conexao->query($sql) === TRUE) {
            echo json_encode(["mensagem" => "Pessoa atualizada com sucesso!"]);
        } else {
            echo json_encode(["erro" => "Erro ao atualizar pessoa: " . $conexao->error]);
        }

        $conexao->close();
    } else {
        echo json_encode(["erro" => "Dados incompletos"]);
    }
}
?>
