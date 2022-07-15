<?php

    if(!isset($_SESSION)){
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<title>Cadastro</title>
<body style="background-color: black;">

    <?php
        if(isset($_SESSION['status_cadastro'])):
    ?>

    <p>Cadastro efetuado!</p>
    <p>Faça login informando o seu usuário e senha aqui!</p>

    <?php
        endif;
        unset($_SESSION['stauts_cadastro']);
    ?>

    <?php
        if(isset($_SESSION['usuario_existe'])):
    ?>
    <p>O E-mail escolhido já existe! Informe outro e tente novamente.</p>
    <?php
        endif;
        unset($_SESSION['usuario_existe']);
    ?> 

    <div class="mb-3 formulario">
        <center><h1>Cadastro</h1></center>
        <br>
        <form action="cadastrar.php" method="POST">
            Nome do usuário:
            <p><input type="text" name="user" class="form-control" placeholder="nomeexemplo"></p>
            E-Mail:
            <p><input type="email" name="email" class="form-control" placeholder="nome@exemplo.com"></p>
            Senha:
            <p><input type="password" name="password" class="form-control" placeholder="senhaexemplo"></p>
            <br>
            <center><button type="submit" name="enviar" class="btn btn-dark btn-lg">Registrar</button></center>
        </form>
    </div>
</body>
</html>