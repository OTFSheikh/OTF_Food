<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <?php
    if (isset($_SESSION["id"])) {
        ?>
        <a href="profil.php">Mon Profil</a>
        <a href="recette.php">Mes Recettes</a>
    <?php
    }else {
        header("location:connexion.php");
    }

    ?>
</body>
</html>