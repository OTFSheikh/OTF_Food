<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<body>
    

    <?php
    if (isset($_SESSION["id"])) {
        ?>
        <h3>Bienvenue sur notre App de partage de recette</h3>
        <h5>Gérez vos informations sur cette page</h5>
        <a href="include/deconnexion.php">Me déconnecter</a>
        <?php 
        
        $id = $_SESSION["id"];
        require_once "include/start_bdd.php";
        $req = $bdd->prepare("SELECT * FROM user WHERE iduser=:id");
        $req->bindValue(":id", $id);
        $res = $req->execute();
        if (!$res) {
            echo "Erreur";
        }else {
            $user = $req->fetch(PDO::FETCH_ASSOC);
            ?>
            <table>
                <tr><td>Votre username : </td><td><?=$user['username']?></td></tr>
                <tr><td>Votre email : </td><td><?=$user['email']?></td></tr>
                <tr><td><a href="form_modif.php"><button>Modifier Mon Compte</button></a></td><td><a href="delcompte.php"><button>Supprimer Mon Compte</button></a></td></tr>
            </table>
            <?php
        }
        
    }else {
        header("location:connexion.php");
    }

    ?>
</body>
</html>