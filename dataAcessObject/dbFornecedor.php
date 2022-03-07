<?php
// require_once 'models/Usuarios.php';
require_once 'models/interFornecedor.php';

class dbFornecedor implements InterFornecedor {
    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function createUser(Fornecedor $f) {
        
        $sql = $this->pdo->prepare("INSERT INTO fornecedor (cod_fornecedor, nome, email, telefone, cidade, estado, rua, cep) VALUES (:cod_fornecedor, :nome, :email, :telefone, :cidade, :estado, :rua, :cep )");
        
        $sql->bindValue(':cod_fornecedor', $f->getCod_fornecedor());
        $sql->bindValue(':cnpl', $f->getCnpj());
        $sql->bindValue(':nome', $f->getNome());
        $sql->bindValue(':email', $f->getEmail());
        $sql->bindValue(':telefone', $f->getTelefone());
        $sql->bindValue(':cidade', $f->getCidade());
        $sql->bindValue(':estado', $f->getEstado());
        $sql->bindValue(':rua', $f->getRua());
        $sql->bindValue(':cep', $f->getCep());
        $sql->execute();

        $f->setId($this->pdo->lastInsertId() );

        return $f;
    }

    public function findAll(){
        $array = [];

        // fazendo a consulta de fornecedor no banco de dados
        $sql = $this->pdo->query("SELECT * FROM fornecedor");
        if($sql->rowCount() > 0){
            // aqui esta os itens da tabela do bd
            $lista = $sql->fetchAll();
            //Aqui vai ser transformados esses dados em objetos
            foreach($lista as $itens) {
                $f = new Fornecedor();
                $f->setId($itens['id']);
                $f->setCod_fornecedor($itens['cod_fornecedor']);
                $f->SetCnpj($itens['cnpj']);
                $f->setNome($itens['nome']);
                $f->setEmail($itens['email']);
                $f->setTelefone($itens['telefone']);
                $f->setCidade($itens['cidade']);
                $f->setEstado($itens['estado']);
                $f->setRua($itens['rua']);
                $f->setCep($itens['cep']);
                // esses objetos é armazenado dentro de um array
                $array[] = $f;
            }
        }

        return $array;
    }

    public function findById($id){
        $sql_user = $this->pdo->prepare("SELECT * FROM fornecedor WHERE id = :id");
        $sql_user->bindValue(':id', $id);
        $sql_user->execute();
        //vericação se encontra alguma valor da query consultadoa
        if($sql_user->rowCount() > 0){
            $dados = $sql_user->fetch();

            $f = new Fornecedor();
            $f->setId($dados['id']);
            $f->setNome($dados['nome']);
            $f->setEmail($dados['email']);
            $f->setTelefone($dados['telefone']);
            $f->setCidade($dados['cidade']);
            $f->setEstado($dados['estado']);
            $f->setRua($dados['rua']);
            $f->setCep($dados['cep']);

            return $f;
        } else {
            return false;
        }
    }

    public function findByEmail($email) {
        $sql = $this->pdo->prepare("SELECT * FROM fornecedor WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();
        
        //vericação se encontra alguma valor da query consultadoa
        if($sql->rowCount() > 0){
            $dados = $sql->fetch();

            $f = new Fornecedor();
            $f->setId($dados['id']);
            $f->setNome($dados['nome']);
            $f->setEmail($dados['email']);
            $f->setTelefone($dados['telefone']);
            $f->setCidade($dados['cidade']);
            $f->setEstado($dados['estado']);
            $f->setRua($dados['rua']);
            $f->setCep($dados['cep']);

            return $f;
        } else {
            return false;
        }
    }

    public function updateUser(Fornecedor $f){
        //recebido as informações do formularios alterados ai aplicamos essas alterações no banco de dado.
        $sql_user = $this->pdo->prepare("UPDATE fornecedor SET nome = :nome, email = :email, telefone = :telefone, cidade = :cidade, estado = :estado, rua = :rua, cep = :cep WHERE id = :id");

        $sql_user->bindValue(':nome', $f->getNome());
        $sql_user->bindValue(':email', $f->getEmail());
        $sql_user->bindValue(':telefone', $f->getTelefone());
        $sql_user->bindValue(':cidade', $f->getCidade());
        $sql_user->bindValue(':estado', $f->getEstado());
        $sql_user->bindValue(':rua', $f->getRua());
        $sql_user->bindValue(':cep', $f->getCep());
        $sql_user->bindValue(':id', $f->getId());
        $sql_user->execute();
        return true;
    }

    public function delete($id){
        //Aqui recebemos o ID do actionDelete, dessa forma é feita a chamada da query DELETE
        $sql = $this->pdo->prepare("DELETE FROM fornecedor WHERE id = :id");
        // montando as query
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
}