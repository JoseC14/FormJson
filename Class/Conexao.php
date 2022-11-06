<?php

try{
    $conn = new PDO("mysql:dbname=json_test; host=localhost","root","");
}catch(Exception $e){
    echo "Erro no arquivo conexao.php:$e";
}