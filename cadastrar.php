<?php

    include('connection.php');
    if(!isset($_SESSION)){
        session_start();
    }
    $conn = OpenCon();

    if(isset($_POST['email']) || isset($_POST['password'])){
        if(strlen($_POST['email']) == 0){
            echo"Preencha o seu e-mail";
        }else if(strlen($_POST['password']) == 0){
            echo"Preencha a sua senha";
        }

    // pegando os campos escritos no html e armazenando nas variaveis
    $nome = $conn -> real_escape_string(trim($_POST['user']));
    $email = $conn -> real_escape_string(trim($_POST['email']));
    $password = $conn -> real_escape_string(trim($_POST['password']));

    // verificando no banco de dados se o email ja existe
    $sql = "select count(*) as total from usuario where email = '$email'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);


    // verificar se o email ja existe
    if($row['total'] == 1){
        $_SESSION['usuario_existe'] = true;
        header('Location: cadastro.php');
        exit;
    }

    // se o email nao existir cadastra no banco de dados
    $sql = "INSERT INTO usuario(nome, email, senha) VALUES ('$nome','$email','$password')";
    if($conn -> query($sql) === True){
        $_SESSION['status_cadastro'] = True;
    }

    // finalizar a conexao com o banco
    $conn -> close();

    // enviar para a pagina cadastro
    header('Location: cadastro.php');

    exit;
    }
    
?>