<?php
if(!isset($_SESSION['msg'])) session_start();
require_once 'config.php';
require_once 'models/produtos.php';
require_once 'dataAcessObject/ProdutosMysql.php';

// instanciando o objeto usuarioDAO
$produtos = new ProdutosMysql($pdo);
$lista = $produtos->findAll();
?>
<!-- seção de header do sistema -->
<?php
require_once 'header.php';
require_once 'menu_lateral.php';
?>
<section class="section_form">
    <div class="alert">
        <?php
        if (isset($_SESSION['msg']) && !empty($_SESSION['msg'])) {
            echo "<p>" . $_SESSION['msg'] . "</p>";
            $_SESSION['msg'] = '';
        }
        ?>
    </div>
    <div class="main-table">
        <header class="header">
            <ul>
                <li class="icons1"><i class="fa-solid fa-people-carry-box"></i></li>
                <li class="icons2">Estoque</li>
            </ul>
        </header>
        <table class="table_list">
            <tr class="table-header">
                <th>Códgo</th>
                <th class="bord_left">Nome</th>
                <th class="bord_left">Preços</th>
                <th class="bord_left">Estoque</th>
                <th class="bord_left">Estoque Mín</th>
                <th colspan="2" class="bord_left">Ações</th>
            </tr>
            <?php foreach ($lista as $iten) : ?>
                <tr>
                    <td ><?= $iten->getCod_Produto(); ?></td>
                    <td class="bord2_left"><?= $iten->getNome(); ?></td>
                    <td class="bord2_left">R$ <?= $iten->getPreco(); ?></td>
                    <td class="bord2_left"><?= $iten->getEstoque(); ?></td>
                    <td class="bord2_left"><?= $iten->getMinEstoque(); ?></td>
                    <td class="bord2_left" class="btn-action"><a href="update.php?id=<?= $iten->getId(); ?>">Editar</a></td>
                    <td class="bord2_left" id="btn-action"><a href="delete.php?id=<?= $iten->getId(); ?>">Deletar</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</section>
<?php
include 'footer.php';
?>