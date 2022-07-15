<?php

    function OpenCon(){
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'login';
        $conn = new mysqli($host, $user, $password, $database) or die("Falha ao conectar ao banco de dados: ". $conn -> error);

        return $conn;
    }
    
    function CloseCon($conn){
        $conn -> close();
    }

?>