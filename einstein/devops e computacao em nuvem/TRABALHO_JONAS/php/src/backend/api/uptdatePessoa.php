<?php
include '../config.php';

header('Content-Type: application/json');

$input = file_get_contents('php://input');
parse_str($input, $data);

$id = $data['id_pessoa'] ?? 0;
$nome = $data['nome'] ?? '';
$idade = $data['idade'] ?? '';

if ($id && $nome && $idade) {
    $stmt = $pdo->prepare("UPDATE pessoas SET nome = :nome, idade = :idade WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':idade', $idade);
    $success = $stmt->execute();

    echo json_encode(['atualizado' => $success]);
} else {
    echo json_encode(['atualizado' => false]);
}
?>
