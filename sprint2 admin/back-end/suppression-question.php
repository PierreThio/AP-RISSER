<?php
require ('back-end/editeur.php');



function suppressionQuestion()
{
    if (!isset($_POST["submit"]))
    {
        return;
    }
    $pdo = getDatabaseConnexion();
    // Insertion de la question dans la base de données
    $sql = "DELETE FROM question WHERE IDQUESTION = :idsaisi"; 

    // Assignation des valeurs aux paramètres de la requête préparée
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idsaisi', $_POST["idsaisi"],PDO::PARAM_INT);
    $stmt->execute();
    header("Location: editeur.php");
    
    
}





