<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h3>Bienvenue sur notre App de partage de recette</h3>
    <h5>Incrivez-Vous avec ce formulaire ci-dessous</h5>

    <form action="inscription.php" method="post">
        <table>
            <tr><td>Username : </td><td><input type="text" name="username" id="username"></td></tr>
            <tr><td>Email : </td><td><input type="email" name="email" id="email"></td></tr>
            <tr><td>Mot de passe : </td><td><input type="text" name="mdp" id="mdp"></td></tr>
            <tr><td>Confirmer le Mot de passe : </td><td><input type="text" name="mdp2" id="mdp2"></td></tr>
            <tr><td><input type="submit" value="Valider" name="valider" style="margin-right: 15px;"><input type="reset" value="Effacer"></td><td><a href="connexion.php">J'ai deja un compte</a></td></tr>
        </table>
    </form>
</body>
</html>