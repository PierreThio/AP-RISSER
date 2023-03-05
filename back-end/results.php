<?php

function getDatabaseConnexion()
{
    require("utilisateur-bdd.php");
    try {
        $db = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        return $db;
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage() . '</br/>';
        die();
    }
}

function getNotice()
{
    $conn = getDatabaseConnexion();
    $request = "SELECT avis.TITRE, avis.PARAG1, avis.PARAG2, avis.PARAG3 FROM avis WHERE avis.IDAVIS = " . $_GET["avis"];
    $statement = $conn->query($request);
    $notice = $statement->fetch(PDO::FETCH_ASSOC);
    return $notice;
}
