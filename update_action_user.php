<?php
session_start();
require_once 'config.php';
require_once 'models/Usuarios.php';
require_once 'dataAcessObject/dbUsuario.php';

// instanciando o objeto usuarioDAO
$user = new DbUsuario($pdo);

$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha');
$cep = filter_input(INPUT_POST, 'cep');
$rua = filter_input(INPUT_POST, 'rua');
$numero = filter_input(INPUT_POST, 'numero');
$bairro = filter_input(INPUT_POST, 'bairro');
$cidade = filter_input(INPUT_POST, 'cidade');
$estado = filter_input(INPUT_POST, 'estado');

//se for setado alguma valor vindo do formulário, ele entra dentro do if, caso contrário ele manda preenchar os formulários.
if (isset($_POST['id']) && !empty($_POST['id'])) {
    //Usando a instância findById, que faz uma consulta no banco se existe um produto com o mesmo código, caso retorne um produto com o códgo informado ele, retorna uma msg, produto cdastrado no sistema. se não retornar nenhum produto, ele entra dentro do if com o processo de cadastro usando o método CREATE do DAO da interface.
    //Aqui é feita a adição dos itens em cada método modificadores de um objeto criado da classe Produto.
    $NewUser = new Usuarios();
    $NewUser->setId($id);
    $NewUser->setNome($nome);
    $NewUser->setEmail($email);
    $NewUser->setSenha($senha);
    $NewUser->setCep($cep);
    $NewUser->setRua($rua);
    $NewUser->setNumero($numero);
    $NewUser->setBairro($bairro);
    $NewUser->setCidade($cidade);
    $NewUser->setEstado($estado);

    $user->updateUser($NewUser);

    //quano a query anterio e executado corretamente, ele volta para a mesma página, com a mensagem Prodt. cadastrado com sucesso.
    $_SESSION['msg'] = "Usuário atualizado com Sucesso!";
    header("Location: usuarios.php");
} else {
    $_SESSION['msg'] = "Preenchar todos os Campos!";
    header("Location: update_user.php?id=" . "$id");
    exit;
}
