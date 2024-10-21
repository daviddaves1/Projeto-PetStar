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
    $cpf = $_POST['cpf-adm'];

    // Verificando se o email e/ou CPF já estão cadastrados
    $query_email_check = "SELECT * FROM administradores WHERE email = $1 OR cpf = $2";
    $result_email_check = pg_query_params($conn, $query_email_check, array($email, $cpf));

    if (pg_num_rows($result_email_check) > 0) {
        echo "Email ou CPF já cadastrado!<br>";
    } else {
        $query = "INSERT INTO administradores (nome, email, senha, cpf) VALUES ($1, $2, $3, $4)";
        $result = pg_query_params($conn, $query, array($nome, $email, password_hash($senha, PASSWORD_DEFAULT), $cpf));

        if ($result) {
            echo "Conta de administrador criada com sucesso!<br>";
        } else {
            echo "Erro ao criar conta: " . pg_last_error($conn);
        }
    }

    pg_close($conn);
}

?>