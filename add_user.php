
    <h1>Página de Cadastro</h1>
    <div class="alert">
        <?php
        if ($_SESSION['alert'] != '') {
            echo "<p>" . $_SESSION['alert'] . "</p>";
            $_SESSION['alert'] = '';
        } else if ($_SESSION['alert'] != '') {
            echo "<p>" . $_SESSION['alert'] . "</p>";
            $_SESSION['alert'] = '';
        } else {
            echo "<p>" . $_SESSION['alert'] . "</p>";
            $_SESSION['alert'] = '';
        }
        ?>
    </div>
    <section class="section_main">
        <h3>Cadastre um usuário aqui.</h3>

        <form class="form_user" action="add_user_action.php" method="post">

            <div class="inputBox">
                <label id="nome" class="labelIput">Nome do Usário:</label>
                <input type="text" name="nome" id="nome" class="iputUser">
            </div>

            <div class="inputBox">
                <label id="preco" class="labelIput">E-mail:</label>
                <br />
                <input type="email" name="email" id="email" class="iputUser">
            </div>

            <div class="inputBox">
                <label id="estoque" class="labelIput">Senha:</label>
                <input type="password" name="senha" id="senha" class="iputUser">
            </div>
            <br>
            <input class="iputButton" type="submit" name="submit" id="submit">
            <div class="btn-index"><a href="index.php">Voltar Home</a></div>
    </section>

<?php
    include 'footer.php';
?>
