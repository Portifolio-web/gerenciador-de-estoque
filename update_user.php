<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Atualizar Usuarios</title>
</head>

<body>
    <?php
    require_once 'config.php';
    require_once 'models/Usuarios.php';
    require_once 'dataAcessObject/dbUsuario.php';

    // instanciando o objeto usuarioDAO
    $updateUser = new DbUsuario($pdo);

    $infoUser = false; //variável vai ter a informação do produto
    $id = filter_input(INPUT_GET, 'id');

    if ($id) {
        //Aqui é instanciado um valor do id se ele achar um id ele vai criar um objeto desse id caso contrário ele vai ser uma instância false.
        $infoUser = $updateUser->findById($id);
    }
    //Se a informação do id for falso, ele reencaminhar para o index.ph do sistema, caso ele for verdadeiro ai ele mostra os fomulários ja preenchidos.
    if ($infoUser === false) {
        header("Location: index.php");
    }
    ?>
    <h1>Formulários de Atualização dos usuários</h1>

    <section class="section_add_product">
        <h3>Editar Usuários</h3>

        <form class="form_user" action="update_action_user.php" method="post">
            <!-- campo oculto -->
            <input type="hidden" name="id" value="<?= $infoUser->getId(); ?>">

            <div class="inputBox">
                <label id="nome" class="labelIput">Editar Nome:</label>
                <input type="text" name="nome" id="nome" class="iputUser" value="<?= $infoUser->getNome(); ?>">
            </div>

            <div class="inputBox">
                <label id="nome" class="labelIput">Editar E-mail:</label>
                <input type="email" name="email" id="email" class="iputUser" value="<?= $infoUser->getEmail(); ?>">
            </div>

            <div class="inputBox">
                <label id="preco" class="labelIput">Editar Senha:</label>
                <br />
                <input type="text" name="senha" id="senha" class="iputUser" value="<?= $infoUser->getSenha(); ?>">
            </div>
            <br>
            <input class="iputButton" type="submit" name="submit" id="submit" placeholder="Atualizar">
            <div class="btn-index"><a href="index.php">Voltar Home</a></div>
    </section>
</body>

</html>