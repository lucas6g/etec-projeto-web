<?php
    session_start();

?>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    
    
    <!-- fonte awesome cdn -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    
    <!-- estilo do boot -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <link rel="stylesheet" href="../css/login.css">

  

    <title>Login</title>
    </head>
    <body>
     
      
      <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-sm-6 col-md-3">
                <form class="form-container" action="login.act.php"  method="POST" >
                    <?php 
                          if(isset($_SESSION['nao_autenticado'])){
                            echo  " <p> Usuario ou senha invalidos</p> ";

                          }
                         
                            echo  " <p> Digite o email e senha  </p> ";
                      
                          unset($_SESSION['nao_autenticado']);
                    ?>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                        <span id="erroEmail"></span>
                        <span id="resposta"></span>
                    
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha">
                        <span id="erroSenha"></span>

                    </div>
                    <button id="login" name="login"  class="btn btn-primary btn-block">Login</button>

                </form>
             </div>
          </div>
          
        </div>
        
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
         
  
  
             
        <script>
            
            $("#login").click(function(e){
                
                var email = $('#email').val() 
                var senha = $('#senha').val()
                
                var validar = true 
                  if(email == "" ){
                      validar = false
                      $("#erroEmail").html('* O Campo Email é Obrigatorio')
                  }
                      
                  else{
                      $("#erroEmail").html("")
                  }

                  if(senha == ""){
                      validar = false
                      $("#erroSenha").html('* O Campo Senha é Obrigatorio')
                  }else{
                      $("#erroSenha").html("")
                  }
               
                    if(validar == false){
                        e.preventDefault()
                    }
              
        })
              
        </script>
  

      </body>
      </html>