<?php
require_once "verificarAcesso.php";
$tituloPagina = "Início";
include "cabecalho.php";
?>
<div class="w3-content" style="max-width:900px;">
    <div class="w3-panel w3-teal w3-round-large w3-center w3-padding">
        <h2>Projeto Lista de Amigos</h2>
        <p>Bem-vindo(a), <b><?php echo htmlspecialchars($_SESSION["logado"]); ?></b>!</p>
        <p>Escolha uma opção para continuar.</p>
    </div>
    <div class="w3-row-padding w3-center">
        <div class="w3-half w3-margin-bottom">
            <a href="cadastro.php" class="w3-button w3-teal w3-round-large w3-padding-32 w3-block">
                <i class="fa fa-user-plus" style="font-size:48px;"></i>
                <h3>Cadastrar amigo</h3>
            </a>
        </div>
        <div class="w3-half w3-margin-bottom">
            <a href="listar.php" class="w3-button w3-teal w3-round-large w3-padding-32 w3-block">
                <i class="fa fa-address-book" style="font-size:48px;"></i>
                <h3>Listar amigos</h3>
            </a>
        </div>
    </div>
</div>
<?php include "rodape.php"; ?>
