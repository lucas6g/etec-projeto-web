<?php 

    session_start();
    include('../config/db.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    $sql = "select id from usuario where email = '$email' and senha = md5('$senha')";
    $resposta =  mysqli_query($connection,$sql);
    $usuario = mysqli_fetch_array($resposta);
    
    $linha = mysqli_num_rows($resposta);
    
    if($linha == 1){
        $_SESSION['usuario'] = $usuario['id'];
        header('Location: perfil_usuario.php');
        exit();
    }else{
        $_SESSION['nao_autenticado'] = true;
        header('Location: login.php');
        exit();
    } 
        
?>