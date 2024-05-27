<?php


if (isset($_POST['valider'])) {
    if (empty($_POST['username'])) {
        $message = "Entrer un username valide";
    }elseif (empty($_POST['mdp'])) {
        $message = "Entrer un mot de passe valide";
    }else{
        $username = $_POST['username'];
        $mdp = $_POST["mdp"];

        require_once 'include/start_bdd.php';
        $req0 = $bdd->prepare("SELECT * FROM user WHERE username=:username");
        $req0->bindValue(":username", $username);
        $req0->execute();
        $row = $req0->rowCount();
        $res = $req0->fetch(PDO::FETCH_ASSOC);

        if ($row!=1) {
            $message = "Entrer un username valide";
        }else {
            $mdpvalide = $res['mdp'];
            // echo $mdp;

            $mdpverif = password_verify($mdp,$mdpvalide);

            if (!$mdpverif) {
                $message = "Le mot de passe ne correspond pas";
            }else{
                if ($res['valide']==1) {
                    $message = "connecté";
                }else {
                    $token = $res['token'];
                    $email = $res['email'];
                require_once "include/sendmail_connec.php";

                }
            }
        }
    }
}