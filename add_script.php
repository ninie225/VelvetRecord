<?php
include "connect.php";

$title = $_POST["title"];
$artistID = $_POST["artist"];
$year = $_POST["year"];
$genre = $_POST["genre"];
$label = $_POST["label"];
$price = $_POST["price"];

$picture = $_FILES["picture"]["name"];
$picture_tmp = $_FILES["picture"]["tmp_name"];

move_uploaded_file($picture_tmp, "jaquettes/$picture");

$sql= "INSERT INTO disc (disc_title, disc_year, disc_picture, disc_label, disc_genre, disc_price, artist_id) VALUES (?, ?, ?, ?, ?, ?, ?)";

$requete= $dbco->prepare($sql);
$requete->execute(array($title, $year, $picture, $label, $genre, $price, $artistID));

header("Location: index.php");

?>
