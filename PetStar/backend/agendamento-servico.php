<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = "localhost";
$dbname = "petstar";
$user = "postgres";
$password = "Infinixlima46#";

// Conexão com o PostgreSQL
$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Erro de conexão: " . pg_last_error());
} else {
    echo "Conexão bem-sucedida!<br>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servico = $_POST['servico'];
    $data = $_POST['data-agendamento-servico'];

    // Inserção no banco de dados
    $query = "INSERT INTO agendamentos (servico, data) VALUES ($1, $2)";
    $result = pg_query_params($conn, $query, array($servico, $data));

    if ($result) {
        echo "Serviço agendado com sucesso!";
    } else {
        echo "Erro ao agendar serviço: " . pg_last_error();
    }
    pg_close($conn);
}
?>
