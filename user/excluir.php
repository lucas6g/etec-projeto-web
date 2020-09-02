<?php
$id_projeto = $_GET['id_projeto'];

include('../config/db.php');
$res = mysqli_query($connection,"select  img_url  from projeto where id_projeto = '$id_projeto'");
$projeto = mysqli_fetch_array($res);
$nome_imagem = $projeto['img_url'];

unlink('imagens_projetos/'.$nome_imagem);

$resposta = mysqli_query($connection,"delete from projeto where id_projeto = '$id_projeto'");
if($resposta){
   echo '<script>
           window.location.href="perfil_usuario.php" 
   </script>';
}
?>