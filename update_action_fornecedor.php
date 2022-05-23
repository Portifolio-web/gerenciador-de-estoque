<?php
// session_start();
require_once 'config.php';
require_once 'models/Fornecedor.php';
require_once 'dataAcessObject/dbFornecedor.php';

// instanciando o objeto usuarioDAO
$fornecedor = new dbFornecedor($pdo);

$id = filter_input(INPUT_POST, 'id');
$cod_fornecedor = filter_input(INPUT_POST, 'cod_fornecedor');
$cnpj = filter_input(INPUT_POST, 'cnpj');
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email');
$telefone = filter_input(INPUT_POST, 'telefone');
$cidade = filter_input(INPUT_POST, 'cidade');
$estado = filter_input(INPUT_POST, 'estado');
$rua = filter_input(INPUT_POST, 'rua');
$cep = filter_input(INPUT_POST, 'cep');


//se for setado alguma valor vindo do formulário, ele entra dentro do if, caso contrário ele manda preenchar os formulários.
if (isset($_POST['id']) && !empty($_POST['id'])) {
    //Usando a instância findById, que faz uma consulta no banco se existe um produto com o mesmo código, caso retorne um produto com o códgo informado ele, retorna uma msg, produto cdastrado no sistema. se não retornar nenhum produto, ele entra dentro do if com o processo de cadastro usando o método CREATE do DAO da interface.
    //Aqui é feita a adição dos itens em cada método modificadores de um objeto criado da classe Produto.
    $newFornec = new Fornecedor();
    
    $newFornec->setId($id);
    $newFornec->setCod_fornecedor($cod_fornecedor);
    $newFornec->SetCnpj($cnpj);
    $newFornec->setNome($nome);
    $newFornec->setEmail($email);
    $newFornec->setTelefone($telefone);
    $newFornec->setCidade($cidade);
    $newFornec->setEstado($estado);
    $newFornec->setRua($rua);
    $newFornec->setCep($cep);
                 
    $fornecedor->updateFornecedor($newFornec);

    //$_SESSION['alert'] = "Usuários Atualizado com sucesso";

    //quano a query anterio e executado corretamente, ele volta para a mesma página, com a mensagem Prodt. cadastrado com sucesso.
    header("Location: fornecedores.php");
} else {
    //$_SESSION['alert'] = "Preenchar todos os Campos!";
    header("Location: up_fornecedor.php?id=" . "$id");
    exit;
}
