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


function getscoreslam()
{
    $conn = getDatabaseConnexion();
    $request = "SELECT SUM(reponseassociee.VALEURDEV) AS scoreslam FROM reponseassociee WHERE reponseassociee.IDSONDE = " . $_SESSION["id"];
    $statement = $conn->query($request);
    $scoreslam = $statement->fetch(PDO::FETCH_ASSOC);
    return $scoreslam;
}

function getscoreres()
{
    $conn = getDatabaseConnexion();
    $request = "SELECT SUM(reponseassociee.VALEURRES) AS scoreres FROM reponseassociee WHERE reponseassociee.IDSONDE = " . $_SESSION["id"];
    $statement = $conn->query($request);
    $scoreres = $statement->fetch(PDO::FETCH_ASSOC);
    return $scoreres;
}




    

?>

