<?php
require_once "verificarAcesso.php";
require_once "conexaoBD.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: cadastro.php");
    exit;
}

$nome = trim($_POST["txtNome"] ?? "");
$apelido = trim($_POST["txtApelido"] ?? "");
$email = trim($_POST["txtEmail"] ?? "");

if ($nome === "" || $apelido === "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $conexao->close();
    exit("Dados inválidos. Volte ao formulário e confira os campos.");
}

$sql = "INSERT INTO amigo (nome, apelido, email) VALUES (?, ?, ?)";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("sss", $nome, $apelido, $email);
$ok = $stmt->execute();
$stmt->close();
$conexao->close();

$tituloPagina = "Resultado do cadastro";
include "cabecalho.php";
?>
<div class="w3-card w3-white w3-round-large w3-padding w3-content w3-center" style="max-width:600px;margin:40px auto;">
    <h2 class="<?php echo $ok ? 'w3-text-teal' : 'w3-text-red'; ?>">
        <?php echo $ok ? "Amigo salvo com sucesso!" : "Não foi possível salvar o amigo."; ?>
    </h2>
    <a class="w3-button w3-teal w3-round" href="listar.php">Ver lista de amigos</a>
    <a class="w3-button w3-light-grey w3-round" href="cadastro.php">Cadastrar outro</a>
</div>
<?php include "rodape.php"; ?>
