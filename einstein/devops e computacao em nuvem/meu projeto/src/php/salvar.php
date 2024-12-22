<?php
// Parâmetros de conexão
$servername = "db";
$username = "usuario";
$password = "senha";
$database = "meu_banco";

// Conectar ao banco de dados
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificar se os dados foram enviados
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $email = $_POST["email"];

        // Inserir dados na tabela
        $sql = "INSERT INTO respostas (nome, email) VALUES (:nome, :email)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Redirecionar para a página de sucesso
        header("Location: success.php");
        exit;
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>
