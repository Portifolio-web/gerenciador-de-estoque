<?php
session_start();
if(!isset($_SESSION['idUser'])) {
    header("Location: login.php");
}
 
require_once 'config.php';
require_once 'models/produtos.php';
require_once 'dataAcessObject/ProdutosMysql.php';
require_once 'models/Usuarios.php';


?>

<?php
require_once 'header.php';
require_once 'menu_lateral.php';

?>
<!-- home princiapal do sistema -->
<section class="home">
    <?php
    require_once 'home.php';
    ?>
</section>

<?php require_once 'footer.php' ?>