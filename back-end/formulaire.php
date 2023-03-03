<?php
function getDatabaseConnexion()
{
    require("authentification-bdd.php");
    try {
        $db = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        return $db;
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage() . '</br/>';
        die();
    }
}
function getOrigins()
{
    $conn = getDatabaseConnexion();
    $request = "SELECT origine.IDORIGINE, origine.NOM FROM origine";
    $statement = $conn->query($request);
    $origins = $statement->fetchAll(PDO::FETCH_UNIQUE);
    return $origins;
}
function createSonde()
{
    if (isset($_POST["submit"])) {
        $conn = getDatabaseConnexion();
        $request = "INSERT INTO sonde(IDORIGINE, ANNEE, SEXE) VALUES (" . $_POST["origin"] . ", " . date("Y") . ", '" . $_POST["sexe"] . "')";
        $conn->query($request);
        $idSonde = $conn->lastInsertId();
        $_SESSION["id"] = $idSonde;
        header("Location: index.php");
    }
}
