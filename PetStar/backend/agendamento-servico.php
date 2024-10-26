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
        header("Location: ../agendar-servico.html?mensagem=Erro: Todos os campos são obrigatórios.");
        exit();
    } else {
        $query = "INSERT INTO agendamentos (servico, data) VALUES ($1, $2)";
        $result = pg_query_params($conn, $query, array($servico, $data));
        if ($result) {
            header("Location: ../agendar-servico.html?mensagem=Serviço agendado com sucesso!");
            exit();
        } else {
            header("Location: ../agendar-servico.html?mensagem=Erro ao agendar serviço: " . pg_last_error($conn));
            exit();
        }
    }
    pg_close($conn);
} else {
    header("Location: ../agendar-servico.html?mensagem=Método de solicitação inválido.");
    exit();
}
?>
