<?php
session_start();
require_once 'config.php';
require_once 'models/Fornecedor.php';
require_once 'dataAcessObject/dbFornecedor.php';

// instanciando o objeto usuarioDAO
$fornecedores = new dbFornecedor($pdo);
$lista = $fornecedores->findAll();
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
                <li class="icons1"><i class="fa-solid fa-building-user"></i></li>
                <li class="icons2">Fornecedores</li>
            </ul>
        </header>
        <table class="table_list">
            <tr class="table-header">
                <th>Cód Forncedor</th>
                <th class="bord_left">Nome</th>
                <th class="bord_left">Telefone</th>
                <th class="bord_left">E-mail</th>
                <th class="bord_left">CNP/CPF</th>
                <th colspan="2" class="bord_left">Ações</th>
            </tr>
            <?php foreach ($lista as $iten) : ?>
                <tr>
                    <td><?= $iten->getCod_fornecedor(); ?></td>
                    <td class="bord2_left"><?= $iten->getRazaoSocial(); ?></td>
                    <td class="bord2_left"><?= $iten->getTelefone(); ?></td>
                    <td class="bord2_left"><?= $iten->getEmail(); ?></td>
                    <td class="bord2_left"><?= $iten->getCnpj(); ?></td>
                    <td class="bord2_left" class="btn-action"><a href="up_fornecedor.php?id=<?= $iten->getId(); ?>">Editar</a></td>
                    <td class="bord2_left" id="btn-action"><a href="delete_fornecedor.php?id=<?= $iten->getId(); ?>">Deletar</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</section>
<?php
include 'footer.php';
?>