<?php
interface InterProdutos {
    public function create(Produtos $p);
    public function findAll();
    public function findById($id);
    public function findByCod_produto($cod_produto);
    public function update(Produtos $p);
    public function delete($id);
}