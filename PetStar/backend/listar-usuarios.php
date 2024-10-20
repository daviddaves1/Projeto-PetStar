<?php
$host = "localhost";
$dbname = "petstar";
$user = "seu_usuario"; //insira seu usuário do postgreSQL aqui
$password = "sua_senha"; //insira sua senha do postgreSQL aqui

// Conexão com o PostgreSQL
$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Erro de conexão: " . pg_last_error());
}

$query = "SELECT nome, email FROM usuarios";
$result = pg_query($conn, $query);

if ($result) {
    echo "<table border='1'>";
    echo "<tr><th>Nome</th><th>Email</th></tr>";
    while ($row = pg_fetch_assoc($result)) {
        echo "<tr><td>" . htmlspecialchars($row['nome']) . "</td><td>" . htmlspecialchars($row['email']) . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Erro ao buscar dados: " . pg_last_error();
}

pg_close($conn);
?>
