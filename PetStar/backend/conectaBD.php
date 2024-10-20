<?php 
    $endereco = 'localhost';
    $banco = 'petstar';
    $usuario = 'postgres';
    $senha = 'Infinixlima46#';

    try {
        $pdo = new PDO("pgsql:host=$endereco;port=5432;dbname:$banco", $usuario, $senha, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        echo "Conectado no banco de dados!!!";

    } catch (PDOException $e) {
        echo "Falha ao conectar ao banco de dados. <br>";
        die($e->getMessage());
    }

?>