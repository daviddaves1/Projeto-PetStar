<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = "localhost";
$dbname = "petstar";
$user = "seu_usuario"; //insira seu usuário do postgreSQL aqui
$password = "sua_senha"; //insira sua senha do postgreSQL aqui

// Conexão com o PostgreSQL
$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Erro de conexão: " . pg_last_error());
} else {
    echo "Conexão bem-sucedida!<br>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['login-email'];
    $senha = $_POST['login-senha'];

    echo "Dados recebidos: Email - $email, Senha - [NÃO EXIBIR POR SEGURANÇA]<br>";

    // Consulta ao banco de dados
    $query = "SELECT senha FROM usuarios WHERE email = $1";
    $result = pg_query_params($conn, $query, array($email));

    if ($result) {
        echo "Consulta executada com sucesso!<br>";
        $row = pg_fetch_assoc($result);
        if ($row) {
            echo "Usuário encontrado!<br>";
            if (password_verify($senha, $row['senha'])) {
                echo "Login bem-sucedido!";
            } else {
                echo "Email ou senha incorretos.";
            }
        } else {
            echo "Usuário não encontrado.";
        }
    } else {
        echo "Erro ao consultar o banco de dados: " . pg_last_error();
    }
    pg_close($conn);
}
?>
