<?php
if(!isset($_SESSION)) {
    session_start();
}


require_once 'config.php';
require_once 'models/Usuarios.php';
require_once 'dataAcessObject/dbUsuario.php';

//instanciado o objeto usuario
$u = new DbUsuario($pdo);

//verificar se o nome foi setado
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
        header("Location: login.php");
    }
} else {
    header("Location: login.php");
}
