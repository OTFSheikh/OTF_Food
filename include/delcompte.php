<?php


session_start();
if(isset($_SESSION["id"])){
    echo "<script>alert('Votre compte sera supprimé si vous validez. Retourner à votre profil si vous ne voulez pas supprimé le compte.');window.location.href = 'supprime.php'; </script>";

   
}else {
    header("location:connexion.php");
}