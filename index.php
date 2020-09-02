<?php
    session_start();
    include('./config/db.php');
    
    $categoria_selecinada = false;


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/index.css">
    <title>Blender</title>

</head>
<body>

    <!--usar o include para quando clicar em um projeto direcionar  -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img class="logo" src="img/logo3.png" alt="">
        </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <img class="navbar-toggler-icon " src="img/haburger.png" alt="">
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="container nav">
            
                    <ul class="navbar-nav ">
                      
                        
                        <li class="nav-item">
                            <a  class="nav-link" href="user/login">Fazer Login</a>
                        </li>
                        <li class="nav-item cadastrar">
                            <a class="nav-link " href="user/cadastrar.php">Cadastrar-Se</a>
                        </li>
                  
                    </ul>
                    
                </div>  <!--fim container menu-->
                <form action="" method="POST">
                    <input class="input-busca" placeholder="Nome projeto" type="text" name="data" > 
                    <button class="btn-buscar" type="submit">Buscar</button>

                </form>

            </div>
        </nav>


    <div class="container-fluid container-principal">
        <div class="row categorias d-flex flex-row justify-content-center align-items-center">
       
               <div class=" col-md-2 ">
                     <div class="categoria d-flex flex-row justify-content-center align-items-center">
                       <a class="cat-link" href="./index.php?categoria=web">
                           Web
                       </a>  
                     </div>
              
                </div>


            <div class=" col-md-2">
                  <div class="categoria d-flex flex-row justify-content-center align-items-center">
                     <a  class="cat-link" href="./index.php?categoria=mobile">
                         Mobile

                     </a> 
                  </div>
            </div>
            <div class="col-md-2">
                  <div class="categoria d-flex flex-row justify-content-center align-items-center">
                      <a  class="cat-link" href="./index.php?categoria=geral">

                          Geral
                      </a>
                  </div>
            </div>
            <div class="col-md-2">
                  <div class="categoria d-flex flex-row justify-content-center align-items-center">
                      <a  class="cat-link" href="./index.php?categoria=jogos">

                          Jogos
                      </a>
                  </div>
            </div>
            <div class=" col-md-2">
                  <div class="categoria d-flex flex-row justify-content-center align-items-center">
                      <a  class="cat-link" href="./index.php?categoria=desktop">

                          Desktop
                      </a>
                  </div>
            </div>
         
            <div class=" col-md-2">
                  <div class="categoria d-flex flex-row justify-content-center align-items-center">
                      <a  class="cat-link" href="./index.php?categoria=inteligencia">

                          Inteligencia Artificial
                      </a>
                  </div>
            </div>
        </div> <!--fim row categorias-->

             <?php
                $categoria = @$_GET['categoria'];
                    if($categoria)  {
                        $categoria_selecinada = true;
                    }
                    if($categoria == 'geral'){
                        $categoria_selecinada = false;
                    }

              ?>

        <div class="row titulo mt-4 mb-4 ">
            <div class="container">
                <h1>Os melhores projetos</h1>
            </div>
        </div>
       

        <div class="row projetos mb-4">
        <?php  
            
              if($categoria_selecinada == false){
                //geral
                if(isset($_POST['data'])){
                    $campo_busca = $_POST['data'];
                    $sql_listar = "select id_projeto, nome, nome_projeto,img_profile,img_url,likes from  projeto inner join usuario on projeto.id_usuario = usuario.id where projeto.nome_projeto like '%$campo_busca%'";
                    $projetos =  mysqli_query($connection,$sql_listar);
                }else{
                    $sql_listar = "select id_projeto, nome, nome_projeto,img_profile,img_url,likes from  projeto inner join usuario on projeto.id_usuario = usuario.id";
                    $projetos =  mysqli_query($connection,$sql_listar);

                }
                while($projeto = mysqli_fetch_array($projetos)){
              echo " <div class='col-md-3 projeto-container'>
                                <a href=./user/vizualiza_projeto.php?id=$projeto[id_projeto]>
                                    <div class='projeto'>
                                        <img class='img-projeto' src='./user/imagens_projetos/$projeto[img_url]' alt=''>
                                    </div>
                                </a>
                            
                        <div class='dados-projeto'>   
                            <img class='img-perfil' src='./user/imagens_perfil/$projeto[img_profile]' alt=''>
                                <h5 class='nome'>$projeto[nome] </h5>
                                <h5>$projeto[nome_projeto] </h5>
                                <i class='fas fa-thumbs-up'></i> $projeto[likes]
                         </div>
                </div>";
                }
              } //fim do if geral
             
              if($categoria_selecinada == true){
                $sql_listar = "select id_projeto, nome, nome_projeto,img_profile,img_url,likes from  projeto inner join usuario on projeto.id_usuario = usuario.id where projeto.categoria = '$categoria'";
                $projetos =  mysqli_query($connection,$sql_listar);
                //categorias
                while($projeto = mysqli_fetch_array($projetos)){
              echo " <div class='col-md-3 projeto-container'>
                                <a href=./user/vizualiza_projeto.php?id=$projeto[id_projeto]>
                                    <div class='projeto'>
                                        <img class='img-projeto' src='./user/imagens_projetos/$projeto[img_url]' alt=''>
                                    </div>
                                </a>
                            
                        <div class='dados-projeto'>   
                            <img class='img-perfil' src='./user/imagens_perfil/$projeto[img_profile]' alt=''>
                                <h5 class='nome'>$projeto[nome] </h5>
                                <h5>$projeto[nome_projeto] </h5>
                                <i class='fas fa-thumbs-up'></i> $projeto[likes]
                         </div>
                </div>";
              }
            } //fim if categoria 
                  
            ?>
               
        </div>
    </div> <!--fim container principal-->
    


<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>