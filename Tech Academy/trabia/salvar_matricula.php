<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $curso_id = $_POST['curso_id'];
    $nome     = $_POST['nome'];
    $email    = $_POST['email'];
    $telefone = $_POST['telefone'] ?? '';

    $stmt = $pdo->prepare("INSERT INTO interesses (nome, email, mensagem) VALUES (?, ?, ?)");
    $mensagem = "Interesse no curso ID $curso_id - Telefone: $telefone";
    
    if ($stmt->execute([$nome, $email, $mensagem])) {
        echo "✅ Matrícula registrada com sucesso! Entraremos em contato em breve.";
    } else {
        echo "❌ Erro ao salvar. Tente novamente.";
    }
}
?>