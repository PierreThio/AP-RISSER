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


function getQuestions()
{
    $conn = getDatabaseConnexion();
    $request = "SELECT question.IDQUESTION, question.LIBELLE FROM question ORDER BY question.IDQUESTION";
    $statement = $conn->query($request);
    $question = $statement->fetchAll(PDO::FETCH_CLASS);
    return $question;
}