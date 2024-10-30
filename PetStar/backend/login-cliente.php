<?php
session_start(); // Iniciar a sessão
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'configuracao.php';

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");
if (!$conn) {
    die("Erro de conexão: " . pg_last_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['login-email'];
    $senha = $_POST['login-senha'];

    // Consulta ao banco de dados
    $query = "SELECT nome, senha FROM usuarios WHERE email = $1";
    $result = pg_query_params($conn, $query, array($email));
    
    if ($result) {
        $row = pg_fetch_assoc($result);
        if ($row) {
            // Verificar senha
            if (password_verify($senha, $row['senha'])) {
                $_SESSION['nome'] = $row['nome']; // Armazenar o nome do usuário na sessão
                header("Location: ../main-page.php");
                exit();
            } else {
                header("Location: ../login-cliente.html?mensagem=Email ou senha incorretos.");
                exit();
            }
        } else {
            header("Location: ../login-cliente.html?mensagem=Usuário não encontrado.");
            exit();
        }
    } else {
        header("Location: ../login-cliente.html?mensagem=Erro ao consultar o banco de dados: " . pg_last_error($conn));
        exit();
    }
    pg_close($conn);
}
?>
