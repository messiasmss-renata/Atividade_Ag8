<?php
require_once "verificarAcesso.php";
require_once "conexaoBD.php";

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
if (!$id || $id < 1) {
    $conexao->close();
    exit("Código de amigo inválido.");
}
$stmt = $conexao->prepare("SELECT nome, apelido, email FROM amigo WHERE idamigo = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$amigo = $stmt->get_result()->fetch_assoc();
$stmt->close();
$conexao->close();

if (!$amigo) {
    exit("Amigo não encontrado.");
}
$tituloPagina = "Atualizar amigo";
include "cabecalho.php";
?>
<div class="w3-card-4 w3-white w3-round-large w3-padding w3-content" style="max-width:650px;margin:24px auto;">
    <h2 class="w3-center w3-text-teal">Atualizar amigo — ID: <?php echo (int)$id; ?></h2>
    <form action="atualizarAction.php" class="w3-container" method="post">
        <input type="hidden" name="txtID" value="<?php echo (int)$id; ?>">
        <label class="w3-text-teal"><b>Nome</b></label>
        <input name="txtNome" class="w3-input w3-border w3-light-grey" maxlength="100" required value="<?php echo htmlspecialchars($amigo["nome"]); ?>">
        <br>
        <label class="w3-text-teal"><b>Apelido</b></label>
        <input name="txtApelido" class="w3-input w3-border w3-light-grey" maxlength="50" required value="<?php echo htmlspecialchars($amigo["apelido"]); ?>">
        <br>
        <label class="w3-text-teal"><b>E-mail</b></label>
        <input name="txtEmail" type="email" class="w3-input w3-border w3-light-grey" maxlength="150" required value="<?php echo htmlspecialchars($amigo["email"]); ?>">
        <br>
        <button class="w3-button w3-teal w3-round w3-right" type="submit"><i class="fa fa-refresh"></i> Atualizar</button>
        <a class="w3-button w3-light-grey w3-round" href="listar.php">Cancelar</a>
        <div class="w3-clear"></div>
    </form>
</div>
<?php include "rodape.php"; ?>
