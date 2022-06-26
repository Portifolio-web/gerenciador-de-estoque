<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css" integrity="sha384-3B6NwesSXE7YJlcLI9RpRqGf2p/EgVH8BgoKTaUrmKNDkHPStTQ3EyoYjCGXaOTS" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>Sistema Controle de Estoque</title>
</head>

<body>
    <div class="container">
        <nav class="div-nav">
            <ul>
                <li class="title">Área do Cliente</li>
                <li class="icons-usertitle">Bem Vindo(a) </li>
                <li class="avatar"><img src="./assets/image/avatar.png" alt=""></li>
                <li class="icons-user"> <?php echo $_SESSION['idUser'];  ?></li>
            </ul>
        </nav>