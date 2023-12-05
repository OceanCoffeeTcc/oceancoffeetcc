<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $assunto = $_POST["assunto"];
    $mensagem = $_POST["mensagem"];

    $conexao = new mysqli("localhost", "root", "", "COLOCA O NOME DO SEU BANCO DE DADOS AQUI");

    if ($conexao->connect_error) {
        die("Falha na conexão: " . $conexao->connect_error);
    }

    $nome = $conexao->real_escape_string($nome);
    $email = $conexao->real_escape_string($email);
    $assunto = $conexao->real_escape_string($assunto);
    $mensagem = $conexao->real_escape_string($mensagem);

    $sql = "INSERT INTO feedbacks (nome, email, assunto, mensagem) VALUES ('$nome', '$email', '$assunto', '$mensagem')";

    if ($conexao->query($sql) === TRUE) {
        echo "Feedback enviado com sucesso!";
    } else {
        echo "Erro ao enviar feedback: " . $conexao->error;
    }

  
    $conexao->close();
} else
 {
    header("Location: index.html");
    exit();
}
?>
