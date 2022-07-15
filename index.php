<?php

    include('connection.php');
    $conn = OpenCon();

    if(isset($_POST['email']) || isset($_POST['password'])){
        if(strlen($_POST['email']) == 0){
            echo"Preencha o seu e-mail";
        }else if(strlen($_POST['password']) == 0){
            echo"Preencha a sua senha";
        }else{
            $email = $conn -> real_escape_string($_POST['email']);
            $password = $conn -> real_escape_string($_POST['password']);
            
            $sql_code = "SELECT * FROM usuario WHERE email = '$email' AND senha='$password'";
            $sql_query = $conn -> query($sql_code) or die("Falha na consulta: ". $conn -> error);

            $quantidade = $sql_query -> num_rows;

            if($quantidade == 1){
                $usuario = $sql_query -> fetch_assoc();

                if(!isset($_SESSION)){
                    session_start();
                }

                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];

                header("Location: painel.php");
            }else{
                echo"Falha ao logar, e-mail ou senha incorretos";
            }
        }
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
<title>Login</title>
<body style="background-color: black;">
    <div class="mb-3 formulario">
        <center><h1>Login</h1></center>
        <br>
        <form action="" method="POST">
            E-Mail:
            <p><input type="email" name="email" class="form-control" placeholder="nome@exemplo.com"></p>
            Senha:
            <p><input type="password" name="password" class="form-control" placeholder="senhaexemplo"></p>
            <br>
            <center><button type="submit" name="enviar" class="btn btn-dark btn-lg">Enviar</button></center>
        </form>
    </div>
</body>
</html>