<?php
require_once "verificarAcesso.php";
require_once "conexaoBD.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: listar.php");
    exit;
}

$id = filter_input(INPUT_POST, "txtID", FILTER_VALIDATE_INT);
if (!$id || $id < 1) {
    $conexao->close();
    exit("Código de amigo inválido.");
}

$stmt = $conexao->prepare("DELETE FROM amigo WHERE idamigo = ?");
$stmt->bind_param("i", $id);
$ok = $stmt->execute();
$afetadas = $stmt->affected_rows;
$stmt->close();
$conexao->close();

$tituloPagina = "Resultado da exclusão";
include "cabecalho.php";
?>
<div class="w3-card w3-white w3-round-large w3-padding w3-content w3-center" style="max-width:600px;margin:40px auto;">
    <h2 class="<?php echo ($ok && $afetadas > 0) ? 'w3-text-teal' : 'w3-text-red'; ?>">
        <?php
        if ($ok && $afetadas > 0) {
            echo "Amigo excluído com sucesso!";
        } else {
            echo "Não foi possível excluir o amigo ou o registro não existe.";
        }
        ?>
    </h2>
    <a class="w3-button w3-teal w3-round" href="listar.php">Voltar à lista</a>
</div>
<?php include "rodape.php"; ?>
