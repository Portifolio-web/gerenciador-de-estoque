<?php
interface UsuarioDAO {
    public function create(Usuarios $u);//criar usuarios
    public function findAll();//mostrar os usuários do banco 
    public function findById($id);//mostra apenas um usuários
    public function update(Usuarios $u);//atualizar os dados do usuários
    public function delete($id);//deleta os itens do usários
}