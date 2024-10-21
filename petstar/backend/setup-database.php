<?php

include 'configuracao.php';

// Conecta ao servidor PostgreSQL
$conn = pg_connect("host=$host dbname=postgres user=$user password=$password");
if (!$conn) {
    die("Erro de conexão: " . pg_last_error());
}

// Verifica se o banco de dados "petstar" existe
$query_check_db = "SELECT 1 FROM pg_database WHERE datname = '$dbname'";
$result_check_db = pg_query($conn, $query_check_db);
if (pg_num_rows($result_check_db) == 0) {
    // Cria o banco de dados "petstar" se não existir
    $query_db = "
    CREATE DATABASE $dbname
    WITH
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'Portuguese_Brazil.1252'
    LC_CTYPE = 'Portuguese_Brazil.1252'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1
    IS_TEMPLATE = False";
    $result_db = pg_query($conn, $query_db);
    if (!$result_db) {
        die("Erro ao criar banco de dados: " . pg_last_error($conn));
    } else {
        echo "Banco de dados criado com sucesso!<br>";
    }
} else {
    echo "Banco de dados já existe!<br>";
}
pg_close($conn);

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");
if (!$conn) {
    die("Erro de conexão: " . pg_last_error());
}

$queries = [
    "CREATE TABLE IF NOT EXISTS usuarios (
        id SERIAL PRIMARY KEY,
        nome VARCHAR(40) NOT NULL,
        email VARCHAR(40) NOT NULL UNIQUE,
        senha VARCHAR(255) NOT NULL
    )",
    "CREATE TABLE IF NOT EXISTS carrinho (
        id SERIAL PRIMARY KEY,
        produto VARCHAR(255) NOT NULL,
        quantidade INT NOT NULL
    )",
    "CREATE TABLE IF NOT EXISTS agendamentos (
        id SERIAL PRIMARY KEY,
        servico VARCHAR(20) NOT NULL,
        data DATE NOT NULL
    )",
    "CREATE TABLE IF NOT EXISTS administradores (
        id SERIAL PRIMARY KEY,
        nome VARCHAR(40) NOT NULL,
        email VARCHAR(40) NOT NULL UNIQUE,
        senha VARCHAR(255) NOT NULL,
        cpf VARCHAR(14) NOT NULL UNIQUE
    )"
];

foreach ($queries as $query) {
    $result = pg_query($conn, $query);
    if (!$result) {
        echo "Erro ao criar tabela: " . pg_last_error($conn) . "<br>";
    }
}

pg_close($conn);
echo "Estrutura do banco de dados criada com sucesso!";

?>
