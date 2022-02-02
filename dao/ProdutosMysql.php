<?php
require_once 'models/interProdutos.php';

class ProdutosMysql implements InterProdutos {
    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function create(Produtos $p) {
        //Esse método recebe o objeto da classe PRODUTO vindo do formulário, e vai fazer uma adição dentro do banco de dado na tabela formulário.
        $sql = $this->pdo->prepare("INSERT INTO produtos (cod_produto, nome, preco, estoque, minEstoque) VALUES (:cod_produto, :nome, :preco, :estoque, :minEstoque)");
        $sql->bindValue(':cod_produto', $p->getCod_Produto());
        $sql->bindValue(':nome', $p->getNome());
        $sql->bindValue(':preco', $p->getPreco());
        $sql->bindValue(':estoque', $p->getEstoque());
        $sql->bindValue(':minEstoque', $p->getMinEstoque());
        $sql->execute();
        //depois que é executado a quert $sql, temos os objetos de produtos de cada itens recebido do formulario montado como objeto.

        //depois que os dados e insrido no bd, é gerado o id desse produto cadastrado, é esse id que pegamos aqui e setamos dentro do objeto $p, usando o método do PDO lastInsertId.
        $p->setId( $this->pdo->lastInsertId() );
        //com o objeto gerado e completo ele retorna esse objeto.
        return $p;
    }

    public function findAll() {
        $array = [];
        // fazendo a consulta dos itens dos produtos na tabela do DB.
        $sql = $this->pdo->query("SELECT * FROM produtos");
        //se dentro de minha tabela estiver algum registro>>
        if($sql->rowCount() > 0) {
            //salvo todos os itens dentros de varial $listas
            $listas = $sql->fetchAll();

            //agora transformando todos os intes em objetos um por um, usando o foreach.
            foreach($listas as $itens){
                //intanciado um objeto produtos
                $p = new Produtos();
                // transformando cada intes em objetos
                $p->setId($itens['id']);
                $p->setCod_Produto($itens['cod_produto']);
                $p->setNome($itens['nome']);
                $p->setPreco($itens['preco']);
                $p->setEstoque($itens['estoque']);
                $p->setMinEstoque($itens['minEstoque']);
                $p->setId_fornecedor($itens['id_fornecedor']);
                //jogando esse objetos dentro de array
                $array[] = $p;
            }

        } 

        return $array;
    }

    public function findById($id) {
        //Nesse consulta ela retorna o valor do id produto ou vai retornar o um valor vazio.
        $sql = $this->pdo->prepare("SELECT * FROM produtos WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        //depois da consulta da query na tabela, vai ser feita uma verificação, se retornar alguma valor, ele vair montar o objeto desse valor
        if($sql->rowCount() > 0) {
            $dados = $sql->fetch();

            $p = new Produtos();
            $p->setId($dados['id']);
            $p->setCod_Produto($dados['cod_produto']);
            $p->setNome($dados['nome']);
            $p->setPreco($dados['preco']);
            $p->setEstoque($dados['estoque']);
            $p->setMinEstoque($dados['minEstoque']);
            //depois de monta esse objeto ele retorna esse mesmo objeto.
            return $p;
        }else {
            return false;
        }
    }

    public function findByCod_produto($cod_produto) {
        //Nesse consulta ela retorna o valor do códgo do produto ou vai retornar o um valor vazio.
        $sql = $this->pdo->prepare("SELECT * FROM produtos WHERE cod_produto = :cod_produto");
        $sql->bindValue(':cod_produto', $cod_produto);
        $sql->execute();
        //depois da consulta da query na tabela, vai ser feita uma verificação, se retornar alguma valor, ele vair montar o objeto desse valor
        if($sql->rowCount() > 0) {
            $dados = $sql->fetch();

            $p = new Produtos();
            $p->setId($dados['id']);
            $p->setCod_Produto($dados['cod_produto']);
            $p->setNome($dados['nome']);
            $p->setPreco($dados['preco']);
            $p->setEstoque($dados['estoque']);
            $p->setMinEstoque($dados['minEstoque']);
            //depois de monta esse objeto ele retorna esse mesmo objeto.
            return $p;
        }else {
            return false;
        }
    }

    public function update(Produtos $p) {
        //Recebido os dados do produtos com os objetos de cada métodos montados, aqui fazemos a nosso query de atualização no banco de dados.
        $sql = $this->pdo->prepare("UPDATE produtos SET cod_produto = :cod_produto, nome = :nome, preco = :preco, estoque = :estoque, minEstoque = :minEstoque WHERE id = :id");
        $sql->bindValue(':cod_produto', $p->getCod_Produto());
        $sql->bindValue(':nome', $p->getNome());
        $sql->bindValue(':preco', $p->getPreco());
        $sql->bindValue(':estoque', $p->getEstoque());
        $sql->bindValue(':minEstoque', $p->getMinEstoque());
        $sql->bindValue(':id', $p->getId());
        //depois de montado cada objeto da query usando a classe Produtos para criar esse objetos executamos esses objeto, fazeno assim as modificações devidas dentro do BD.
        $sql->execute();
         return true;
    }

    public function delete($id) {
        //recendo os id de action delete fazemos a a chamada da query DELETE 
        $sql = $this->pdo->prepare("DELETE FROM produtos WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
}