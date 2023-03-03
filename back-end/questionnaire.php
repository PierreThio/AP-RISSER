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
    $request = "SELECT question.IDQUESTION, question.LIBELLE, question.IDTYPEQUESTION, question.IDSCOREFERMEE, question.IDSCORECH, scorefermee.REP, scorefermee.SCOREFRES, scorefermee.SCOREFDEV, scorech.NBPTMULTRES, scorech.NBPTMULTDEV FROM question, scorefermee, scorech WHERE question.IDSCOREFERMEE = scorefermee.IDSCOREF AND question.IDSCORECH = scorech.IDSCORECH";
    $statement = $conn->query($request);
    $question = $statement->fetchAll(PDO::FETCH_CLASS);
    return $question;
}
function getResults(){
    $conn = getDatabaseConnexion();
    $request = "SELECT SUM(VALEURRES) AS TOTALRES, SUM(VALEURDEV) AS TOTALDEV FROM reponseassociee WHERE IDSONDE =".$_SESSION['id'];
    $resultStatement = $conn->query($request);
    $result = $resultStatement->fetch(PDO::FETCH_ASSOC);
    $request = "SELECT avis.IDAVIS, avis.REP, avis.BORNEINF, avis.BORNESUP FROM avis";
    $noticesStatement = $conn->query($request);
    $notices = $noticesStatement->fetchAll(PDO::FETCH_CLASS);
    foreach($notice as $notices){
        if($notice->REP == 1 && $notice->BORNEINF <= $result["TOTALDEV"] && $notice->BORNSUP >= $result["TOTALDEV"]){
            header("Location: ../results.php?id=".$notice->IDAVIS);
        }
        if($notice->REP == 2 && $notice->BORNEINF <= $result["TOTALRES"] && $notice->BORNESUP >= $result["TOTALRES"]){
            header("Location: ../results.php?id=".$notice->IDAVIS);
        }
        if($notice->REP == 3 && $notice->BORNEINF <= $result["TOTALRES"] && $notice->BORNESUP >= $result["TOTALRES"] && $notice->BORNEINF <= $result["TOTALDEV"] && $notice->BORNESUP >= $result["TOTALDEV"]){
            header("Location: ../results.php?id=".$notice->IDAVIS);
        }
    }
    
}
function createResults(){
    if(!isset($_POST["submit"])){
        return;
    }
    $conn = getDatabaseConnexion();
    $questions = getQuestions();
    foreach($questions as $question){
        if($question->IDSCOREFERMEE != 1 && $_POST[$question->IDQUESTION] == $question->REP){
            $request = "INSERT INTO reponseassociee(IDQUESTION, IDSONDE, VALEURRES, VALEURDEV) VALUES (".$question->IDQUESTION.", ".$_SESSION['id'].", ".$question->SCOREFRES.", ".$question->SCOREFDEV.")";
            $statement = $conn->query($request);
        }
        if($question->IDSCORECH != 1){
            $request = "INSERT INTO reponseassociee(IDQUESTION, IDSONDE, VALEURRES, VALEURDEV) VALUES (".$question->IDQUESTION.", ".$_SESSION['id'].", ".$question->NBPTMULTRES*$_POST[$question->IDQUESTION].", ".$question->NBPTMULTRES*$_POST[$question->IDQUESTION].")";
            $statement = $conn->query($request);
        }
    }
    getResults();
}