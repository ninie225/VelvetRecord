<?php

include "connect.php";

$discID= $_POST["disc_id"];
$title= $_POST["title"];
$artistID= $_POST["artist"];
$year= $_POST["year"];
$genre= $_POST["genre"];
$label= $_POST["label"];
$price= $_POST["price"];

$sql="UPDATE disc 
    SET disc_title=?, disc_year=?, disc_label=?, disc_genre=?, disc_price=?
    WHERE disc_id=?" ;

$requete=$dbco->prepare($sql);
$requete->execute(array($title, $year, $label, $genre, $price, $artistID, $discID));


// Si une nouvelle image est envoyée
if (!empty($_FILES["picture"]["name"])) {
    $picture = $_FILES["picture"]["name"];
    $picture_tmp = $_FILES["picture"]["tmp_name"];

    // On déplace le fichier dans le dossier jaquettes
    move_uploaded_file($picture_tmp, "jaquettes/$picture");

    // On met à jour uniquement l’image
    $sql2 = "UPDATE disc 
            SET disc_picture=? 
            WHERE disc_id=?";
    $requete2 = $dbco->prepare($sql2);
    $requete2->execute([$picture, $discID]);
}

header("Location: index.php");
?>

