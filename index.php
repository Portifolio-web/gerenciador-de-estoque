
    <?php
    session_start();
    require_once 'config.php';
    require_once 'models/produtos.php';
    require_once 'dataAcessObject/ProdutosMysql.php';

    // instanciando o objeto usuarioDAO
    $produtos = new ProdutosMysql($pdo);
    $lista = $produtos->findAll();
    ?>

    <?php 
        require_once 'header.php';
        require_once 'menu_lateral.php';
    ?>
        <!-- home princiapal do sistema -->
        <section class="section-home">
            <h1>Homem do site</h1>
        </section>
    </div>                
</body>

</html>