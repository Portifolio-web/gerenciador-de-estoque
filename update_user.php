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
//Se a informação do id for falso, ele reencaminhar para o index.php do sistema, caso ele for verdadeiro ai ele mostra os fomulários ja preenchidos.
if ($infoUser === false) {
    header("Location: index.php");
}
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
                <li class="icons1"><i class="fa-solid fa-user-pen"></i></li>
                <li class="icons2">Editar Usuários</li>
            </ul>
        </header>

        <form class="form_user" action="update_action_user.php" method="post">
            <!-- campo oculto -->
            <input type="hidden" name="id" value="<?= $infoUser->getId(); ?>">
            <div class="form-primary">
                <fieldset>
                    <legend>Seus Dados</legend>
                    <div class="input-form">
                        <label>Nome:</label>
                        <input type="text" name="nome" value="<?= $infoUser->getNome(); ?>">
                    </div>
                    <div class="input-form">
                        <label>E-mail:</label>
                        <input type="email" name="email" value="<?= $infoUser->getEmail(); ?>">
                    </div>
                    <div class="input-form">
                        <label>Senha:</label>
                        <input type="password" name="senha" value="<?= $infoUser->getSenha(); ?>">
                    </div>
                </fieldset>
                <!-- Botao de adiconar formulários de endereço -->
                <div class="btn-add-endereco">
                    <button><span>+</span>Adicionar Endereço</button>
                </div>
                <!-- Cadastros de Endereços -->
                <fieldset>
                    <legend>Endereços</legend>
                    <div class="input-form">
                        <label>Cep:</label>
                        <input type="text" name="cep" value="<?= $infoUser->getCep(); ?>">
                    </div>
                    <div class="input-form">
                        <label>Rua:</label>
                        <input type="text" name="rua" value="<?= $infoUser->getRua(); ?>">
                    </div>
                    <div class="input-form">
                        <label>Número:</label>
                        <input type="number" name="numero" value="<?= $infoUser->getNumero(); ?>">
                    </div>
                    <div class="input-form">
                        <label>Bairro:</label>
                        <input type="text" name="bairro" value="<?= $infoUser->getBairro(); ?>">
                    </div>
                    <div class="input-form">
                        <label>Cidade:</label>
                        <input type="text" name="cidade" value="<?= $infoUser->getCidade(); ?>">
                    </div>
                    <div class="input-form">
                        <label>Estado:</label>
                        <input type="text" name="estado" value="<?= $infoUser->getEstado(); ?>">
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