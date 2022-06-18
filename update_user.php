<?php
session_start();
require_once 'config.php';
require_once 'models/Usuarios.php';
require_once 'dataAcessObject/dbUsuario.php';
require_once 'header.php';
require_once 'menu_lateral.php';

// instanciando o objeto usuarioDAO
$updateUser = new DbUsuario($pdo);

$infoUser = false; //variável vai ter a informação do produto
$id = filter_input(INPUT_GET, 'id');

if ($id) {
    //Aqui é instanciado um valor do id se ele achar um id ele vai criar um objeto desse id caso contrário ele vai ser uma instância false.
    $infoUser = $updateUser->findById($id);
}
//Se a informação do id for falso, ele reencaminhar para o index.ph do sistema, caso ele for verdadeiro ai ele mostra os fomulários ja preenchidos.
if ($infoUser === false) {
    header("Location: index.php");
}
?>

<section class="section_main">
    <h3>Editar Usuários</h3>

    <form class="form_user" action="update_action_user.php" method="post">
        <!-- campo oculto -->
        <input type="hidden" name="id" value="<?= $infoUser->getId(); ?>">

        <div class="inputBox">
            <label id="nome" class="labelIput">Editar Nome:</label>
            <input type="text" name="nome" id="nome" class="iputUser" value="<?= $infoUser->getNome(); ?>">
        </div>

        <div class="inputBox">
            <label id="nome" class="labelIput">Editar E-mail:</label>
            <input type="email" name="email" id="email" class="iputUser" value="<?= $infoUser->getEmail(); ?>">
        </div>

        <div class="inputBox">
            <label id="preco" class="labelIput">Editar Senha:</label>
            <br />
            <input type="password" name="senha" id="senha" class="iputUser" value="<?= $infoUser->getSenha(); ?>">
        </div>
        <br>
        <h3>Endereço:</h3>
        <div class="inputBox">
            <label id="cidade" class="labelIput">Cidade:</label>
            <input type="text" name="cidade" id="cidade" class="iputUser" value="<?= $infoUser->getCidade(); ?>">
        </div>

        <div class="inputBox">
            <label id="estado" class="labelIput">Estado:</label>
            <input type="text" name="estado" id="estado" class="iputUser" value="<?= $infoUser->getEstado(); ?>">
        </div>
        <div class="inputBox">
            <label id="rua" class="labelIput">Rua:</label>
            <input type="text" name="rua" id="rua" class="iputUser" value="<?= $infoUser->getRua(); ?>">
        </div>
        <div class="inputBox">
            <label id="cep" class="labelIput">CEP:</label>
            <input type="number" name="cep" id="cep" class="iputUser" value="<?= $infoUser->getCep(); ?>">
        </div>
        <br>
        <input class="iputButton" type="submit" name="submit" id="submit" value="Atualizar">
</section>
<?php
include 'footer.php';
?>