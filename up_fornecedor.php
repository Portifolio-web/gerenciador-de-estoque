<?php
session_start();
require_once 'config.php';
require_once 'models/Fornecedor.php';
require_once 'dataAcessObject/dbFornecedor.php';
require_once 'header.php';
require_once 'menu_lateral.php';

// instanciando o objeto usuarioDAO
$fornecedor = new dbFornecedor($pdo);

$infoFornecedor = false; //variável vai ter a informação do produto
$id = filter_input(INPUT_GET, 'id');

if ($id) {
    //Aqui é instanciado um valor do id se ele achar um id ele vai criar um objeto desse id caso contrário ele vai ser uma instância false.
    $infoFornecedor = $fornecedor->findById($id);
}
//Se a informação do id for falso, ele reencaminhar para o index.php do sistema, caso ele for verdadeiro ai ele mostra os fomulários ja preenchidos.
if ($infoFornecedor === false) {
    header('Location: fornecedores.php');
    exit;
}
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
    <div class="main-add-user">
        <header class="header">
            <ul>
                <li class="icons1"><i class="fa-solid fa-building-user"></i></li>
                <li class="icons2">Edidar Fornecedores</li>
            </ul>
        </header>

        <form class="form_user" action="update_action_fornecedor.php" method="post">
            <!-- campo oculto -->
            <input type="hidden" name="id" value="<?= $infoFornecedor->getId(); ?>">
            <div class="form-primary">
                <fieldset>
                    <legend>Dados</legend>
                    <div class="input-form">
                        <label>Codgo Fornecedor:</label>
                        <input type="number" name="cod_fornecedor" value="<?= $infoFornecedor->getCod_fornecedor(); ?>">
                    </div>
                    <div class="input-form">
                        <label>Razão Social:</label>
                        <input type="text" name="razao_social" value="<?= $infoFornecedor->getRazaoSocial(); ?>">
                    </div>
                    <div class="input-form">
                        <label>CNPJ:</label>
                        <input type="text" name="cnpj" value="<?= $infoFornecedor->getCnpj(); ?>">
                    </div>
                    <div class="input-form">
                        <label>E-mail:</label>
                        <input type="email" name="email" value="<?= $infoFornecedor->getEmail(); ?>">
                    </div>
                    <div class="input-form">
                        <label>Telefone:</label>
                        <input type="text" name="telefone" value="<?= $infoFornecedor->getTelefone(); ?>">
                    </div>
                </fieldset>
                <!-- Botao de adiconar formulários de endereço -->
                <div class="btn-add-endereco btnPlus">
                    <div><span>+</span>Editar Endereço</div>
                </div>

                <fieldset class="addClose ">
                    <legend>Endereços</legend>
                    <div class="input-form">
                        <label>Cep:</label>
                        <input type="text" name="cep" value="<?= $infoFornecedor->getCep()?>">
                    </div>
                    <div class="input-form">
                        <label>Rua:</label>
                        <input type="text" name="rua" value="<?= $infoFornecedor->getRua()?>">
                    </div>
                    <div class="input-form">
                        <label>Número:</label>
                        <input type="number" name="numero" value="<?= $infoFornecedor->getNumero()?>">
                    </div>
                    <div class="input-form">
                        <label>Bairro:</label>
                        <input type="text" name="bairro" value="<?= $infoFornecedor->getBairro()?>">
                    </div>
                    <div class="input-form">
                        <label>Cidade:</label>
                        <input type="text" name="cidade" value="<?= $infoFornecedor->getCidade()?>">
                    </div>
                    <div class="input-form">
                        <label>Estado:</label>
                        <input type="text" name="estado" value="<?= $infoFornecedor->getEstado()?>">
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