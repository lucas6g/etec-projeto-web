

$(document).ready(function(e){
    e.preventDefault()
   
    $("#cadastrar").click(function(){
        alert('voce clicou em cadastrar')
        var nome = $('#nome').val()
        var email = $('#email').val() 
        var senha = $('#senha').val() 
        var whatsapp = $('#whatsapp').val() 

        var validar = true 

        if(nome == ""){
            validar = false
            $("#erroNome").html('*O Campo nome é Obrigatorio')
        }else{
            $("#erroNome").html("")
        }

        if(email == ""){
            validar = false
            $("#erroEmail").html('* O Campo Email é Obrigatorio')
        }else{
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
            $("#erroWhats").html('* O Campo Senha é Obrigatorio')
        }else{
            $("#erroWhats").html("")
        }

    })
})