<?php

session_start();

if ($_GET && isset($_SESSION['id'])) {
    $id=$_GET['id'];
    require_once 'start_bdd.php';

    $req = $bdd->prepare("DELETE FROM recette where idrecette=:id");
    $req->bindvalue(":id", $id);
    $req->execute();
    header("location:../recette.php");
}else {
    header("location:../contact.php");
}