<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css" integrity="sha384-3B6NwesSXE7YJlcLI9RpRqGf2p/EgVH8BgoKTaUrmKNDkHPStTQ3EyoYjCGXaOTS" crossorigin="anonymous">
    <title>Área do Cliente</title>
</head>

<body>
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