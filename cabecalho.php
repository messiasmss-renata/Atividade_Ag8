<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$tituloPagina = $tituloPagina ?? "Sistema de Cadastro de Amigos";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($tituloPagina); ?></title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="w3-light-grey">
<header class="w3-container w3-teal w3-padding">
    <h1 class="w3-center">Sistema de Cadastro de Amigos</h1>
    <nav class="w3-center">
        <?php if (isset($_SESSION["logado"])): ?>
            <a class="w3-button w3-teal" href="index.php">Início</a>
            <a class="w3-button w3-teal" href="cadastro.php">Cadastrar amigo</a>
            <a class="w3-button w3-teal" href="listar.php">Listar amigos</a>
            <a class="w3-button w3-teal" href="logoutAction.php">Sair</a>
        <?php else: ?>
            <a class="w3-button w3-teal" href="login.php">Login</a>
        <?php endif; ?>
    </nav>
</header>

