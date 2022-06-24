<?php
// require_once 'models/Usuarios.php';
require_once 'models/interFornecedor.php';

class dbFornecedor implements InterFornecedor {
    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function createFornecedor(Fornecedor $f) {
        
        $sql = $this->pdo->prepare("INSERT INTO fornecedor (cod_fornecedor, razao_social, cnpj, email, telefone, cep, rua, numero, bairro, cidade, estado, ) 
                                                    VALUES (:cod_fornecedor, :razao_social, :cnpj,  :email, :telefone, :cep, :rua,:numero, :bairro, :cidade, :estado,   )");
        
        $sql->bindValue(':cod_fornecedor', $f->getCod_fornecedor());
        $sql->bindValue(':raza_social', $f->getRazaoSocial());
        $sql->bindValue(':cnpj', $f->getCnpj());
        $sql->bindValue(':email', $f->getEmail());
        $sql->bindValue(':telefone', $f->getTelefone());
        $sql->bindValue(':cep', $f->getCep());
        $sql->bindValue(':rua', $f->getRua());
        $sql->bindValue(':numero', $f->getNumero());
        $sql->bindValue(':bairro', $f->getBairro());
        $sql->bindValue(':cidade', $f->getCidade());
        $sql->bindValue(':estado', $f->getEstado());
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
                $f->setRazaoSocial($itens['razao_social']);
                $f->SetCnpj($itens['cnpj']);
                $f->setEmail($itens['email']);
                $f->setTelefone($itens['telefone']);
                $f->setCep($itens['cep']);
                $f->setRua($itens['rua']);
                $f->setNumero($itens['numero']);
                $f->setBairro($itens['bairro']);
                $f->setCidade($itens['cidade']);
                $f->setEstado($itens['estado']);
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
            $f->setCod_fornecedor($dados['cod_fornecedor']);
            $f->setRazaoSocial($dados['razao_social']);
            $f->SetCnpj($dados['cnpj']);
            $f->setEmail($dados['email']);
            $f->setTelefone($dados['telefone']);
            $f->setCep($dados['cep']);
            $f->setRua($dados['rua']);
            $f->setNumero($dados['numero']);
            $f->setBairro($dados['bairro']);
            $f->setCidade($dados['cidade']);
            $f->setEstado($dados['estado']);

            return $f;
        } else {
            return false;
        }
    }

    public function findByCod_fornecedor($cod_fornecedor) {
        //esse consulta faz retorna o valor do código do fornecedor, ou um valor vazio
        $sql = $this->pdo->prepare("SELECT * FROM fornecedor WHERE cod_fornecedor = :cod_fornecedor");
        $sql->bindValue(':cod_fornecedor', $cod_fornecedor);
        $sql->execute();//executamos a query 
        
        //depois que consultamos na query na tabela, vamos fazer uma verificação se retorna alguma valor, se retornar ele vair motar o objeto dos valores.
        if($sql->rowCount() > 0) {
            $dados  = $sql->fetch();//dados recedo os valores retornado caso exita na consulta.

            $f = new Fornecedor();
            $f->setId($dados['id']);
            $f->setCod_fornecedor($dados['cod_fornecedor']);
            $f->setRazaoSocial($dados['razao_social']);
            $f->SetCnpj($dados['cnpj']);
            $f->setEmail($dados['email']);
            $f->setTelefone($dados['telefone']);
            $f->setCep($dados['cep']);
            $f->setRua($dados['rua']);
            $f->setNumero($dados['numero']);
            $f->setBairro($dados['bairro']);
            $f->setCidade($dados['cidade']);
            $f->setEstado($dados['estado']);
            //Objetos montado agora esses objetos é retornados
            return $f;
        }else {
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
            $f->setCod_fornecedor($dados['cod_fornecedor']);
            $f->setRazaoSocial($dados['razao_social']);
            $f->SetCnpj($dados['cnpj']);
            $f->setEmail($dados['email']);
            $f->setTelefone($dados['telefone']);
            $f->setCep($dados['cep']);
            $f->setRua($dados['rua']);
            $f->setNumero($dados['numero']);
            $f->setBairro($dados['bairro']);
            $f->setCidade($dados['cidade']);
            $f->setEstado($dados['estado']);

            return $f;
        } else {
            return false;
        }
    }

    public function updateFornecedor(Fornecedor $f){
        //recebido as informações do formularios alterados ai aplicamos essas alterações no banco de dado.
        $sql_f = $this->pdo->prepare("UPDATE fornecedor SET cod_fornecedor = :cod_fornecedor, razao_social = :razao_social, cnpj = :cnpj, email = :email, telefone = :telefone, cep = :cep, rua = :rua, numero = :numero, bairro = :bairro, cidade = :cidade, estado = :estado WHERE id = :id");

        $sql_f->bindValue(':cod_fornecedor', $f->getCod_fornecedor());
        $sql_f->bindValue(':cnpj', $f->getCnpj());
        $sql_f->bindValue(':razao_social', $f->getRazaoSocial());
        $sql_f->bindValue(':email', $f->getEmail());
        $sql_f->bindValue(':telefone', $f->getTelefone());
        $sql_f->bindValue(':cidade', $f->getCidade());
        $sql_f->bindValue(':estado', $f->getEstado());
        $sql_f->bindValue(':rua', $f->getRua());
        $sql_f->bindValue(':cep', $f->getCep());
        $sql_f->bindValue(':id', $f->getId());
        $sql_f->execute();
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