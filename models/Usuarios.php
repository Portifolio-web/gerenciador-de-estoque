<?php
class Usuarios {
    private $id;
    private $nome;
    private $mail;

    public function geId() {
        return $this->id;
    }

    public function setId($i) {
        $this->id = trin($i);
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($n) {
        $this->nome = ucwords(trin($n));
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($e) {
        $this->email = strtolower(trin($e));
    }

}