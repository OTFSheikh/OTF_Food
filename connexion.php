<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h3>Bienvenue sur notre App de partage de recette</h3>
    <h5>Connectez-Vous avec ce formulaire ci-dessous</h5>

    <form action="connexion.php" method="post">
        <table>
            <tr><td>Username : </td><td><input type="text" name="username" id="username"></td></tr>
            <tr><td>Mot de passe : </td><td><input type="text" name="mdp" id="mdp"></td></tr>
            <tr><td><input type="submit" value="Valider" name="valider" style="margin-right: 15px;"></td><td><a href="inscription.php">Je n'ai pas de compte</a></td></tr>
        </table>
    </form>
</body>
</html>