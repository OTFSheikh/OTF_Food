<title>Modification</title>
<?php

session_start();

if ($_GET && isset($_SESSION["id"])) {
    $id = $_GET['id'];
    $nom = $_GET['nom'];
    $ing = $_GET['ing'];
    $etape = $_GET['etape'];
    if (isset($_POST["modifier"])) {
        if (!empty($_POST['nom']) || !empty($_POST['ing']) || !empty($_POST['etape'])) {
            require_once 'start_bdd.php';

            $req = $bdd->prepare("UPDATE recette set nom=:nom, ingredient=:ing, etape=:etape where idrecette=:id");

            $req->bindValue(":nom", $_POST["nom"]);
            $req->bindValue(":ing", $_POST["ing"]);
            $req->bindValue(":etape", $_POST["etape"]);
            $req->bindValue(":id", $id);
            $res = $req->execute();

            if (!$res) {
                $message="erreur de connexion a la base";
            }else {
                header("location:../recette.php");

            }
        }else {
            $message="tous les champs sont requise";
            
        }
    }
    ?>
    <a href="../recette.php">Mes recettes</a>
    <h3>Bienvenue sur notre App de partage de recette</h3>
    <h5>modifier vos recettes sur cette page</h5>
    <form action="" method="post">
        <table>
            <tr><td>Nom : </td><td><input type="text" name="nom" id="nom" value="<?=$nom?>"></td></tr>
            <tr><td>Ingredients : </td><td><input type="text" name="ing" value="<?=$ing?>" id="ing" ></td></tr>
            <tr>
                <td>Etapes : </td><td><textarea name="etape" id="etape" rows="8" style="width:165px ;height:30px"> <?=$etape?></textarea></td>
            </tr>
            <tr><td><input type="submit" value="Modifier" name="modifier"></td></tr>
        </table>
        <?php
    if (isset($message)) {
        echo "<br>".$message;
    }
    ?>
    </form>
<?php
}else {
    header("location:../contact.php");
}