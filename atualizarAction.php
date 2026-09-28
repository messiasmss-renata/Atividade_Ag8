<?php
require_once "verificarAcesso.php";
require_once "conexaoBD.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: listar.php");
    exit;
}

$id = filter_input(INPUT_POST, "txtID", FILTER_VALIDATE_INT);
$nome = trim($_POST["txtNome"] ?? "");
$apelido = trim($_POST["txtApelido"] ?? "");
$email = trim($_POST["txtEmail"] ?? "");

if (!$id || $id < 1 || $nome === "" || $apelido === "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $conexao->close();
    exit("Dados inválidos. Volte à lista e tente novamente.");
}

$stmt = $conexao->prepare("UPDATE amigo SET nome = ?, apelido = ?, email = ? WHERE idamigo = ?");
$stmt->bind_param("sssi", $nome, $apelido, $email, $id);
$ok = $stmt->execute();
$stmt->close();
$conexao->close();

$tituloPagina = "Resultado da atualização";
include "cabecalho.php";
?>
<div class="w3-card w3-white w3-round-large w3-padding w3-content w3-center" style="max-width:600px;margin:40px auto;">
    <h2 class="<?php echo $ok ? 'w3-text-teal' : 'w3-text-red'; ?>">
        <?php echo $ok ? "Amigo atualizado com sucesso!" : "Não foi possível atualizar o amigo."; ?>
    </h2>
    <a class="w3-button w3-teal w3-round" href="listar.php">Voltar à lista</a>
</div>
<?php include "rodape.php"; ?>
