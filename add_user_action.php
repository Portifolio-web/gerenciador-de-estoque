<?php
session_start();
require_once 'config.php';
require_once 'dataAcessObject/dbUsuario.php';

//instanciado o objeto usuario
$usuario = new DbUsuario($pdo);

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha');

//verificar se o nome foi setado
if(isset($_POST['email']) && !empty($_POST['email'])) {

    //verificando o nome informado não existir dentro do banco de dados
    if($usuario->findByEmail($email) === false ){
        $newUser = new Usuarios();

        $newUser->setNome($nome);
        $newUser->setEmail($email);
        $newUser->setSenha($senha);

        $usuario->createUser( $newUser );
        
        $_SESSION['alert'] = "Usuário Cadastrados com Sucesso!";
        //quano a query anterio e executado corretamente, ele volta para a mesma página, com a mensagem Prodt. cadastrado com sucesso.
        header("Location: add_user.php");
    } else {
    //se ele achar o produto com o mesmo código ele retorna a mensagem produto já cadastrado no sistema.
    $_SESSION['alert'] = "Usuário já Cadastrado no Sistema!";
    header("Location: add_user.php");
    exit; 
    }

} else {
    $_SESSION['alert'] = "Preenchar todos os Campos!";
    header("Location: add_user.php");
    exit;
}