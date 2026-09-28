<?php
session_start();
if (isset($_SESSION["logado"])) {
    header("Location: index.php");
    exit;
}
$tituloPagina = "Login";
include "cabecalho.php";
?>
<div class="w3-card-4 w3-white w3-round-large w3-padding w3-content" style="max-width:500px; margin:32px auto;">
    <div class="w3-center">
        <?php if (file_exists("gabi.jpg")): ?>
            <img src="gabi.jpg" alt="Imagem de perfil" class="w3-circle w3-margin-top" style="width:120px;height:120px;object-fit:cover;">
        <?php endif; ?>
        <h2 class="w3-text-teal">Acesso ao sistema</h2>
    </div>
    <form class="w3-container" action="loginAction.php" method="post">
        <label><b>Usuário</b></label>
        <input class="w3-input w3-border w3-margin-bottom" type="text" name="txtNome" placeholder="Digite seu usuário" required>
        <label><b>Senha</b></label>
        <input class="w3-input w3-border" type="password" name="txtSenha" placeholder="Digite sua senha" required>
        <button class="w3-button w3-teal w3-block w3-section w3-padding" type="submit">
            <i class="fa fa-sign-in"></i> Entrar
        </button>
    </form>
</div>
<?php include "rodape.php"; ?>
