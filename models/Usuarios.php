<?php
require_once 'models/interUsuarios.php';
class Usuarios {
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $cep;
    private $rua;
    private $numero;
    private $bairro;
    private $cidade;
    private $estado;
    private $urls;
    private $nameImages;

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

    public function setNumero($nu) {
        $this->numero = $nu;
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

    public function getUrls() {
        return $this->urls;
    }

    public function setUrls($ur) {
        $this->urls = $ur;
    }

    public function getNameImages() {
        return $this->nameImages;
    }

    public function setNameImages($Ni) {
        $this->nameImages = $Ni;
    }


}