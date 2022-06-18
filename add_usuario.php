<?php
if (!isset($_SESSION)) session_start();
require_once 'header.php';
require_once 'menu_lateral.php';
?>

<section class="section_main">

    <div class="alert">
        <?php

        echo "<p>" . $_SESSION['msg'] . "</p>";
        $_SESSION['alert'] = '';

        ?>
    </div>
    <h3>Cadastro de Usuário.</h3>

    <form class="form_user" action="add_user_action.php" method="post">

        <div class="inputBox">
            <label id="nome" class="labelIput">Nome:</label>
            <input type="text" name="nome" id="nome" class="iputUser">
        </div>

        <div class="inputBox">
            <label id="email" class="labelIput">E-mail:</label>
            <input type="email" name="email" id="email" class="iputUser">
        </div>

        <div class="inputBox">
            <label id="senha" class="labelIput">Senha:</label>
            <br />
            <input type="password" name="senha" id="senha" class="iputUser">
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