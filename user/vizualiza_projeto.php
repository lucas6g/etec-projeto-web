<?php

    session_start();
  
 
    
  
    include('../config/db.php');
    $id_projeto = $_GET['id'];
    
    $sql_projeto = "select nome,nome_projeto,whatsapp,img_profile,img_url,tecnologias,descricao,likes from projeto inner join usuario on projeto.id_usuario = usuario.id where projeto.id_projeto = '$id_projeto'";
    $resposta =  mysqli_query($connection,$sql_projeto);
    $projeto = mysqli_fetch_array($resposta);

    $nome_usuario = $projeto['nome'];
    $nome_projeto = $projeto['nome_projeto'];
    $whats = $projeto['whatsapp'];
    $img_profile = $projeto['img_profile'];
    $img_projeto = $projeto['img_url'];
    $descricao = $projeto['descricao'];
    $tecnologias = $projeto['tecnologias'];
    $likes = $projeto['likes'];

    echo "<script>
        var id_projeto = $id_projeto
    </script>";
   
   
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
    <link rel="stylesheet" href="../css/vizualiza_projeto.css">
    <title><?php echo $nome_projeto ?></title>
   
    
</head>
<body>
    
    
    <div class="container-fluid">
        <div class="container principal ">
            <?php
            echo "
            <div class='header'>
                <div class='img-profile'>
                          <img src='imagens_perfil/$img_profile' alt=''>  
                        </div>
                        <h6>Nome Criador:$nome_usuario </h6>
                        <h6> Nome Projeto: $nome_projeto</h6>
                        <a href=''>
                            GitHub
                            <i class='fab fa-github icone'></i>
                        </a>
                        <h6 class='whats' > $whats  <i class='fab fa-whatsapp icone'></i></h6> 
                        
                        <i id='like' class='fas fa-thumbs-up icone-like'></i> $likes
                    </div>
                    
                    <div class='subheader'>
                        <div class='img-projeto' >
                            <img src='imagens_projetos/$img_projeto' alt=''>
                       </div>
                       <div class='container-descricao'>
                           <h6 class='descricao'>Descricao</h6>
                           <p class=''>$descricao </p>
                           
                           <h6 class='descricao'>Tecnologias</h6>
                           <p class=''>$tecnologias </p>

                        </div>
                        
                    </div> 
       
                    ";
                    
                    
                    ?>
                    
                </div> <!--fim container principal-->
            </div>  <!--fim container fluid-->
            
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  
    <script>
        $('#like').click(function(){
            $.ajax({
                url:'like.php',
                type:'POST',
                data:{
                    liked:1,
                    id_projeto:id_projeto,
                },
                success:function(resposta){
                        if(resposta){
                            location.reload()
                        }
                }
            })

        })
    
    </script>
    
</body>
</html>