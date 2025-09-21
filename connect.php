<?php
$servname='localhost';
$dbname='record';
$user='root';
$pass= 'Afpa1234';

try {
    $dbco= new PDO("mysql::host=$servname; dbname=$dbname", $user, $pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

?>
