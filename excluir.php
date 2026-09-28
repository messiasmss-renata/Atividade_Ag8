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
$tituloPagina = "Confirmar exclusão";
include "cabecalho.php";
?>
<div class="w3-card-4 w3-white w3-round-large w3-padding w3-content" style="max-width:650px;margin:24px auto;">
    <h2 class="w3-center w3-text-red">Confirmar exclusão — ID: <?php echo (int)$id; ?></h2>
    <p>Deseja realmente excluir este amigo?</p>
    <p><b>Nome:</b> <?php echo htmlspecialchars($amigo["nome"]); ?></p>
    <p><b>Apelido:</b> <?php echo htmlspecialchars($amigo["apelido"]); ?></p>
    <p><b>E-mail:</b> <?php echo htmlspecialchars($amigo["email"]); ?></p>
    <form action="excluirAction.php" method="post">
        <input type="hidden" name="txtID" value="<?php echo (int)$id; ?>">
        <button class="w3-button w3-red w3-round" type="submit"><i class="fa fa-trash"></i> Confirmar exclusão</button>
        <a class="w3-button w3-light-grey w3-round" href="listar.php">Cancelar</a>
    </form>
</div>
<?php include "rodape.php"; ?>
