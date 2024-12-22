<?php
include '../config.php';

header('Content-Type: application/json');

$input = file_get_contents('php://input');
parse_str($input, $data);

$nome = $data['nome'] ?? '';
$idade = $data['idade'] ?? '';

if ($nome && $idade) {
    $stmt = $pdo->prepare("INSERT INTO pessoas (nome, idade) VALUES (:nome, :idade)");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':idade', $idade);
    $success = $stmt->execute();

    echo json_encode(['adicionado' => $success]);
} else {
    echo json_encode(['adicionado' => false]);
}
?>
