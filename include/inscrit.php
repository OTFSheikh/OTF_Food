<?php

if (isset($_POST['valider'])) {
    if (empty($_POST['username']) || !preg_match('/[a-zA-Z0-9]+/',$_POST["username"])) {
        $message = "Entrer un username valide";
    } elseif (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $message = "Entrer un email valide";
    }elseif(empty($_POST['mdp']) || $_POST['mdp'] != $_POST['mdp2']){
        $message = "Entrer un mot de passe valide";
    }else {
        require_once 'include/start_bdd.php';

// Verifier le username
        $req0 = $bdd->prepare("SELECT * FROM user WHERE username=:username");
        $req0->bindValue(":username", $_POST["username"]);
        $req0->execute();
        $result0 = $req0->fetch();
        
// Verifier l'email
        $req2 = $bdd->prepare("SELECT * FROM user WHERE email=:email");
        $req2->bindValue(':email', $_POST["email"]);
        $req2->execute();
        $result2 = $req2->fetch();
        if ($result0) {
            $message = 'Le username est déjà utilisé';
        }elseif($result2){
            $message = 'L\'email est déjà utilisé';
        }else{
            function token_gen($nbre=20) {
                    $strg="0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
                    $token='';
                    for ($i=0; $i < $nbre; $i++) { 
                        $token .= $strg[rand(0, strlen($strg) - 1)];
                    }
                    return $token;
            }

                $token=token_gen();
                
            $req1 = $bdd->prepare("INSERT INTO user(username, email, mdp,token) VALUES(:username, :email, :password, :token)");

            $password = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
            $username = $_POST["username"];
            $email = $_POST["email"];

            $req1->bindValue(":username", $username);
            $req1->bindValue(":email", $email);
            $req1->bindValue(":password", $password);
            $req1->bindValue(":token", $token);

            $req1->execute();
            require_once "include/sendmail.php";
        }

        
    }
}