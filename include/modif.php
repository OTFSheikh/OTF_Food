<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['valider'])) {
        if (empty($_POST['username']) || !preg_match('/[a-zA-Z0-9]+/',$_POST["username"])) {
            $message = "Entrer un username valide";
        } elseif (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $message = "Entrer un email valide";
        }else {
            require_once 'include/start_bdd.php';

            // Verifier le username
            $req0 = $bdd->prepare("SELECT * FROM user WHERE username=:username");
            $req0->bindValue(":username", $_POST["username"]);
            $req0->execute();
            $res0 = $req0->fetch(PDO::FETCH_ASSOC);
            $r0 = $req0->rowCount();

            // Verifier l'email
            $req2 = $bdd->prepare("SELECT * FROM user WHERE email=:email");
            $req2->bindValue(':email', $_POST["email"]);
            $req2->execute();
            $res2 = $req2->fetch(PDO::FETCH_ASSOC);
            $r2 = $req2->rowCount();

            if ($res0 && $res0["username"]!=$_SESSION['username']) {
                $message = 'Le username est déjà utilisé';
            }elseif ($res2 && $res2["email"]!=$_SESSION['email']) {
                $message = 'L\'email est déjà utilisé';
            }else {
                $req = $bdd->prepare("UPDATE user set username=:username, email=:email WHERE iduser=:id");
                $req->bindValue(":username", strip_tags($_POST["username"]));
                $req->bindValue(":email", strip_tags($_POST["email"]));
                $req->bindValue(":id", $_SESSION["id"]);

                $res = $req->execute();

                if (!$res) {
                    $message = "Une erreur s'est produite";
                } else {
                    $message = "Vos informations ont été modifiées";
                }
            }
        }
}