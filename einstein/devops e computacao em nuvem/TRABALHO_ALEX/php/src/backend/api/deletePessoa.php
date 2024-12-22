<?php
include '../config.php';

header('Content-Type: application/json');

$input = file_get_contents('php://input');
parse_str($input, $data);

$id = $data['id_pessoa'] ?? 0;

if ($id) {
    $stmt = $pdo->prepare("DELETE FROM pessoas WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $success = $stmt->execute();

    echo json_encode(['apagado' => $success]);
} else {
    echo json_encode(['apagado' => false]);
}
?>
