<?php

include "connect.php";

if (!isset($_POST["disc_id"])){
    header("Location: index.php");
    exit;
}

$id= $_POST["disc_id"];

//Supprimer le disque
$sql= "DELETE FROM disc WHERE disc_id=?";
$requete= $dbco->prepare($sql);
$requete->execute(array($id));

//Retour à la page d'accueil
header("Location: index.php");
exit;

?>