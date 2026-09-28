<?php
session_start();
require_once "conexaoBD.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: login.php");
    exit;
}

$nome = trim($_POST["txtNome"] ?? "");
$senha = $_POST["txtSenha"] ?? "";

$sql = "SELECT usuario, senha FROM login WHERE usuario = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("s", $nome);
$stmt->execute();
$resultado = $stmt->get_result();
$linha = $resultado->fetch_assoc();

$senhaValida = false;
if ($linha) {
 
    if (password_verify($senha, $linha["senha"])) {
        $senhaValida = true;
    } elseif (hash_equals((string)$linha["senha"], (string)$senha)) {
        $senhaValida = true;
        $novoHash = password_hash($senha, PASSWORD_DEFAULT);
        $update = $conexao->prepare("UPDATE login SET senha = ? WHERE usuario = ?");
        $update->bind_param("ss", $novoHash, $nome);
        $update->execute();
        $update->close();
    }
}

$stmt->close();
$conexao->close();

if ($senhaValida) {
    session_regenerate_id(true);
    $_SESSION["logado"] = $nome;
    header("Location: index.php");
    exit;
}

header("Location: acessoNegado.php");
exit;
?>