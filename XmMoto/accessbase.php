<?php
$host = "localhost";
$db = "photo4you";
$user = "root";
$pw = "";
// Connection à la base de données avec test si il y a une erreur
try
{
    $dbh = new PDO("mysql:host = $host ; port=3306 ,dbname = $db;charset=utf8",$user,$pw);
    // Pour afficher les erreurs
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (Exception $e)
{
     die('Erreur : ' . $e->getMessage());
}
?>