<?php
require_once "verificarAcesso.php";
$tituloPagina = "Cadastrar amigo";
include "cabecalho.php";
?>
<div class="w3-card-4 w3-white w3-round-large w3-padding w3-content" style="max-width:650px; margin:24px auto;">
    <h2 class="w3-center w3-text-teal">Cadastro de Amigos</h2>
    <form action="cadastroAction.php" class="w3-container" method="post">
        <label class="w3-text-teal"><b>Nome</b></label>
        <input name="txtNome" class="w3-input w3-border w3-light-grey" maxlength="100" required>
        <br>
        <label class="w3-text-teal"><b>Apelido</b></label>
        <input name="txtApelido" class="w3-input w3-border w3-light-grey" maxlength="50" required>
        <br>
        <label class="w3-text-teal"><b>E-mail</b></label>
        <input name="txtEmail" type="email" class="w3-input w3-border w3-light-grey" maxlength="150" required>
        <br>
        <button class="w3-button w3-teal w3-round w3-right" type="submit"><i class="fa fa-user-plus"></i> Adicionar</button>
        <div class="w3-clear"></div>
    </form>
</div>
<?php include "rodape.php"; ?>
