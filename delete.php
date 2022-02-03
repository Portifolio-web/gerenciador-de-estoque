<?php
session_start();

require_once 'config.php';
require_once 'dataAcessObject/ProdutosMysql.php';

$deletePro = new ProdutosMysql($pdo);

$id = filter_input(INPUT_GET, 'id');
// aqui o id do produtos vem via get na url será filtrado e guardado em uma variável $id.
if($id) {
    //Pegando o id quando o cliente clicar em deletar, esse id é instanciado pelo método delte, e mada la pra função delete da classe ProdutosMysql.
    
    $deletePro->delete($id);
    $_SESSION['msg'] = "Produtos Cadastrados com Sucesso!";
}
$_SESSION['msg'] = "Produto Deletado Com Sucesso";

// volta para a página Home.
header("Location: index.php");
exit;
