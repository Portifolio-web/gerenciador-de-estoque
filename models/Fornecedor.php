<?php
require_once 'models/interFornecedor.php';
class Fornecedor {
    private $id;
    private $cod_fornecedor;
    private $cnpj;
    private $nome;
    private $email;
    private $telefone;
    private $cidade;
    private $estado;
    private $rua;
    private $cep;

    public function getId() {
        return $this->id;
    }

    public function setId($i) {
        $this->id = $i;
    }

    public function getCod_fornecedor() {
        return $this->cod_fornecedor;
    }

    public function setCod_fornecedor($if) {
        $this->cod_fornecedor = $if;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function SetCnpj($cn) {
        $this->cnpj = $cn;
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

    public function getTelefone(){
        return $this->telefone;
    }

    public function setTelefone($tel) {
        $this->telefone = $tel;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function setCidade($cd) {
        $this->cidade = $cd;
    }

    public function getEstado() {
        return $this->estado;
    } 

    public function setEstado($est) {
        $this->estado = $est;
    } 

    public function getRua() {
        return $this->rua;
    }

    public function setRua($r) {
        $this->rua = $r;
    }

    public function getCep() {
        return $this->cep;
    }

    public function setCep($c) {
        $this->cep = $c;
    }
}