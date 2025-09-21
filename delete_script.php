<?php

include "connect.php";

if (!isset($_POST["disc_id"])){
    header("Location: index.php");
    exit;
}

$id= $_POST["disc_id"];

// Récupérer et supprimer l'image
$sql = "SELECT disc_picture FROM disc WHERE disc_id=?";
$requete = $dbco->prepare($sql);
$requete->execute([$id]);
$disc = $requete->fetch(PDO::FETCH_ASSOC);

if ($disc && !empty($disc['disc_picture'])) {
    $filePath = __DIR__ . "/jaquettes/" . $disc['disc_picture'];
    if (file_exists($filePath)) {
        unlink($filePath);
    }
}

//Supprimer le disque
$sql2= "DELETE FROM disc WHERE disc_id=?";
$requete= $dbco->prepare($sql2);
$requete->execute(array($id));

//Retour à la page d'accueil
header("Location: index.php");
exit;

?>