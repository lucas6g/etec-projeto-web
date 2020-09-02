<?php

ob_start();

//para usar informaçoes em outras paginas usar a super global session
//cada session cria um id novo ela e finalizada quando fecha a pagina do navegador 

if(!isset($_SESSION)){ //super variavel que armazena dados combase na secao do no coso com base no usuario
    session_start();
}

//conexao com o banco de dados 
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'app';
    $port = '3308';

    $connection =  mysqli_connect($host,$user,$password,$db_name,$port);
?>