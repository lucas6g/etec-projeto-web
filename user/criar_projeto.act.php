<?php

    session_start();
    include('../config/db.php');
    $id_usuario = $_SESSION['usuario'];
    $nome_projeto = $_POST['nome-projeto'];
    $descricao = $_POST['descricao'];
    $tecnologias = $_POST['tecnologias'];
    $git_url = $_POST['git-url'];
    $categoria = $_POST['format'];

     //upload da imagem
     $extensao = pathinfo($_FILES['ARQUIVO']['name'],PATHINFO_EXTENSION);
     $endereco_imagem = "";
         $pasta = "imagens_projetos/";
         $temporario = $_FILES['ARQUIVO']['tmp_name'];
         $novo_nome = uniqid().".$extensao";
         move_uploaded_file($temporario,$pasta.$novo_nome);
         $endereco_imagem = $novo_nome; 
     
    $valor_zero = 0;

     $sql = "insert into projeto (nome_projeto,descricao,tecnologias,git_url,img_url,id_usuario,likes,categoria) values ('$nome_projeto','$descricao','$tecnologias','$git_url','$endereco_imagem','$id_usuario','$valor_zero','$categoria')";
     $resposta =  mysqli_query($connection,$sql);
     $id_projeto = mysqli_insert_id($connection);
     header('Location: perfil_usuario.php');
?>