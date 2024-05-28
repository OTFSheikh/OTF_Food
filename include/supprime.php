<?php

session_start();
if (isset($_SESSION["id"])) {
    include "start_bdd.php";

    $id = $_SESSION["id"];

    $req = $bdd->prepare("DELETE from user Where iduser=:id");
    $req -> bindValue(":id", $id);
    $res = $req->execute();

    if ($res) {
        session_unset();
        session_destroy();
        header("location:../index.php");
    }
}