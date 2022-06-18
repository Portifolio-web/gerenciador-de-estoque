<?php
if (!isset($_SESSION['msg'])) session_start();
?>
<?php
require_once 'header.php';
require_once 'menu_lateral.php';
?>

<section class="section_main">

    <div class="alert">
        <?php

        echo "<p>" . $_SESSION['msg'] . "</p>";
        $_SESSION['msg'] = '';

        ?>
    </div>
    <h3>Cadastre seu Produto Aqui.</h3>

    <form class="form_user" action="add_product_action.php" method="post">
        <div class="inputBox">
            <label id="nome" class="labelIput">Códgo do Produto:</label>
            <input type="number" name="cod_produto" id="cod_produto" class="iputUser">
        </div>

        <div class="inputBox">
            <label id="nome" class="labelIput">Nome do Produto:</label>
            <input type="text" name="nome" id="nome" class="iputUser">
        </div>

        <div class="inputBox">
            <label id="preco" class="labelIput">Preço:</label>
            <br />
            <input type="text" name="preco" id="preco" class="iputUser">
        </div>

        <div class="inputBox">
            <label id="estoque" class="labelIput">Estoque:</label>
            <input type="number" name="estoque" id="estoque" class="iputUser">
        </div>

        <div class="inputBox">
            <label id="minEstoque" class="labelIput">Estoque Mínimo:</label>
            <input type="number" name="minEstoque" id="minEstoque" class="iputUser">
        </div>
        <br>
        <input class="iputButton" type="submit" name="submit" value="Cadastrar " id="submit">
</section>

<?php
include 'footer.php';
?>