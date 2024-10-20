<?php 
    $endereco = 'localhost';
    $banco = 'petstar';
    $user = "seu_usuario"; //insira seu usuário do postgreSQL aqui
    $password = "sua_senha"; //insira sua senha do postgreSQL aqui

    try {
        $pdo = new PDO("pgsql:host=$endereco;port=5432;dbname:$banco", $usuario, $senha, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        echo "Conectado no banco de dados!!!";

    } catch (PDOException $e) {
        echo "Falha ao conectar ao banco de dados. <br>";
        die($e->getMessage());
    }

?>