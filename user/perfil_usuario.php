<?php
    session_start();
 
    
    if(!isset($_SESSION['usuario'])){
        
        header('Location: login.php');
    }
   
  
    include('../config/db.php');
    $id = $_SESSION['usuario'];
    $sql = "select nome,whatsapp,img_profile from usuario where id = '$id'";
    $resposta =  mysqli_query($connection,$sql);
    $usuario = mysqli_fetch_array($resposta);

    $nome_user = $usuario['nome'];
    $whats = $usuario['whatsapp'];
    $img_endereco = $usuario['img_profile'];
  
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    
    <link rel="stylesheet" href="../css/perfil_usuario.css">
    <title>Perfil de Usuario</title>

    
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <h1 class="navbar-brand user-name" href="#">
            Seja bem vindo, <?php echo $nome_user; ?>
        </h1>
        
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <img class="navbar-toggler-icon " src="../img/haburger.png" alt="">
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="container nav">
            
                    <ul class="navbar-nav ">

                        <li class="nav-item cadastrar">
                            <a class="nav-link " href="criar_projeto.php">Criar um Novo Projeto</a>
                        </li>
        
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Sair </a>
                        </li>

                    </ul>
                    <img class="img_profile" src=<?php echo "../user/imagens_perfil/$img_endereco"  ?> alt=""> 
                    
                </div>  <!--fim container menu-->
                
            </div>
        </nav>

        <!-- listagem dos projetos -->
        <div class="container-fluid">
            <div class="row projetos ">
              <?php  
                $sql_listar = "select * from projeto where id_usuario = '$id'";
                $projetos =  mysqli_query($connection,$sql_listar);
                while($projeto = mysqli_fetch_array($projetos)){
              echo " <div class='col-md-3 projeto-container'>
                        
                            <div class='projeto'>
                                <img class='img-projeto' src='imagens_projetos/$projeto[img_url]' alt=''>
                            </div>
                     
                            <div class='dados-projeto'>   
                                <h5>$projeto[nome_projeto] </h5>

                                <a class='lixeira' href=excluir.php?id_projeto=$projeto[id_projeto]>
                                    
                                    <i class='fa fa-trash' aria-hidden='true'></i>
                                </a>
                                <a class='alterar' href=alterar.php?id_projeto=$projeto[id_projeto]>
                                 <i class='fa fa-pencil-square-o' aria-hidden='true'></i>
                                </a>

                            </div>
                </div>";

                }
                ?>
               
            </div>
        </div>  <!--fim conateniner principal-->


    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
</body>
</html>