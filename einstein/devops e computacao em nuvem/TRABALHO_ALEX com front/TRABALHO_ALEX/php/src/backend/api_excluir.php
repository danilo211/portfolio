<?php
// Arquivo: backend/api_excluir.php
// Explicação: Esta API exclui uma pessoa com base no ID fornecido.

include 'db_conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    if ($id) {
        $conexao = conectarBanco();
        $sql = "DELETE FROM pessoas WHERE id = $id";

        if ($conexao->query($sql) === TRUE) {
            echo json_encode(["mensagem" => "Pessoa excluída com sucesso!"]);
        } else {
            echo json_encode(["erro" => "Erro ao excluir pessoa: " . $conexao->error]);
        }

        $conexao->close();
    } else {
        echo json_encode(["erro" => "ID não fornecido"]);
    }
}
?>
