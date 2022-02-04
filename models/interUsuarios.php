<?php
interface interUsuarios {
    public function createUser(Usuarios $u);//criar usuarios
    public function findAll();//mostrar os usuários do banco 
    public function findById($id);//mostra apenas um usuários
    public function findByEmail($email);
    public function updateUser(Usuarios $u);//atualizar os dados do usuários
    public function delete($id);//deleta os itens do usários
}