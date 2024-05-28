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
    <title>Connexion</title>
</head>
<body>
<?php require_once "include/connec.php"?>

    <h3>Bienvenue sur notre App de partage de recette</h3>
    <h5>Connectez-Vous avec ce formulaire ci-dessous</h5>

    <form action="connexion.php" method="post">
        <table>
            <tr><td>Username : </td><td><input type="text" name="username" id="username"></td></tr>
            <tr><td>Mot de passe : </td><td><input type="password" name="mdp" id="mdp"></td></tr>
            <tr><td><input type="submit" value="Me connecter" name="valider" style="margin-right: 15px;"></td><td><a href="inscription.php">Je n'ai pas de compte</a></td></tr>
        </table>
        <?php
        if (isset($message)) {
            echo "<br>".$message;
        }
        ?>
    </form>
</body>
</html>
<?php
}
?>