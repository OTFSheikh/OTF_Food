<?php
session_start();
if (isset($_SESSION["id"])) {
    session_unset();
    session_destroy();
    header("location:../connexion.php");
}else {
    header("location:../connexion.php");
}