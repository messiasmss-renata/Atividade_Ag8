<?php
session_start();
$tituloPagina = "Acesso negado";
include "cabecalho.php";
?>
<div class="w3-card-4 w3-white w3-round-large w3-padding w3-content w3-center" style="max-width:600px; margin:48px auto;">
    <i class="fa fa-ban w3-text-red" style="font-size:64px;"></i>
    <h2 class="w3-text-red">Acesso negado!</h2>
    <p>Usuário ou senha incorretos. Confira os dados e tente novamente.</p>
    <a class="w3-button w3-teal w3-round" href="login.php">Voltar ao login</a>
</div>
<?php include "rodape.php"; ?>
