
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
                    <th>Códgo Forncedor</th>
                    <th>Nome</th>
                    <th>CNP/CPF</th>

                    <th colspan="2">Ações</th>
                </tr>
                <?php foreach ($lista as $iten) : ?>
                    <tr>
                        <td><?= $iten->getCod_Produto(); ?></td>
                        <td><?= $iten->getNome(); ?></td>
                        <td>R$ <?= $iten->getPreco(); ?></td>
                        <td><a href="update.php?id=<?= $iten->getId(); ?>">Editar</a></td>
                        <td><a href="delete.php?id=<?= $iten->getId(); ?>">Deletar</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </section>
    </div>                
<?php
   include 'footer.php';
?>