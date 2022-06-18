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

<section class="section_main">

    <h3>Editar Produto</h3>

    <form class="form_user" action="update_action.php" method="post">
        <!-- campo oculto -->
        <input type="hidden" name="id" value="<?= $infoPro->getId(); ?>">

        <div class="inputBox">
            <label id="nome" class="labelIput">Códgo do Produto:</label>
            <input type="number" name="cod_produto" id="cod_produto" class="iputUser" value="<?= $infoPro->getCod_Produto(); ?>">
        </div>

        <div class="inputBox">
            <label id="nome" class="labelIput">Atualizar Nome do Produto:</label>
            <input type="text" name="nome" id="nome" class="iputUser" value="<?= $infoPro->getNome(); ?>">
        </div>

        <div class="inputBox">
            <label id="preco" class="labelIput">Atualizar Preço:</label>
            <br />
            <input type="text" name="preco" id="preco" class="iputUser" value="<?= $infoPro->getPreco(); ?>">
        </div>

        <div class="inputBox">
            <label id="estoque" class="labelIput">Atualizar Estoque:</label>
            <input type="text" name="estoque" id="estoque" class="iputUser" value="<?= $infoPro->getEstoque(); ?>">
        </div>

        <div class="inputBox">
            <label id="minEstoque" class="labelIput">Atualizar Estoque Mínimo:</label>
            <input type="text" name="minEstoque" id="minEstoque" class="iputUser" value="<?= $infoPro->getMinEstoque(); ?>">
        </div>

        <div class="inputBox">
            <label id="id_fornecedor" class="labelIput">ID Fornecedor:</label>
            <input type="text" name="id_fornecedor" id="id_fornecedor" class="iputUser" value="<?= $infoPro->getId_fornecedor(); ?>">
        </div>
        <br>
        <input class="iputButton" type="submit" name="submit" id="submit" value="Atualizar">
</section>
<?php
include 'footer.php';
?>