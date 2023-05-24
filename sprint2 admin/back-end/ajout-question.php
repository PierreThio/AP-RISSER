<?php
require("back-end/editeur.php");



function ajouterQuestion()
{
    if (!isset($_POST["submit"]))
    {
        return;
    }
    $pdo = getDatabaseConnexion();
    // Insertion de la question dans la base de données
    $sql = "INSERT INTO question (LIBELLE, ENJEU,IDTYPEQUESTION, IDSCOREFERMEE, IDSCORECH)
            VALUES (:libelle, :commentaire, :etat, :scoreferme, :scoreech)";

    // Assignation des valeurs aux paramètres de la requête préparée
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':libelle', $_POST["libelle"],PDO::PARAM_STR);
    $stmt->bindParam(':commentaire', $_POST["commentaire"],PDO::PARAM_STR);
    $stmt->bindParam(':etat', $_POST["etat"],PDO::PARAM_INT);
    $stmt->bindParam(':scoreferme', $_POST["scoreferme"],PDO::PARAM_INT);
    $stmt->bindParam(':scoreech', $_POST["scoreech"],PDO::PARAM_INT);
    $stmt->execute();
    header("Location: editeur.php");
    
    
}














