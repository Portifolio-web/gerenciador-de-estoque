<?php
session_start();
require_once 'config.php';
require_once 'models/Usuarios.php';
require_once 'dataAcessObject/dbUsuario.php';

// instanciando o objeto usuarioDAO
$usuario = new DbUsuario($pdo);
$lista = $usuario->findAll();
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
                <li class="icons1"><i class="fa-solid fa-users"></i></li>
                <li class="icons2">Usuários</li>
            </ul>
        </header>

        <table class="table_list">
            <tr class="table-header">
                <th class="bord_left">Códgo Usuario</th>
                <th class="bord_left">Nome</th>
                <th class="bord_left">E-mail</th>

                <th colspan="2" class="bord_left">Ações</th>
            </tr>
            <?php foreach ($lista as $iten) : ?>
                <tr>
                    <td class="bord2_left"><?= $iten->getId(); ?></td>
                    <td class="bord2_left"><?= $iten->getNome(); ?></td>
                    <td class="bord2_left"><?= $iten->getEmail(); ?></td>
                    <td id="td4" class="bord2_left"><a href="update_user.php?id=<?= $iten->getId(); ?>">Editar</a></td>
                    <td id="td5" class="bord2_left"><a href="delete_usuario.php?id=<?= $iten->getId(); ?>">Deletar</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</section>
<?php
include 'footer.php';
?>