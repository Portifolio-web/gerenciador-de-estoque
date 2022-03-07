
    <?php
    session_start();
    require_once 'config.php';
    require_once 'models/Fornecedor.php';
    require_once 'dataAcessObject/dbFornecedor.php';

    // instanciando o objeto usuarioDAO
    $fornecedores = new dbFornecedor($pdo);
    $lista = $fornecedores->findAll();
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
                    <th>Cód Forncedor</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>CNP/CPF</th>

                    <th colspan="2">Ações</th>
                </tr>
                <?php foreach ($lista as $iten) : ?>
                    <tr>
                        <td><?= $iten->getCod_fornecedor(); ?></td>
                        <td><?= $iten->getNome(); ?></td>
                        <td><?= $iten->getTelefone(); ?></td>
                        <td><?= $iten->getEmail(); ?></td>
                        <td><?= $iten->getCnpj(); ?></td>
                        <td><a href="up_fornecedor.php?id=<?= $iten->getId(); ?>">Editar</a></td>
                        <td><a href="del_fornecedor.php?id=<?= $iten->getId(); ?>">Deletar</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </section>
    </div>                
<?php
   include 'footer.php';
?>