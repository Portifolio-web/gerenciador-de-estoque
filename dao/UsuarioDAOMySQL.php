<?php
require_once 'models/Usuarios.php';
require_once 'models/UsuarioInterface.php';

class UsuarioDaoMysql implements UsuarioDAO {
    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function create(Usuarios $u) {
        $array = [];

        $sql = $this->pdo->query("INSERT INTO produtos");
        if($sql->rowCount() > 0)

        return $array;
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
        
    }

    public function update(Usuarios $u){
        
    }

    public function delete($id){
        
    }
}