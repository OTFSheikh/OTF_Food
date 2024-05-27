<?php

$bdd = new PDO("mysql:host=localhost;dbname=otf_food","root","");
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
