<?php
session_start();
require_once 'config.php';
require_once 'models/produtos.php';
require_once 'dataAcessObject/ProdutosMysql.php';

// instanciando o objeto usuarioDAO
$updatePro = new ProdutosMysql($pdo);

$infoPro = false; //variável vai ter a informação do produto
$id = filter_input(INPUT_GET, 'id');

if ($id) {
    //Aqui é instanciado um valor do id se ele achar um id ele vai criar um objeto desse id caso contrário ele vai ser uma instância false.
    $infoPro = $updatePro->findById($id);
}
//Se a informação do id for falso, ele reencaminhar para o index.ph do sistema, caso ele for verdadeiro ai ele mostra os fomulários ja preenchidos.
if ($infoPro === false) {
    header("Location: update.php?id=" . "$id");
}
?>
<?php
require_once 'header.php';
require_once 'menu_lateral.php';
?>

<section class="section_form">
    <div class="alert">
        <?php
        echo "<p>" . $_SESSION['msg'] . "</p>";
        $_SESSION['alert'] = '';
        ?>
    </div>

    <div class="main-add-user">
        <header class="header">
            <ul>
                <li class="icons1"><i class='bx bxs-shopping-bags icon'></i></li>
                <li class="icons2">Editar Produtos</li>
            </ul>
        </header>

        <form class="form_user" action="update_action.php" method="post">
            <!-- campo oculto -->
            <input type="hidden" name="id" value="<?= $infoPro->getId(); ?>">
            <div class="form-primary">
                <fieldset>
                    <legend>Editar</legend>
                    <div class="input-form">
                        <label>Códgo do Produto:</label>
                        <input type="number" name="cod_produto" id="cod_produto" value="<?= $infoPro->getCod_Produto(); ?>">
                    </div>
                    <div class="input-form">
                        <label>Nome do Produto:</label>
                        <input type="text" name="nome" id="nome" value="<?= $infoPro->getNome(); ?>">
                    </div>
                    <div class="input-form">
                        <label>Preço:</label>
                        <input type="text" name="preco" id="preco" value="<?= $infoPro->getPreco(); ?>">
                    </div>
                    <div class="input-form">
                        <label>Estoque:</label>
                        <input type="number" name="estoque" id="estoque" value="<?= $infoPro->getEstoque(); ?>">
                    </div>
                    <div class="input-form">
                        <label>Estoque Min:</label>
                        <input type="number" name="minEstoque" id="minEstoque" value="<?= $infoPro->getMinEstoque(); ?>">
                    </div>
                </fieldset>

                <!-- Botão de enviar os dados dos formulários -->
                <div class="btn-send">
                    <input type="submit" value="Atualizar">
                </div>
            </div>

        </form>
    </div>
</section>
<?php
include 'footer.php';
?>