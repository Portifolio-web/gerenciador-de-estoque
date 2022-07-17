<?php
if(!isset($_SESSION['msg'])) session_start();
require_once 'config.php';
require_once 'models/Fornecedor.php';
require_once 'dataAcessObject/dbFornecedor.php';
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
    <div class="main-add-user">
        <header class="header">
            <ul>
                <li class="icons1"><i class="fa-solid fa-building-user"></i></li>
                <li class="icons2">Cadastrar Fornecedores</li>
            </ul>
        </header>

        <form class="form_user" action="add_fornecedor_action.php" method="post">
            <div class="form-primary">
                <fieldset>
                    <legend>Dados</legend>
                    <div class="input-form">
                        <label>Codgo Fornecedor:</label>
                        <input type="number" name="cod_fornecedor" placeholder="Codgo..">
                    </div>
                    <div class="input-form">
                        <label>Razão Social:</label>
                        <input type="text" name="razao_social" placeholder="Razão Social..">
                    </div>
                    <div class="input-form">
                        <label>CNPJ:</label>
                        <input type="text" name="cnpj" placeholder="Cnpj/CPF..">
                    </div>
                    <div class="input-form">
                        <label>E-mail:</label>
                        <input type="email" name="email" placeholder="E-amil..">
                    </div>
                    <div class="input-form">
                        <label>Telefone:</label>
                        <input type="text" name="telefone" placeholder="Telefone..">
                    </div>
                </fieldset>
                <!-- Botao de adiconar formulários de endereço -->
                <div class="btn-add-endereco btnPlus">
                    <div><span>+</span>Adicionar Endereço</div>
                </div>

                <fieldset class="addClose ">
                    <legend>Endereços</legend>
                    <div class="input-form">
                        <label>Cep:</label>
                        <input type="text" name="cep" placeholder="Inforem o CEP..">
                    </div>
                    <div class="input-form">
                        <label>Rua:</label>
                        <input type="text" name="rua" placeholder="Rua..">
                    </div>
                    <div class="input-form">
                        <label>Número:</label>
                        <input type="number" name="numero" placeholder="Número..">
                    </div>
                    <div class="input-form">
                        <label>Bairro:</label>
                        <input type="text" name="bairro" placeholder="Bairro..">
                    </div>
                    <div class="input-form">
                        <label>Cidade:</label>
                        <input type="text" name="cidade" placeholder="Cidade..">
                    </div>
                    <div class="input-form">
                        <label>Estado:</label>
                        <input type="text" name="estado" placeholder="Estado..">
                    </div>
                </fieldset>
                <!-- Botão de enviar os dados dos formulários -->
                <div class="btn-send">
                    <input type="submit" value="Cadastrar">
                </div>
            </div>
        </form>
    </div>
</section>

<?php
include 'footer.php';
?>