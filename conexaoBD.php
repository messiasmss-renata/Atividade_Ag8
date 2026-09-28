<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pwii";

mysqli_report(MYSQLI_REPORT_OFF);
$conexao = new mysqli($servername, $username, $password, $dbname);

if ($conexao->connect_error) {
    die("Não foi possível conectar ao banco de dados. Confira o arquivo conexaoBD.php.");
}

$conexao->set_charset("utf8mb4");
?>