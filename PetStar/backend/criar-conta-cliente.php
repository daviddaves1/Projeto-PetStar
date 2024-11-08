<?php
include 'configuracao.php';

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");
if (!$conn) {
    die("Erro de conexão: " . pg_last_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verificar se o email já está cadastrado
    $query_email_check = "SELECT * FROM usuarios WHERE email = $1";
    $result_email_check = pg_query_params($conn, $query_email_check, array($email));
    
    if (pg_num_rows($result_email_check) > 0) {
        header("Location: ../criar-conta-cliente.html?mensagem=Email já cadastrado! Tente outro email.");
        exit();
    } else {
        $query = "INSERT INTO usuarios (nome, email, senha) VALUES ($1, $2, $3)";
        $result = pg_query_params($conn, $query, array($nome, $email, password_hash($senha, PASSWORD_DEFAULT)));
        
        if ($result) {
            header("Location: ../criar-conta-cliente.html?mensagem=Conta criada com sucesso! Volte e faça login.");
            exit();
        } else {
            header("Location: ../criar-conta-cliente.html?mensagem=Erro ao criar conta: " . pg_last_error($conn));
            exit();
        }
    }
    
    pg_close($conn);
}
?>
