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
    $servico = $_POST['servico'];
    $data = $_POST['data-agendamento-servico'];

    echo "Dados recebidos: Serviço - $servico, Data - $data<br>";

    // Verifica se os campos não estão vazios
    if (empty($servico) || empty($data)) {
        echo "Erro: Todos os campos são obrigatórios.";
    } else {
        // Inserção no banco de dados
        $query = "INSERT INTO agendamentos (servico, data) VALUES ($1, $2)";
        $result = pg_query_params($conn, $query, array($servico, $data));

        if ($result) {
            echo "Serviço agendado com sucesso!";
        } else {
            echo "Erro ao agendar serviço: " . pg_last_error();
        }
    }
    pg_close($conn);
} else {
    echo "Método de solicitação inválido.";
}
?>

