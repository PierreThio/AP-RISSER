<?php
require("back-end/editeur.php");



function modifierQuestion()
{
    if (!isset($_POST["submit"]))
    {
        return;
    }
    $pdo = getDatabaseConnexion();
    // Insertion de la question dans la base de données
    $sql = "UPDATE question 
        SET LIBELLE = :libelle,  
        ENJEU = :commentaire,  
        IDTYPEQUESTION = :etat,
        IDSCOREFERMEE = :scoreferme, 
        IDSCORECH = :scoreech
        WHERE IDQUESTION = :idsaisi";

    // Assignation des valeurs aux paramètres de la requête préparée
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idsaisi', $_POST["idsaisi"],PDO::PARAM_INT);
    $stmt->bindParam(':libelle', $_POST["libelle"],PDO::PARAM_STR);
    $stmt->bindParam(':commentaire', $_POST["commentaire"],PDO::PARAM_STR);
    $stmt->bindParam(':etat', $_POST["etat"],PDO::PARAM_INT);
    $stmt->bindParam(':scoreferme', $_POST["scoreferme"],PDO::PARAM_INT);
    $stmt->bindParam(':scoreech', $_POST["scoreech"],PDO::PARAM_INT);
    $stmt->execute();
    header("Location: editeur.php");
    
    
}

