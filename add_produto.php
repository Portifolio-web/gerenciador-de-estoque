<?php
session_start();
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
                <li class="icons2">Cadastrar Produtos</li>
            </ul>
        </header>
        <form class="form_user" action="add_product_action.php" method="post">
            <div class="form-primary">
                <fieldset>
                    <legend>Produtos</legend>
                    <div class="input-form">
                        <label>Códgo do Produto:</label>
                        <input type="number" name="cod_produto" id="cod_produto" placeholder="Cód Produto..">
                    </div>
                    <div class="input-form">
                        <label>Nome do Produto:</label>
                        <input type="text" name="nome" id="nome" placeholder="Nome Produto..">
                    </div>
                    <div class="input-form">
                        <label>Preço:</label>
                        <input type="text" name="preco" id="preco" placeholder="R$..">
                    </div>
                    <div class="input-form">
                        <label>Estoque:</label>
                        <input type="number" name="estoque" id="estoque" placeholder="Estoque..">
                    </div>
                    <div class="input-form">
                        <label>Estoque Min:</label>
                        <input type="number" name="minEstoque" id="minEstoque" placeholder="Estoque min..">
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