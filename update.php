<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css" integrity="sha384-3B6NwesSXE7YJlcLI9RpRqGf2p/EgVH8BgoKTaUrmKNDkHPStTQ3EyoYjCGXaOTS" crossorigin="anonymous">
    <title>Atualização de Cadastro Produtos</title>
</head>
<body>
    <?php 
         require_once 'config.php';
         require_once 'models/produtos.php';
         require_once 'dataAcessObject/ProdutosMysql.php';
 
         // instanciando o objeto usuarioDAO
         $updatePro = new ProdutosMysql($pdo);
        
        $infoPro = false;//variável vai ter a informação do produto
        $id = filter_input(INPUT_GET, 'id');

        if($id) {
            //Aqui é instanciado um valor do id se ele achar um id ele vai criar um objeto desse id caso contrário ele vai ser uma instância false.
            $infoPro = $updatePro->findById($id);
        }
        //Se a informação do id for falso, ele reencaminhar para o index.ph do sistema, caso ele for verdadeiro ai ele mostra os fomulários ja preenchidos.
        if($infoPro === false ){
            header("Location: update.php?id="."$id");
        }
    ?>
    <?php 
        require_once 'header.php';
        require_once 'menu_lateral.php';
    ?>
    
    <section class="section_add_product">
        
        <h3>Editar Produto</h3>
        
        <form class="form_user" action="update_action.php" method="post">
            <!-- campo oculto -->
            <input type="hidden" name="id" value="<?=$infoPro->getId();?>">

            <div class="inputBox">
                <label id="nome" class="labelIput">Códgo do Produto:</label>
                <input type="number" name="cod_produto" id="cod_produto" class="iputUser" value="<?=$infoPro->getCod_Produto();?>">
            </div>

            <div class="inputBox">
                <label id="nome" class="labelIput">Atualizar Nome do Produto:</label>
                <input type="text" name="nome" id="nome" class="iputUser" value="<?=$infoPro->getNome();?>">
            </div>

            <div class="inputBox">
                <label id="preco" class="labelIput">Atualizar Preço:</label>
                <br/>
                <input type="text" name="preco" id="preco" class="iputUser" value="<?=$infoPro->getPreco();?>">
            </div>

            <div class="inputBox">
                <label id="estoque" class="labelIput">Atualizar Estoque:</label>
                <input type="text" name="estoque" id="estoque" class="iputUser" value="<?=$infoPro->getEstoque();?>">
            </div>

            <div class="inputBox">
                <label id="minEstoque" class="labelIput">Atualizar Estoque Mínimo:</label>
                <input type="text" name="minEstoque" id="minEstoque" class="iputUser" value="<?=$infoPro->getMinEstoque();?>">
            </div>

            <div class="inputBox">
                <label id="id_fornecedor" class="labelIput">ID Fornecedor:</label>
                <input type="text" name="id_fornecedor" id="id_fornecedor" class="iputUser" value="<?=$infoPro->getId_fornecedor();?>">
            </div>
            <br>
            <input class="iputButton" type="submit" name="submit" id ="submit" value="Atualizar">
    </section>    
</body>
</html>