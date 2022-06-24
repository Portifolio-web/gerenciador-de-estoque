<?php

// require_once 'models/Usuarios.php';
require_once 'models/interUsuarios.php';

class DbUsuario implements interUsuarios
{
    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    public function createUser(Usuarios $u)
    {

        $sql = $this->pdo->prepare("INSERT INTO usuarios (nome, email, senha, cidade, estado, rua, cep, numero, bairro) VALUES (:nome, :email, :senha, :cidade, :estado, :rua, :cep, :numero, :bairro)");

        $sql->bindValue(':nome', $u->getNome());
        $sql->bindValue(':email', $u->getEmail());
        $sql->bindValue(':senha', $u->getSenha());
        $sql->bindValue(':cidade', $u->getCidade());
        $sql->bindValue(':estado', $u->getEstado());
        $sql->bindValue(':rua', $u->getRua());
        $sql->bindValue(':cep', $u->getCep());
        $sql->bindValue(':numero', $u->getNumero());
        $sql->bindValue(':bairro', $u->getBairro());
        $sql->execute();

        $u->setId($this->pdo->lastInsertId());

        return $u;
    }

    public function findAll()
    {
        $array = [];

        // fazendo a consulta de usuarios no banco de dados
        $sql = $this->pdo->query("SELECT * FROM usuarios");
        if ($sql->rowCount() > 0) {
            // aqui esta os itens da tabela do bd
            $lista = $sql->fetchAll();
            //Aqui vai ser transformados esses dados em objetos
            foreach ($lista as $itens) {
                $u = new Usuarios();
                $u->setId($itens['id']);
                $u->setNome($itens['nome']);
                $u->setEmail($itens['email']);
                $u->setCidade($itens['cidade']);
                $u->setEstado($itens['estado']);
                $u->setRua($itens['rua']);
                $u->setCep($itens['cep']);
                $u->setNumero($itens['numero']);
                $u->setBairro($itens['bairro']);
                // esses objetos é armazenado dentro de um array
                $array[] = $u;
            }
        }

        return $array;
    }

    public function findById($id)
    {
        $sql_user = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql_user->bindValue(':id', $id);
        $sql_user->execute();
        //vericação se encontra alguma valor da query consultadoa
        if ($sql_user->rowCount() > 0) {
            $dados = $sql_user->fetch();

            $u = new Usuarios();
            $u->setId($dados['id']);
            $u->setNome($dados['nome']);
            $u->setEmail($dados['email']);
            $u->setSenha($dados['senha']);
            $u->setCidade($dados['cidade']);
            $u->setEstado($dados['estado']);
            $u->setRua($dados['rua']);
            $u->setCep($dados['cep']);
            $u->setNumero($dados['numero']);
            $u->setBairro($dados['bairro']);

            return $u;
        } else {
            return false;
        }
    }

    public function findByEmail($email)
    {
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();

        //verificação se encontra alguma valor da query consultadoa
        if ($sql->rowCount() > 0) {
            $dados = $sql->fetch();

            $u = new Usuarios();
            $u->setId($dados['id']);
            $u->setNome($dados['nome']);
            $u->setEmail($dados['email']);
            $u->setSenha($dados['senha']);
            $u->setCidade($dados['cidade']);
            $u->setEstado($dados['estado']);
            $u->setRua($dados['rua']);
            $u->setCep($dados['cep']);

            return $u;
        } else {
            return false;
        }
    }

    public function updateUser(Usuarios $up)
    {
        //recebido as informações do formularios alterados ai aplicamos essas alterações no banco de dado.
        $sql_user = $this->pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, senha = :senha, cidade = :cidade, estado = :estado, numero = :numero, bairro = :bairro, rua = :rua, cep = :cep WHERE id = :id");

        $sql_user->bindValue(':nome', $up->getNome());
        $sql_user->bindValue(':email', $up->getEmail());
        $sql_user->bindValue(':senha', $up->getSenha());
        $sql_user->bindValue(':cep', $up->getCep());
        $sql_user->bindValue(':rua', $up->getRua());
        $sql_user->bindValue(':numero', $up->getNumero());
        $sql_user->bindValue(':bairro', $up->getBairro());
        $sql_user->bindValue(':cidade', $up->getCidade());
        $sql_user->bindValue(':estado', $up->getEstado());
        $sql_user->bindValue(':id', $up->getId());
        $sql_user->execute();
        return true;
    }

    public function delete($id)
    {
        //Aqui recebemos o ID do actionDelete, dessa forma é feita a chamada da query DELETE
        $sql = $this->pdo->prepare("DELETE FROM usuarios WHERE id = :id");
        // montando as query
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    public function login($email, $senha)
    {

        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha ");
        $sql->bindValue("email", $email);
        $sql->bindValue("senha", md5($senha));
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $user = $sql->fetch();

            // $u = new Usuarios();
            // $u->setNome($user['nome']);
            // $u->setEmail($user['email']);

            $_SESSION['idUser'] = $user['nome'];
            // echo $user['id']; 

            return true;
        } else {
            return false;
        }
    }

    public function logout()
    {
        unset($_SESSION['idUser']);
        header("Location: login.php");
    }
}
