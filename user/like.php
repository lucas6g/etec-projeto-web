<?php
    include('../config/db.php');

    $like = $_POST['liked'];
    $id_projeto = $_POST['id_projeto'];
    
   
    $sql = "update projeto set likes = likes+'$like' where id_projeto = '$id_projeto'";
   
    $res = mysqli_query($connection,$sql);
    if($res){
        echo true;
    }

?>