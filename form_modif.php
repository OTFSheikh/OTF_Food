<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification</title>
</head>
<body>
    <?php require_once "include/modif.php"?>

    <?php
    if (isset($_SESSION["id"])) {
        $id = $_SESSION["id"];
        require_once "include/start_bdd.php";
        $req = $bdd->prepare("SELECT * FROM user WHERE iduser=:id");
        $req->bindValue(":id", $id);
        $res = $req->execute();
        $user=$req->fetch(PDO::FETCH_ASSOC);
        ?>
        <a href="profil.php">Mon Profil</a>
        <h3>Bienvenue sur notre App de partage de recette</h3>
        <h5>Modifiez vos informations avec le formulaire ci-dessous</h5>

        <form action="form_modif.php" method="post">
            <table>
                <tr><td>Username : </td><td><input type="text" name="username" id="username" value="<?=$user["username"]?>" size="25"></td></tr>
                <tr><td>Email : </td><td><input type="text" name="email" id="email" value="<?=$user["email"]?>" size="25"></td></tr>
                <tr><td>Mot de passe : </td><td><input type="password" name="mdp" id="mdp"  size="25"></td></tr>
                <tr><td></td><td>Laisser vide si vous ne voulez pas changer de mot de passe.</td></tr>
                <tr><td><input type="submit" value="Modifier" name="valider"></td></tr>
            </table>
            <?php
        if (isset($message)) {
            echo "<br>".$message;
        }
        
        ?>
        </form>

        <?php 
    }else {
        header("location:connexion.php");
    }

    ?>
</body>
</html>