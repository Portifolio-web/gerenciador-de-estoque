<?php
if(!isset($_SESSION['msg'])) session_start();

require_once 'config.php';
require_once 'dataAcessObject/dbFornecedor.php';

$deleteFornecedor = new dbFornecedor($pdo);

$id = filter_input(INPUT_GET, 'id');
// aqui o id do produtos vem via get na url será filtrado e guardado em uma variável $id.
if($id) {
    //Pegando o id quando o cliente clicar em deletar, esse id é instanciado pelo método delete, e mada la pra função delete da classe dbUsuario.
    
    $deleteFornecedor->delete($id);
    $_SESSION['msg'] = "Fornecedor Excluido com Sucesso!";
    header("Location: fornecedores.php");
} else {
    $_SESSION['msg'] = "Fornecedor não Excluido !";
    // volta para a página Home.
    header("Location: fornecedores.php");
    exit;
}