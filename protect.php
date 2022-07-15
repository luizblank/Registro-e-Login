<?php

    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['id'])){
        die("Você não pode acessar está página, você não está logado <p><a href='index.php'>Efetue o login</a></p>");
    }

?>