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
    $request = "SELECT question.IDQUESTION, question.LIBELLE, question.IDTYPEQUESTION, question.IDSCOREFERMEE, question.IDSCORECH, scorefermee.REP, scorefermee.SCOREFRES, scorefermee.SCOREFDEV, scorech.NBPTMULTRES, scorech.NBPTMULTDEV FROM question, scorefermee, scorech WHERE question.IDSCOREFERMEE = scorefermee.IDSCOREF AND question.IDSCORECH = scorech.IDSCORECH ORDER BY question.IDQUESTION";
    $statement = $conn->query($request);
    $question = $statement->fetchAll(PDO::FETCH_CLASS);
    return $question;
}
function getResults()
{
    $conn = getDatabaseConnexion();
    $request = "SELECT SUM(VALEURRES) AS TOTALRES, SUM(VALEURDEV) AS TOTALDEV FROM reponseassociee WHERE IDSONDE =" . $_SESSION['id'];
    $statement = $conn->query($request);
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    $request = "SELECT avis.IDAVIS, avis.BORNEDEV, avis.BORNERES FROM avis";
    $statement = $conn->query($request);
    $notices = $statement->fetchAll(PDO::FETCH_CLASS);
    foreach ($notices as $notice) {
        if ($notice->BORNEDEV < $result["TOTALDEV"] || $notice->BORNEDEV == 0) {
            if ($notice->BORNERES < $result["TOTALRES"] || $notice->BORNERES == 0) {
                Header("Location: results.php?avis=" . $notice->IDAVIS);
            }
        }
    }
}
function createResults()
{
    if (!isset($_POST["submit"])) {
        return;
    }
    $conn = getDatabaseConnexion();
    $questions = getQuestions();
    foreach ($questions as $question) {
        if ($question->IDSCOREFERMEE != 1) {
            if ($_POST[$question->IDQUESTION] == $question->REP) {
                $request = "INSERT INTO reponseassociee(IDQUESTION, IDSONDE, VALEURRES, VALEURDEV) VALUES (" . $question->IDQUESTION . ", " . $_SESSION['id'] . ", " . $question->SCOREFRES . ", " . $question->SCOREFDEV . ")";
                $statement = $conn->query($request);
            } else {
                $request = "INSERT INTO reponseassociee(IDQUESTION, IDSONDE, VALEURRES, VALEURDEV) VALUES (" . $question->IDQUESTION . ", " . $_SESSION['id'] . ", 0, 0)";
                $statement = $conn->query($request);
            }
        }
        if ($question->IDSCORECH != 1) {
            $request = "INSERT INTO reponseassociee(IDQUESTION, IDSONDE, VALEURRES, VALEURDEV) VALUES (" . $question->IDQUESTION . ", " . $_SESSION['id'] . ", " . $question->NBPTMULTRES * $_POST[$question->IDQUESTION] . ", " . $question->NBPTMULTRES * $_POST[$question->IDQUESTION] . ")";
            $statement = $conn->query($request);
        }
    }
    getResults();
}