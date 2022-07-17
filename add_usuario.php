<?php
if(!isset($_SESSION['msg'])) session_start();
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
                <li class="icons1"><i class="fa-solid fa-user-plus"></i></li>
                <li class="icons2">Cadasto de Usuários</li>
            </ul>
        </header>

        <form class="form_user" action="add_user_action.php" method="post">
            <div class="form-primary">
                <fieldset>
                    <legend>Seus Dados</legend>
                    <div class="input-form">
                        <label>Nome:</label>
                        <input type="text" name="nome" id="nome" placeholder="Seu Nome..">
                    </div>
                    <div class="input-form">
                        <label>E-mail:</label>
                        <input type="email" name="email" id="email" placeholder="E-amil..">
                    </div>
                    <div class="input-form">
                        <label>Senha:</label>
                        <input type="password" name="senha" id="senha" placeholder="Senha..">
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
                        <input type="text" name="cep" id="cep" placeholder="Inforem o CEP..">
                    </div>
                    <div class="input-form">
                        <label>Rua:</label>
                        <input type="text" name="rua" id="rua" placeholder="rua..">
                    </div>
                    <div class="input-form">
                        <label>Número:</label>
                        <input type="number" name="numero" id="numero" placeholder="Número..">
                    </div>
                    <div class="input-form">
                        <label>Bairro:</label>
                        <input type="text" name="bairro" id="bairro" placeholder="Bairro..">
                    </div>
                    <div class="input-form">
                        <label>Cidade:</label>
                        <input type="text" name="cidade" id="cidade" placeholder="Cidade..">
                    </div>
                    <div class="input-form">
                        <label>Estado:</label>
                        <input type="text" name="estado" id="estado" placeholder="Estado..">
                    </div>
                </fieldset>

                <!-- Botão de enviar os dados dos formulários -->
                <div class="btn-send">
                    <input type="submit" value="Cadastar">
                </div>
            </div>
        </form>
    </div>
</section>

<?php
include 'footer.php';
?>