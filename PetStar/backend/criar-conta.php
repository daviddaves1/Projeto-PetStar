<?php
$host = "localhost";
$dbname = "petstar";
$user = "seu_usuario"; //insira seu usuário do postgreSQL aqui
$password = "sua_senha"; //insira sua senha do postgreSQL aqui

// Conexão com o PostgreSQL
$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Erro de conexão: " . pg_last_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Inserção no banco de dados
    $query = "INSERT INTO usuarios (nome, email, senha) VALUES ($1, $2, $3)";
    $result = pg_query_params($conn, $query, array($nome, $email, password_hash($senha, PASSWORD_DEFAULT)));

    if ($result) {
        echo "Conta criada com sucesso!";
    } else {
        echo "Erro ao criar conta: " . pg_last_error();
    }
    pg_close($conn);
}
?>
