<?php 
session_start();
?>
    <?php 
        require_once 'header.php';
        require_once 'menu_lateral.php';
    ?>
    
    <section class="section_add_product">
    
        <div class="alert">
            <?php 
                if($_SESSION['alert'] != '') {
                    echo "<p>".$_SESSION['alert']."</p>";
                    $_SESSION['alert']='';
                }else if($_SESSION['alert'] != '') {
                    echo "<p>".$_SESSION['alert']."</p>";
                    $_SESSION['alert']='';
                }else {
                    echo "<p>".$_SESSION['alert']."</p>";
                    $_SESSION['alert']=''; 
                }
            ?>
        </div> 
        <h3>Cadastre Um Forcedor Aqui.</h3>

        <form class="form_user" action="add_product_action.php" method="post">
            <div class="inputBox">
                <label id="nome" class="labelIput">Códgo Forcedor:</label>
                <input type="number" name="cod_produto" id="cod_produto" class="iputUser" >
            </div>

            <div class="inputBox">
                <label id="nome" class="labelIput">Nome:</label>
                <input type="text" name="nome" id="nome" class="iputUser">
            </div>

            <div class="inputBox">
                <label id="preco" class="labelIput">CNPJ/CPF:</label>
                <br/>
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
            <input class="iputButton" type="submit" name="submit" value= "Cadastrar "id ="submit">
    </section> 
      
<?php
    include 'footer.php';
?>