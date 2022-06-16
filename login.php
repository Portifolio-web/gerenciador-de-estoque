<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Sistemas de Estoques</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
</head>

<body id="body-login">
    <section class="content-login">

        <div class="content-login-header">
            <h1>Entre com seu login</h1>
        </div>

        <div class="content-login-form">
            <form method="POST" action="user_login.php">
                Login:<input class="c_form" type="email" name="email" placeholder="E-mail.." /><br />
                Senha:<input class="c_form" type="password" name="senha" placeholder="Senha.." /><br />
                <input type="submit" class="botao" value="Login" />
            </form>
        </div>

    </section>
</body>

</html>