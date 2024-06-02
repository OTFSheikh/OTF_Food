<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recettes</title>
</head>
<body>
    <?php
    if (isset($_SESSION["id"])) {
        $id=$_SESSION['id'];
        if (isset($_POST['ajouter'])) {
            if (!empty($_POST['nom']) || !empty($_POST['ing']) || !empty($_POST['etape'])) {
                require_once 'include/start_bdd.php';
                $req = $bdd->prepare("INSERT INTO recette(nom, ingredient, etape, nbrelike, iduser) Values(:nom, :ingredient, :etape, :nbrelike, :iduser)");
                $req->bindValue(":nom",strip_tags($_POST['nom']));
                $req->bindValue(":ingredient",strip_tags($_POST['ing']));
                $req->bindValue(":etape",strip_tags($_POST['etape']));
                $req->bindValue(":nbrelike",0);
                $req->bindValue(":iduser",$id);

                $res = $req->execute();

                if (!$res) {
                    $message="Erreur de connexion à la base";
                }else {
                    $message="Votre recette a été ajouté";
                }
            }else {
                $message = "Tous les champs sont requis";
            }
        }


        ?>
        <a href="accueil.php">Accueil</a>
        <h3>Bienvenue sur notre App de partage de recette</h3>
        <h5>Gérez vos recettes sur cette page</h5>
        <form action="recette.php" method="post">
            <table>
                <tr><td>Nom : </td><td><input type="text" name="nom" id="nom"></td></tr>
                <tr><td>Ingredients : </td><td><input type="text" name="ing" id="ing"></td></tr>
                <tr>
                    <td>Etapes : </td><td><textarea name="etape" id="etape" rows="8" style="width:165px ;height:30px"></textarea></td>
                </tr>
                <tr><td><input type="submit" value="Ajouter" name="ajouter"></td></tr>
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