<?php
session_start();
include 'configuracao.php';

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Erro de conexão: " . pg_last_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_SESSION['usuario_id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $bairro = $_POST['bairro'];
    $endereco = $_POST['endereco'];

    // Verifica se o usuário já possui um perfil
    $query_check = "SELECT id FROM perfil_cliente WHERE id_usuario = $1";
    $result_check = pg_query_params($conn, $query_check, array($id));

    if (pg_num_rows($result_check) > 0) {
        // Atualiza os dados existentes
        $query_update = "UPDATE perfil_cliente SET nome = $1, cpf = $2, telefone = $3, email = $4, bairro = $5, endereco = $6 WHERE id_usuario = $7";
        $result_update = pg_query_params($conn, $query_update, array($nome, $cpf, $telefone, $email, $bairro, $endereco, $id));
        if ($result_update) {
            echo "Dados atualizados com sucesso!";
        } else {
            echo "Erro ao atualizar dados: " . pg_last_error($conn);
        }
    } else {
        // Insere novos dados
        $query_insert = "INSERT INTO perfil_cliente (id_usuario, nome, cpf, telefone, email, bairro, endereco) VALUES ($1, $2, $3, $4, $5, $6, $7)";
        $result_insert = pg_query_params($conn, $query_insert, array($id, $nome, $cpf, $telefone, $email, $bairro, $endereco));
        if ($result_insert) {
            echo "Dados inseridos com sucesso!";
        } else {
            echo "Erro ao inserir dados: " . pg_last_error($conn);
        }
    }
}

pg_close($conn);
?>
