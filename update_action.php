<?php
require_once 'config.php';
require_once 'models/produtos.php';
require_once 'dao/ProdutosMysql.php';

// instanciando o objeto usuarioDAO
$updatePro = new ProdutosMysql($pdo);

$id = filter_input(INPUT_POST, 'id');
$cod_produto = filter_input(INPUT_POST, 'cod_produto');
$nome = filter_input(INPUT_POST, 'nome');
$preco = filter_input(INPUT_POST, 'preco');
$estoque = filter_input(INPUT_POST, 'estoque', FILTER_SANITIZE_NUMBER_INT);
$minEstoque = filter_input(INPUT_POST, 'minEstoque', FILTER_SANITIZE_NUMBER_INT);

if(isset($_POST['nome']) && !empty($_POST['nome'])) {

    // $updateItens = $updatePro->findById($id);
    $updateItens = new Produtos();
    $updateItens->setId($id);
    $updateItens->setCod_Produto($cod_produto);
    $updateItens->setNome($nome);
    $updateItens->setPreco($preco);
    $updateItens->setEstoque($estoque);
    $updateItens->setMinEstoque($minEstoque);

    $updatePro->update( $updateItens );

    header("Location: index.php");
    exit;

}else {
    header("Location: add_users.php");
    exit;
}