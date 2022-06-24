<?php
session_start();
require_once 'config.php';
require_once 'models/Usuarios.php';
require_once 'dataAcessObject/dbUsuario.php';

//instanciado o objeto usuario
$usuario = new DbUsuario($pdo);

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha');
$cep = filter_input(INPUT_POST, 'cep');
$rua = filter_input(INPUT_POST, 'rua');
$numero = filter_input(INPUT_POST, 'numero');
$bairro = filter_input(INPUT_POST, 'bairro');
$cidade = filter_input(INPUT_POST, 'cidade');
$estado = filter_input(INPUT_POST, 'estado');

//verificar se o nome foi setado
if (isset($_POST['email']) && !empty($_POST['email'])) {

    //verificando o nome informado não existir dentro do banco de dados
    if ($usuario->findByEmail($email) === false) {
        $newUser = new Usuarios();

        $newUser->setNome($nome);
        $newUser->setEmail($email);
        $newUser->setSenha($senha);
        $newUser->setCep($cep);
        $newUser->setRua($rua);
        $newUser->setNumero($numero);
        $newUser->setBairro($bairro);
        $newUser->setCidade($cidade);
        $newUser->setEstado($estado);

$usuario->createUser($newUser);

        $_SESSION['msg'] = "Usuário Cadastrados com Sucesso!";
        //quano a query anterio e executado corretamente, ele volta para a mesma página, com a mensagem Prodt. cadastrado com sucesso.
        header("Location: add_usuario.php");
    } else {
        //se ele achar o produto com o mesmo código ele retorna a mensagem produto já cadastrado no sistema.
        $_SESSION['msg'] = "Usuário já Cadastrado no Sistema!";
        header("Location: add_usuario.php");
        exit;
    }
} else {
    $_SESSION['msg'] = "Preenchar todos os Campos!";
    header("Location: add_usuario.php");
    // return $_SESSION();
    exit;
}
