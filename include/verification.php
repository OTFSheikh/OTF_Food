<?php
require_once 'start_bdd.php';
if ($_GET) {
    if (isset($_GET["email"])) {
        $email = $_GET["email"];
    }
    if (isset($_GET["token"])) {
        $token = $_GET["token"];
    }

    if (!empty($email) && !empty($token)) {
        $req = $bdd->prepare("SELECT * FROM user WHERE email=:email AND token=:token");

        $req-> bindValue(":email", $email);
        $req-> bindValue(":token", $token);

        $req->execute();
        $nbre= $req->rowCount();

        if ($nbre==1) {
            $req1 = $bdd->prepare("UPDATE user SET valide=1 WHERE email=:email");
            $req1-> bindValue(":email", $email);
            $resultat = $req1->execute();

            if ($resultat) {
                echo "<script type=\"text/javascript\">alert('Votre email est verifié. Connectez-Vous !');document.location.href='http://localhost/otf_food/connexion.php'</script>";
            }
            

        }

    }
}