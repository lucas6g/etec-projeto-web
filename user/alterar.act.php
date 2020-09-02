<?php
    include('../config/db.php');
    $id_projeto  = $_GET['id_projeto'];
    $nome_projeto = $_POST['nome-projeto'];
    $descricao = $_POST['descricao'];
    $tecnologias = $_POST['tecnologias'];
    $git_url = $_POST['git-url'];
    $categoria = $_POST['format'];
    
   
        //se escolheu imagem
        $sql_deletar_imagem = "select img_url from projeto where id_projeto ='$id_projeto'";
        $res = mysqli_query($connection,$sql_deletar_imagem);
        $projeto =   mysqli_fetch_array($res);
        $nome_img = $projeto['img_url'];
        unlink("imagens_projetos/".$nome_img);

        $formatos_permitidos = array("png","jpeg","jpg");
        $extensao = pathinfo($_FILES['ARQUIVO']['name'],PATHINFO_EXTENSION);
        if(in_array($extensao,$formatos_permitidos)){
            $pasta = "imagens_projetos/";
            $temporario = $_FILES['ARQUIVO']['tmp_name'];
            $novo_nome = uniqid().".$extensao";
            move_uploaded_file($temporario,$pasta.$novo_nome);
            $endereco_imagem = $novo_nome; 
        }
        $sql = "update projeto set nome_projeto = '$nome_projeto' ,descricao ='$descricao',tecnologias = '$tecnologias', git_url ='$git_url',img_url = '$endereco_imagem',categoria = '$categoria' where id_projeto = '$id_projeto'";
        $resposta =  mysqli_query($connection,$sql);
        $id_projeto = mysqli_insert_id($connection);
        header('Location: perfil_usuario.php');
 

?>