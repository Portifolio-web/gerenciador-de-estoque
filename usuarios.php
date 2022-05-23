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
<section class="section_table">
    <div class="alert">
        <?php
        if (isset($_SESSION['msg']) && !empty($_SESSION['msg'])) {
            echo "<p>" . $_SESSION['msg'] . "</p>";
            $_SESSION['msg'] = '';
        }
        ?>
    </div>

    <table class="table_list">
        <tr>
            <th>Códgo Usuario</th>
            <th>Nome</th>
            <th>E-mail</th>

            <th colspan="2">Ações</th>
        </tr>
        <?php foreach ($lista as $iten) : ?>
            <tr>
                <td><?= $iten->getId(); ?></td>
                <td><?= $iten->getNome(); ?></td>
                <td><?= $iten->getEmail(); ?></td>
                <td><a href="update_user.php?id=<?= $iten->getId(); ?>">Editar</a></td>
                <td><a href="delete_usuario.php?id=<?= $iten->getId(); ?>">Deletar</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>
<?php
include 'footer.php';
?>