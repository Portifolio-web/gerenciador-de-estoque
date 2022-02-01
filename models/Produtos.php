<?php
require_once 'models/interProdutos.php';
class Produtos {

    private $id;
    private $cod_produto;
    private $nome;
    private $preco;
    private $estoque;
    private $minEstoque;
    private $id_fornecedor;

    //métodos especiais
    public function getId() {
        return $this->id;
    }

    public function setId($i) {
        $this->id = $i;
    }

    public function getCod_Produto() {
        return $this->cod_produto;
    }

    public function setCod_Produto($cp) {
        $this->cod_produto = $cp;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($n) {
        $this->nome = $n;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function setPreco($p) {
        $this->preco = $p;
    }

    public function getEstoque() {
        return $this->estoque;
    }

    public function setEstoque($e){
        $this->estoque = $e;
    }

    public function getMinEstoque() {
        return $this->minEstoque;
    }

    public function setMinEstoque($me) {
        $this->minEstoque = $me;
    }

    public function getId_fornecedor(){
        return $this->id_fornecedor;
    }

    public function setId_fornecedor($if) {
        $this->id_fornecedor = $if;
    }
}