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
    
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="../css/criar_projeto.css">
    <title>user Profile</title>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <h1 class="navbar-brand user-name" href="#">
            Mostre para o mundo Seu Projeto
        </h1>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <img class="navbar-toggler-icon " src="../img/haburger.png" alt="">
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="container nav">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Sair </a>
                    </li>
                </ul>
                <img class="img_profile" src=<?php echo "../user/imagens_perfil/$img_endereco"  ?> alt=""> 
                </div>  <!--fim container menu-->
            </div>
        </nav>

        <div class="container-fluid">
            <div class="container principal mt-4">
                  <form class="form-projeto" name="Form1" action="criar_projeto.act.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nome-projeto">Nome do Projeto</label>
                        <input type="text" class="form-control" id="nome-projeto" name="nome-projeto" >
                        
                        <span id="erroNomeProjeto"></span>
                    </div>
                    <div class="form-group">
                        <label for="descricao"  >Descrição</label>
                        <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
                        <span id="erroDescricao"></span>
                        
                    </div>

                    <div class="form-group">
                        <label for="tecnologias">Tecnologias</label>
                        <input type="text" class="form-control" id="tecnologias" name="tecnologias" >
                        
                        <span id="erroTecnologias"></span>
                    </div>
                    
                    <div class="form-group">
                        <label for="git-url">Repositorio no git hub</label>
                        <input type="text" class="form-control" id="git-url" name="git-url" >
                        
                        <span id="erroGitHub"></span>
                    </div>
                    
                    <div class="form-input">
                        <label for="file-ip-1">Escolha uma Imagem</label>
                        <input type="file" id="file-ip-1" name="ARQUIVO" value="" accept="image/*" onchange="showPreview(event);" require>
                        <div class="preview">
                            <img id="file-ip-1-preview">
                        </div>
                    </div>
                    
                    <span id="erroImagem"></span>

                    <div class="select">
                    <select name="format" id="format">
                        <option selected disabled>Escolha uma categoria </option>
                        <option value="web">Web</option>
                        <option value="mobile">Mobile</option>
                        <option value="jogos">Jogos</option>
                        <option value="desktop">Desktop</option>
                        <option value="inteligencia">Inteligencia Artificial</option>
                    </select>
                    </div>
                    <button id="criar-projeto"  name="criar-projeto" class="btn btn-primary btn-block">Criar Projeto</button>
                  </form>  
            </div>
        </div>  <!--fim conateniner principal-->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
    
    <script>
          
          $("#criar-projeto").click(function(e){
           
              var validar = true 
              var nomeProjeto = $('#nome-projeto').val()
              var descricao = $('#descricao').val()
              var tecnologias = $('#tecnologias').val() 
              var gitUrl = $('#git-url').val() 
              
              if(nomeProjeto == ""){
                  validar = false
                  $("#erroNomeProjeto").html('*O Campo nome do projeto é Obrigatorio')
                }else{
                    $("#erroNomeProjeto").html("")
                }
                
                  if(descricao == "" ){
                      validar = false
                      $("#erroDescricao").html('* O Campo Descricao é Obrigatorio')
                    }
                      
                    else{
                        $("#erroDescricao").html("")
                    }
                    
                    if(tecnologias == ""){
                        validar = false
                        $("#erroTecnologias").html('* O Campo Tecnologias é Obrigatorio')
                    }else{
                        $("#erroTecnologias").html("")
                  }
                  
                  if(gitUrl == ""){
                      validar = false
                      $("#erroGitHub").html('* O Campo Git hub é Obrigatorio')
                    }else{
                      $("#erroGitHub").html("")
                    }
                    
                    if(document.Form1.ARQUIVO.value == ""){
                        validar = false
                        $("#erroImagem").html('* A escolha da imagem é Obrigatoria')
                    }else{
                        $("#erroImagem").html("")
                    }
                    
                    if(validar === false ){
                        e.preventDefault()
                    }
                    
                })
                
                </script>

   <script src="../js/input_file.js"></script>

</body>
</html>