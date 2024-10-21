<?php
include 'configuracao.php';

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Erro de conexão: " . pg_last_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servico = $_POST['servico'];
    $data = $_POST['data-agendamento-servico'];

    // Verifica se os campos não estão vazios
    if (empty($servico) || empty($data)) {
        echo "Erro: Todos os campos são obrigatórios.";
    } else {
        $query = "INSERT INTO agendamentos (servico, data) VALUES ($1, $2)";
        $result = pg_query_params($conn, $query, array($servico, $data));

        if ($result) {
            echo "Serviço agendado com sucesso!";
        } else {
            echo "Erro ao agendar serviço: " . pg_last_error($conn);
        }
    }

    pg_close($conn);
} else {
    echo "Método de solicitação inválido.";
}
?>
