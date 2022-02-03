<?php
class Usuarios {
    private $id;
    private $nome;
    private $mail;
    private $senha;

    public function getId() {
        return $this->id;
    }

    public function setId($i) {
        $this->id = $i;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($n) {
        $this->nome = $n;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($e) {
        $this->email = $e;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($snh) {
        $this->senha = md5($snh);
    }

}