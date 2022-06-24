<?php
require_once 'models/interFornecedor.php';
class Fornecedor {
    private $id;
    private $cod_fornecedor;
    private $razao_social;
    private $cnpj;
    private $email;
    private $telefone;
    private $cep;
    private $rua;
    private $numero;
    private $bairro;
    private $cidade;
    private $estado;

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

    public function getRazaoSocial(){
        return $this->razao_social;
    }

    public function setRazaoSocial($rz) {
        $this->razao_social = $rz;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function SetCnpj($cn) {
        $this->cnpj = $cn;
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

    public function getCep() {
        return $this->cep;
    }

    public function setCep($c) {
        $this->cep = $c;
    }

    public function getRua() {
        return $this->rua;
    }

    public function setRua($r) {
        $this->rua = $r;
    
    }
    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($n) {
        $this->numero = $n;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function setBairro($br) {
        $this->bairro = $br;
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


}