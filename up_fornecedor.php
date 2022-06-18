<?php
session_start();
require_once 'config.php';
require_once 'models/Fornecedor.php';
require_once 'dataAcessObject/dbFornecedor.php';
require_once 'header.php';
require_once 'menu_lateral.php';

// instanciando o objeto usuarioDAO
$upFornecedor = new dbFornecedor($pdo);

$infFornecedor = false; //variável vai ter a informação do produto
$id = filter_input(INPUT_GET, 'id');

if ($id) {
    //Aqui é instanciado um valor do id se ele achar um id ele vai criar um objeto desse id caso contrário ele vai ser uma instância false.
    $infFornecedor = $upFornecedor->findById($id);
}
//Se a informação do id for falso, ele reencaminhar para o index.ph do sistema, caso ele for verdadeiro ai ele mostra os fomulários ja preenchidos.
if ($infFornecedor === false) {
    header("Location: index.php");
}
?>

<section class="section_main">
    <h3>Editar Fornecedor</h3>

    <form class="form_user" action="update_action_fornecedor.php" method="post">
        <!-- campo oculto -->
        <input type="hidden" name="id" value="<?= $infFornecedor->getId(); ?>">

        <div class="inputBox">
            <label id="nome" class="labelIput">Códgo Forcedor:</label>
            <input type="number" name="cod_fornecedor" id="cod_fornecedor" class="iputUser" value="<?= $infFornecedor->getCod_fornecedor(); ?>">
        </div>

        <div class="inputBox">
            <label id="nome" class="labelIput">Nome:</label>
            <input type="text" name="nome" id="nome" class="iputUser" value="<?= $infFornecedor->getNome(); ?>">
        </div>

        <div class="inputBox">
            <label id="email" class="labelIput">Email:</label>
            <input type="email" name="email" id="email" class="iputUser" value="<?= $infFornecedor->getEmail(); ?>">
        </div>

        <div class="inputBox">
            <label id="telefone" class="labelIput">Telefone:</label>
            <input type="text" name="telefone" id="telefone" class="iputUser" value="<?= $infFornecedor->getTelefone(); ?>">
        </div>

        <div class="inputBox">
            <label id="cnpj" class="labelIput">CNPJ/CPF:</label>
            <br />
            <input type="text" name="cnpj" id="cnpj" class="iputUser" value="<?= $infFornecedor->getCnpj(); ?>">
        </div>
        <h3>Endereço:</h3>
        <div class="inputBox">
            <label id="cidade" class="labelIput">Cidade:</label>
            <input type="text" name="cidade" id="cidade" class="iputUser" value="<?= $infFornecedor->getCidade(); ?>">
        </div>

        <div class="inputBox">
            <label id="estado" class="labelIput">Estado:</label>
            <input type="text" name="estado" id="estado" class="iputUser" value="<?= $infFornecedor->getEstado(); ?>">
        </div>
        <div class="inputBox">
            <label id="rua" class="labelIput">Rua:</label>
            <input type="text" name="rua" id="rua" class="iputUser" value="<?= $infFornecedor->getRua(); ?>">
        </div>
        <div class="inputBox">
            <label id="cep" class="labelIput">CEP:</label>
            <input type="number" name="cep" id="cep" class="iputUser" value="<?= $infFornecedor->getCep(); ?>">
        </div>
        <br>
        <input class="iputButton" type="submit" name="submit" value="Cadastrar " id="submit">
</section>
<?php
include 'footer.php';
?>