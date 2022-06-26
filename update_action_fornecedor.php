<?php
session_start();
require_once 'config.php';
require_once 'models/Fornecedor.php';
require_once 'dataAcessObject/dbFornecedor.php';

// instanciando o objeto usuarioDAO
$fornecedor = new dbFornecedor($pdo);

$id = filter_input(INPUT_POST, 'id');
$cod_fornecedor = filter_input(INPUT_POST, 'cod_fornecedor');
$razao_social = filter_input(INPUT_POST, 'razao_social');
$cnpj = filter_input(INPUT_POST, 'cnpj');
$email = filter_input(INPUT_POST, 'email');
$telefone = filter_input(INPUT_POST, 'telefone');
$cep = filter_input(INPUT_POST, 'cep');
$rua = filter_input(INPUT_POST, 'rua');
$numero = filter_input(INPUT_POST, 'numero');
$bairro = filter_input(INPUT_POST, 'bairro');
$cidade = filter_input(INPUT_POST, 'cidade');
$estado = filter_input(INPUT_POST, 'estado');


//se for setado alguma valor vindo do formulário, ele entra dentro do if, caso contrário ele manda preenchar os formulários.
if (isset($_POST['id']) && !empty($_POST['id']) && isset($_POST['cod_fornecedor']) && !empty($_POST['cod_fornecedor'])) {
    //Usando a instância findById, que faz uma consulta no banco se existe um produto com o mesmo código, caso retorne um produto com o códgo informado ele, retorna uma msg, produto cdastrado no sistema. se não retornar nenhum produto, ele entra dentro do if com o processo de cadastro usando o método CREATE do DAO da interface.
    //Aqui é feita a adição dos itens em cada método modificadores de um objeto criado da classe Produto.
    // $Fornecedor = $fornecedor->findById($id);
    $Fornecedor = new Fornecedor();
    $Fornecedor->setId($id);
    $Fornecedor->setCod_fornecedor($cod_fornecedor);
    $Fornecedor->setRazaoSocial($razao_social);
    $Fornecedor->SetCnpj($cnpj);
    $Fornecedor->setEmail($email);
    $Fornecedor->setTelefone($telefone);
    $Fornecedor->setCep($cep);
    $Fornecedor->setRua($rua);
    $Fornecedor->setNumero($numero);
    $Fornecedor->setBairro($bairro);
    $Fornecedor->setCidade($cidade);
    $Fornecedor->setEstado($estado);
                 
    $fornecedor->updateFornecedor($Fornecedor);

    $_SESSION['msg'] = "Fornecedor Atualizado com sucesso";

    //quano a query anterio e executado corretamente, ele volta para a mesma página, com a mensagem Prodt. cadastrado com sucesso.
    header("Location: fornecedores.php");
    exit;
} else {
    $_SESSION['msg'] = "Preenchar todos os Campos!";
    header("Location: up_fornecedor.php?id=" . "$id");
    exit;
}
