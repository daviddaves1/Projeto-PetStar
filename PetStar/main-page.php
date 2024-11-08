<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/mediaquery.css">
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION['nome'])) {
        header("Location: login-cliente.html"); // Redirecionar para a página de login se o nome do usuário não estiver definido
        exit();
    }
    $nome_usuario = $_SESSION['nome'];
    ?>
    <header>
        <img src="imagens/img2.png" alt="Imagem da PetStar" id="img-petstar-small">
        <h1>PetStar - Brilho Animal</h1>
        <p>Tudo aquilo que você sempre quis sobre os Petshops em um único lugar</p>
        <div class="user-options">
            <span class="material-symbols-outlined user-icon" onclick="toggleUserMenu()">settings</span>
            <div class="user-menu" id="userMenu">
                <a href="perfil-cliente.html">Perfil</a>
                <a href="backend/logout.php">Sair</a>
            </div>
        </div>
    </header>
    <nav>
        <a href="main-page.php">Início</a>
        <a href="agendar-servico.html">Agendar Serviço</a>
        <a href="carrinho-compras.html">Carrinho</a>
        <a href="#">Suporte</a>
    </nav>
    <main class="main-page">
        <section>
            <h1>Bem-vindo de volta!</h1>
            <p>Olá, <strong><?php echo htmlspecialchars($nome_usuario); ?></strong>! Aqui você pode gerenciar todas as necessidades do seu pet com facilidade.</p>
        </section>
        <section>
            <h2>Seus Agendamentos</h2>
            <p>Já possui algum serviço agendado? Caso não, <a href="agendar-servico.html">Clique aqui</a> para agendar um serviço.</p>
        </section>
        <section>
            <h2>Dicas de Cuidados</h2>
            <ul>
                <li>Mantenha a alimentação do seu pet balanceada.</li>
                <li>Faça exercícios regulares com seu pet.</li>
                <li>Visite o veterinário periodicamente.</li>
            </ul>
        </section>
    </main>
    <footer>
        <p>Site Criado por <a href="https://github.com/daviddaves1/ms_20242_g9" target="_blank">Grupo 09</a></p>
    </footer>
    <script src="scripts/script.js?v=1.0"></script>
</body>
</html>
