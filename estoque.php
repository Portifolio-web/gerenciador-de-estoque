<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css" integrity="sha384-3B6NwesSXE7YJlcLI9RpRqGf2p/EgVH8BgoKTaUrmKNDkHPStTQ3EyoYjCGXaOTS" crossorigin="anonymous">
    <title>Sistema de Estoque</title>
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

    <!-- seção de header do sistema -->
    <?php 
        require_once 'header.php';
        require_once 'menu_lateral.php';
    ?>
    
        <section class="section_table">
            <div class="alert">
                <?php
                if (isset($_SESSION['msg']) && !empty($_SESSION['msg'])) {
                    echo "<p>" . $_SESSION['msg'] . "</p>";
                    $_SESSION['msg'] = '';
                }
                ?>
            </div>
            
            <table class="table_list">
                <tr>
                    <th>Códgo</th>
                    <th>Nome</th>
                    <th>Preços</th>
                    <th>Estoque</th>
                    <th>Estoque Mín</th>
                    <th colspan="2">Ações</th>
                </tr>
                <?php foreach ($lista as $iten) : ?>
                    <tr>
                        <td><?= $iten->getCod_Produto(); ?></td>
                        <td><?= $iten->getNome(); ?></td>
                        <td>R$ <?= $iten->getPreco(); ?></td>
                        <td><?= $iten->getEstoque(); ?></td>
                        <td><?= $iten->getMinEstoque(); ?></td>
                        <td><a href="update.php?id=<?= $iten->getId(); ?>">Editar</a></td>
                        <td><a href="delete.php?id=<?= $iten->getId(); ?>">Deletar</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </section>
    </div>                
</body>

</html>