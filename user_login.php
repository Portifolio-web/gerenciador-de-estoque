<?php
session_start();


require_once 'config.php';
require_once 'models/Usuarios.php';
require_once 'dataAcessObject/dbUsuario.php';

//instanciado o objeto usuario
$u = new DbUsuario($pdo);

//verificar se o email e senha foi setado
if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])) {

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha');

    // $u->login($email, $senha);

    if ($u->login($email, $senha) == true) {
        // echo($email);
        if (isset($_SESSION['idUser'])) {
            header("Location: index.php");
        }
    } else {
        $_SESSION['msg'] = "Senha/Usuário Inválido!";
        header("Location: login.php");
    }
} else {
    $_SESSION['msg'] = "Preencha o formulário!";
    header("Location: login.php");
}
