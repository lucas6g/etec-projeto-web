<?php
    session_start();
    include('../config/db.php');
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $whastapp = $_POST['whatsapp'];

    //upload da imagem
    $formatos_permitidos = array("png","jpeg","jpg");
    $extensao = pathinfo($_FILES['ARQUIVO']['name'],PATHINFO_EXTENSION);
    $endereco_imagem = "";
    if(in_array($extensao,$formatos_permitidos)){
        $pasta = "imagens_perfil/";
        $temporario = $_FILES['ARQUIVO']['tmp_name'];
        $novo_nome = uniqid().".$extensao";
        move_uploaded_file($temporario,$pasta.$novo_nome);
        $endereco_imagem = $novo_nome; 
    }
    
    $sql_email = "select email from usuario  where email = '$email' ";
    $resultado_email = mysqli_query($connection,$sql_email);
    $linha = mysqli_num_rows($resultado_email);

    if($linha > 0 ){
        $_SESSION['email_existe'] = true;
        header('Location: cadastrar.php');
        exit();
    }else{
        $sql = "insert into usuario (nome,email,senha,whatsapp,img_profile) values ('$nome','$email',md5('$senha'),'$whastapp','$endereco_imagem')";
        $resposta =  mysqli_query($connection,$sql);
        $_SESSION['nome_usuario'] = $nome;
        header('Location: login.php');
        exit();
    }
   
?>