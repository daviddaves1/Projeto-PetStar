<?php
include 'configuracao.php';

header('Content-Type: application/json');

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");
if (!$conn) {
    die("Erro de conexão: " . pg_last_error());
}

$query = "SELECT servico, data, hora FROM agendamentos";
$result = pg_query($conn, $query);
if (!$result) {
    echo json_encode([]);
    exit();
}

$agendamentos = pg_fetch_all($result);
echo json_encode($agendamentos);

pg_close($conn);
?>