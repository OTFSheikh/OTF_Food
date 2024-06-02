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
        require_once 'include/start_bdd.php';
        $req = $bdd->prepare("SELECT * FROM recette");
        $res = $req->execute();
        $nbre = $req->rowCount();
        $recette = $req->fetchAll(PDO::FETCH_ASSOC);

        if ($res) {
            if ($nbre==0) {
                echo "<br>Pas de recette dans la base";
            }else {
                function auteur($id){
                    $bdd = new PDO("mysql:host=localhost;dbname=otf_food","root","");
                    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $req1 = $bdd->prepare("SELECT username from user where iduser=:id ");
                    $req1->bindValue(':id', $id);
                    

                    $req1->execute();
                    $result = $req1->fetch();

                    return $result['username'];
                    
                }
                
                // echo "<pre>";
                // print_r($recette);
                foreach ($recette as $key => $value) {
                    ?><div class="recette">
                        <h3><?=$value['nom']?></h3>
                    <table>
                        <tr><td>Ingredients :</td><td><?=$value['ingredient']?></td></tr>
                        <tr><td>Etapes :</td><td><?=$value['etape']?></td></tr>
                        <tr><td>Auteur :</td><td><?=auteur(intval($value['iduser']))?></td></tr>
                        <tr><td>Like :</td><td><?=$value['nbrelike']?></td></tr>
                        
                        <tr><td><a href="include/liker.php?id=<?=$value['idrecette']?>&nbre=<?=$value['nbrelike']?>"><button>liker la recette</button></a></td></tr>

                    </table>
                    </div>
                    
                    <?php
                    
                }
            }
        }
    }else {
        header("location:connexion.php");
    }

    ?>
</body>
</html>