<?php
interface interFornecedor {
    public function createFornecedor(Fornecedor $f);//criar usuarios
    public function findAll();//mostrar os usuários do banco 
    public function findById($id);//mostra apenas um usuários
    public function findByCod_fornecedor($cod_fornecedor);
    public function findByEmail($email);
    public function updateFornecedor(Fornecedor $f);//atualizar os dados do usuários
    public function delete($id);//deleta os itens do usários
}