<?php
session_start();
if (isset($_SESSION['id'])) {
    header('Location:accueil.php');
}else {
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
<?php require_once "include/inscrit.php"?>

    <h3>Bienvenue sur notre App de partage de recette</h3>
    <h5>Incrivez-Vous avec ce formulaire ci-dessous</h5>

    <form action="inscription.php" method="post">
        <table>
            <tr><td>Username : </td><td><input type="text" name="username" id="username"></td></tr>
            <tr><td>Email : </td><td><input type="email" name="email" id="email"></td></tr>
            <tr><td>Mot de passe : </td><td><input type="password" name="mdp" id="mdp"></td></tr>
            <tr><td>Confirmer le mot de passe : </td><td><input type="password" name="mdp2" id="mdp2"></td></tr>
            <tr><td><input type="submit" value="M'inscrire" name="valider" style="margin-right: 15px;"><input type="reset" value="Effacer"></td><td><a href="connexion.php">J'ai deja un compte</a></td></tr>
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