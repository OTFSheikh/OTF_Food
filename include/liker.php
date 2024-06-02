<?php

session_start();
if ($_GET && isset($_SESSION["id"])) {
    $id = $_GET['id'];
    $nbre = $_GET["nbre"] +1;
    require_once ("start_bdd.php");
    $req = $bdd->prepare("UPDATE recette SET nbrelike=:nbre where idrecette=:id");
    $req->bindValue(":nbre", intval($nbre));
    $req ->bindValue(":id",intval($id));

    $res=$req->execute();
    if ($res) {
        header('location:../accueil.php');
    }
}