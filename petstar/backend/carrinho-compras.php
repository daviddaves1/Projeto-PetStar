<?php
session_start();
include '../configuracao.php'; // Certifique-se de que o caminho está correto

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Erro de conexão: " . pg_last_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];

    $sql = "INSERT INTO carrinho (produto, quantidade) VALUES ($1, $2)";
    $result = pg_query_params($conn, $sql, array($produto, $quantidade));

    if ($result) {
        echo "Produto adicionado ao carrinho com sucesso!";
    } else {
        echo "Erro: " . pg_last_error($conn);
    }

    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = [];
    }

    $produtoExistente = false;
    foreach ($_SESSION['carrinho'] as &$item) {
        if ($item['produto'] == $produto) {
            $item['quantidade'] += $quantidade;
            $produtoExistente = true;
            break;
        }
    }

    if (!$produtoExistente) {
        $_SESSION['carrinho'][] = [
            'produto' => $produto,
            'quantidade' => $quantidade,
        ];
    }
}

pg_close($conn);

// Redirecionar de volta para a página do carrinho de compras
header("Location: ../index5.html");
exit();
?>