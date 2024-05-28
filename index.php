<?php
    session_start();
    if(isset($_SESSION['id'])){
        header('Location:accueil.php');
    }else{
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTF FOOD</title>
</head>
<body>
    <a href="inscription.php">M'inscrire</a>
    <a href="connexion.php">Me Connecter</a>
</body>
</html>
<?php
    }
?>