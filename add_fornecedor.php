<?php
session_start();
// require_once 'config.php';
// require_once 'models/Usuarios.php';
// require_once 'dataAcessObject/dbUsario.php';
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
    <h3>Cadastre Um Fornecedor Aqui.</h3>

    <form class="form_user" action="add_fornecedor_action.php" method="post">
        <div class="inputBox">
            <label id="nome" class="labelIput">Códgo Forcedor:</label>
            <input type="number" name="cod_fornecedor" id="cod_fornecedor" class="iputUser">
        </div>

        <div class="inputBox">
            <label id="nome" class="labelIput">Nome:</label>
            <input type="text" name="nome" id="nome" class="iputUser">
        </div>

        <div class="inputBox">
            <label id="email" class="labelIput">Email:</label>
            <input type="email" name="email" id="email" class="iputUser">
        </div>

        <div class="inputBox">
            <label id="telefone" class="labelIput">Telefone:</label>
            <input type="text" name="telefone" id="telefone" class="iputUser">
        </div>

        <div class="inputBox">
            <label id="cnpj" class="labelIput">CNPJ/CPF:</label>
            <br />
            <input type="text" name="cnpj" id="cnpj" class="iputUser">
        </div>
        <h3>Endereço:</h3>
        <div class="inputBox">
            <label id="cidade" class="labelIput">Cidade:</label>
            <input type="text" name="cidade" id="cidade" class="iputUser">
        </div>

        <div class="inputBox">
            <label id="estado" class="labelIput">Estado:</label>
            <input type="text" name="estado" id="estado" class="iputUser">
        </div>
        <div class="inputBox">
            <label id="rua" class="labelIput">Rua:</label>
            <input type="text" name="rua" id="rua" class="iputUser">
        </div>
        <div class="inputBox">
            <label id="cep" class="labelIput">CEP:</label>
            <input type="number" name="cep" id="cep" class="iputUser">
        </div>
        <br>
        <input class="iputButton" type="submit" name="submit" value="Cadastrar " id="submit">
</section>

<?php
include 'footer.php';
?>