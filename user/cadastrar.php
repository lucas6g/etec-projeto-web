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
    
    <link rel="stylesheet" href="../css/cadastrar.css">

  

    <title>Cadastrar</title>
    </head>
    <body>
     
      
      <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
          <div class="col-12 col-sm-12 col-md-3">
            <form class="form-container" name="Form1" action="cadastrar.act.php"  method="POST" enctype="multipart/form-data" >
              
              <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" >
                
                <span id="erroNome"></span>
              </div>
              <div class="form-group">


                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email">
                  <span id="erroEmail"></span>
                 <?php  
                    if(isset($_SESSION['email_existe'])){
                    echo "<p>Esse email já está em uso </p>";
                    }
                    unset($_SESSION['email_existe']);
                 ?>
                  
                </div>
                <div class="form-group">
                  <label for="senha">Senha</label>
                  <input type="password" class="form-control" id="senha" name="senha">
                  
                  <span id="erroSenha"></span>
                </div>
                <div class="form-group">
                  <label for="whatsapp">Whatsapp</label>
                  <input type="text" placeholder="ex (11) 9xxxx-xxxx" class="form-control" id="whatsapp" name="whatsapp">
                  
                  <span id="erroWhats"></span>
                </div>
                
                
                <div class="form-input">
                  <label for="file-ip-1">Escolha uma Imagem de perfil</label>
                  <input type="file" id="file-ip-1" name="ARQUIVO" accept="image/*" onchange="showPreview(event);">
                  <div class="preview">
                    <img id="file-ip-1-preview">
                  </div>
                </div>
                <span id="erroImagem"></span>
                

                <button id="cadastrar" name="cadastrar" class="btn btn-primary btn-block">Cadastrar</button>
              </form>
            </div>
          </div>
          
        </div>
        
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
         
             
        <script>
          
          $("#cadastrar").click(function(e){
           
                 var validar = true 
                  var nome = $('#nome').val()
                  var email = $('#email').val() 
                  var senha = $('#senha').val() 
                  var whatsapp = $('#whatsapp').val() 

                  if(nome == ""){
                      validar = false
                      $("#erroNome").html('*O Campo nome é Obrigatorio')
                  }else{
                      $("#erroNome").html("")
                  }

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
                  if(whatsapp == ""){
                      validar = false
                      $("#erroWhats").html('* O Campo Whatsapp é Obrigatorio')
                  }else{
                      $("#erroWhats").html("")
                }

                if(document.Form1.ARQUIVO.value == ""){
                        validar = false
                        $("#erroImagem").html('* A escolha da imagem é Obrigatoria')
                    }else{
                        $("#erroImagem").html("")
                    }

                if(validar == false ){
                  e.preventDefault()
                }

        })

       

              
        </script>

        <script src="../js/input_file.js"></script>
  

      </body>
      </html>