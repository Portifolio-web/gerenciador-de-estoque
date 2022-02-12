<?php
require_once 'config.php';
require_once 'models/produtos.php';
require_once 'dataAcessObject/ProdutosMysql.php';

// instanciando o objeto usuarioDAO
$updatePro = new ProdutosMysql($pdo);

$id = filter_input(INPUT_POST, 'id');
$cod_produto = filter_input(INPUT_POST, 'cod_produto');
$nome = filter_input(INPUT_POST, 'nome');
$preco = filter_input(INPUT_POST, 'preco');
$estoque = filter_input(INPUT_POST, 'estoque', FILTER_SANITIZE_NUMBER_INT);
$minEstoque = filter_input(INPUT_POST, 'minEstoque', FILTER_SANITIZE_NUMBER_INT);

if (isset($_POST['nome']) && !empty($_POST['nome'])) {
    //Essa funcionalidade é quando pegamos o objeto $updatePro que é criado da classe Produtos, com esse criado pegamos as informações modificadas que vem direto do formulário de ipdate.
    // $updateItens = $updatePro->findById($id);
    $updateItens = new Produtos();
    $updateItens->setId($id);
    $updateItens->setCod_Produto($cod_produto);
    $updateItens->setNome($nome);
    $updateItens->setPreco($preco);
    $updateItens->setEstoque($estoque);
    $updateItens->setMinEstoque($minEstoque);

    //depois que montamos os objeto modificado que veio dos formulário, instaciamos esses objetos na variável $updatePro com o método upate, onde nesse método é feito a atualização dentro da tabela no meu BD. 
    $updatePro->update($updateItens);

    header("Location: index.php");
    exit;
} else {
    header("Location: add_users.php?id=" . "$id");
    exit;
}
