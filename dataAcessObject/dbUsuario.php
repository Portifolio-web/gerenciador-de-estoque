<?php
require_once 'models/Usuarios.php';
require_once 'models/interUsuarios.php';

class DbUsuario implements interUsuarios {
    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function createUser(Usuarios $u) {
        
        $sql = $this->pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)");
        
        $sql->bindValue(':nome', $u->getNome());
        $sql->bindValue(':email', $u->getEmail());
        $sql->bindValue(':senha', $u->getSenha());
        $sql->execute();

        $u->setId($this->pdo->lastInsertId() );

        return $u;
    }

    public function findAll(){
        $array = [];

        // fazendo a consulta de usuarios no banco de dados
        $sql = $this->pdo->query("SELECT * FROM usuarios");
        if($sql->rowCount() > 0){
            // aqui esta os itens da tabela do bd
            $lista = $sql->fetchAll();
            //Aqui vai ser transformados esses dados em objetos
            foreach($lista as $itens) {
                $u = new Usuarios();
                $u->setId($itens['id']);
                $u->seNome($itens['nome']);
                $U->setEmail($itens['email']);
                // esses objetos é armazenado dentro de um array
                $array = $u;
            }
        }

        return $array;
    }

    public function findById($id){
        $sql->$this->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindValue('id:', $id);
        $sql->execute();
        //vericação se encontra alguma valor da query consultadoa
        if($sql->rowCount() > 0){
            $dados = $sql->fetch();

            $u = new Usuarios();
            $u->setId($dados['id']);
            $u->setNome($dados['nome']);
            $u->setEmail($dados['email']);
            $u->setSenha($dados['senha']);

            return $u;
        } else {
            return false;
        }
    }

    public function findByEmail($email) {
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();
        
        //vericação se encontra alguma valor da query consultadoa
        if($sql->rowCount() > 0){
            $dados = $sql->fetch();

            $u = new Usuarios();
            $u->setId($dados['id']);
            $u->setNome($dados['nome']);
            $u->setEmail($dados['email']);
            $u->setSenha($dados['senha']);

            return $u;
        } else {
            return false;
        }
    }

    public function update(Usuarios $u){
        
    }

    public function delete($id){
        
    }
}