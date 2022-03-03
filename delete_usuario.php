<?php
session_start();

require_once 'config.php';
require_once 'dataAcessObject/dbUsuario.php';

$deleteUser = new DbUsuario($pdo);

$id = filter_input(INPUT_GET, 'id');
// aqui o id do produtos vem via get na url será filtrado e guardado em uma variável $id.
if($id) {
    //Pegando o id quando o cliente clicar em deletar, esse id é instanciado pelo método delete, e mada la pra função delete da classe dbUsuario.
    
    $deleteUser->delete($id);
    $_SESSION['msg'] = "Usuário Excluido com Sucesso!";
    header("Location: usuarios.php");
} else {
    $_SESSION['msg'] = "Usuário não Excluido !";
    // volta para a página Home.
    header("Location: usuarios.php");
    exit;
}