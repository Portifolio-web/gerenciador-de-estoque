<?php
if(!isset($_SESSION['msg'])) session_start();
require_once 'config.php';
require_once 'models/Produtos.php';
require_once 'dataAcessObject/ProdutosMysql.php';

// instanciando o objeto usuarioDAO
$produtos = new ProdutosMysql($pdo);

$cod_produto = filter_input(INPUT_POST, 'cod_produto');
$nome = filter_input(INPUT_POST, 'nome');
$preco = filter_input(INPUT_POST, 'preco');
$estoque = filter_input(INPUT_POST, 'estoque', FILTER_SANITIZE_NUMBER_INT);
$minEstoque = filter_input(INPUT_POST, 'minEstoque', FILTER_SANITIZE_NUMBER_INT);

//se for setado alguma valor vindo do formulário, ele entra dentro do if, caso contrário ele manda preenchar os formulários.
if(isset($_POST['cod_produto']) && !empty($_POST['cod_produto'])) {
    //Usando a instância findByCod_produto, que faz uma consulta no banco se existe um produto com o mesmo código, caso retorne um produto com o códgo informado ele, retorna uma msg, produto cdastrado no sistema. se não retornar nenhum produto, ele entra dentro do if com o processo de cadastro usando o método CREATE do DAO da interface.
    if($produtos->findByCod_produto($cod_produto) === false ) {
        //Aqui é feita a adição dos itens em cada método modificadores de um objeto criado da classe Produto.
        $neWpro = new Produtos();

        $neWpro->setCod_produto($cod_produto);
        $neWpro->setNome($nome);
        $neWpro->setPreco($preco);
        $neWpro->setEstoque($estoque);
        $neWpro->setMinEstoque($minEstoque);

        $produtos->create($neWpro);

        $_SESSION['msg'] = "Produtos Cadastrados com Sucesso!";

        //quano a query anterio e executado corretamente, ele volta para a mesma página, com a mensagem Prodt. cadastrado com sucesso.
        header("Location: add_produto.php");
    } else {
        //se ele achar o produto com o mesmo código ele retorna a mensagem produto já cadastrado no sistema.
        $_SESSION['msg'] = "Produto já Cadastrado no Sistema!";
        header("Location: add_produto.php");
        exit;  
    }

}else {
    $_SESSION['msg'] = "Preenchar todos os Campos!";
    header("Location: add_produto.php");
    exit;
}