<?php
require_once "verificarAcesso.php";
require_once "conexaoBD.php";

$resultado = $conexao->query("SELECT idamigo, nome, apelido, email FROM amigo ORDER BY nome");
$tituloPagina = "Listagem de amigos";
include "cabecalho.php";
?>
<div class="w3-content" style="max-width:1100px;">
    <h2 class="w3-center w3-text-teal">Listagem de Amigos</h2>
    <p class="w3-center"><a class="w3-button w3-teal w3-round" href="cadastro.php"><i class="fa fa-plus"></i> Cadastrar amigo</a></p>
    <div class="w3-responsive">
    <table class="w3-table-all w3-centered">
        <thead>
            <tr class="w3-teal">
                <th>Código</th><th>Nome</th><th>Apelido</th><th>E-mail</th><th>Atualizar</th><th>Excluir</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($resultado && $resultado->num_rows > 0): ?>
            <?php while ($linha = $resultado->fetch_assoc()): ?>
                <tr>
                    <td><?php echo (int)$linha["idamigo"]; ?></td>
                    <td><?php echo htmlspecialchars($linha["nome"]); ?></td>
                    <td><?php echo htmlspecialchars($linha["apelido"]); ?></td>
                    <td><?php echo htmlspecialchars($linha["email"]); ?></td>
                    <td><a class="w3-text-teal" title="Atualizar" href="atualizar.php?id=<?php echo (int)$linha["idamigo"]; ?>"><i class="fa fa-refresh fa-lg"></i></a></td>
                    <td><a class="w3-text-red" title="Excluir" href="excluir.php?id=<?php echo (int)$linha["idamigo"]; ?>"><i class="fa fa-trash fa-lg"></i></a></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="6">Nenhum amigo cadastrado.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
    </div>
</div>
<?php
if ($resultado) { $resultado->free(); }
$conexao->close();
include "rodape.php";
?>
