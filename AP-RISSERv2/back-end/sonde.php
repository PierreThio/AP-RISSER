<?php
function getDtbLog(){

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
  
function getOrigins(){
  $login = getDtblog();
  $q = $login->query("SELECT NOM,IDORIGINE FROM origine");
  $origins = $q->fetchAll(PDO::FETCH_CLASS);
  return $origins;
}

function createSonde(){
  if (isset($_POST["submit"])) {

    // verif que tout les champs sont compléter
    if ($_POST["origin"] == '' OR empty($_POST["gender"])) { 
      // travail sur l'implementation d'une popup avec le message suivent 
      // Merci de bien renseigner l'ensemble des champs
      $erreuChamp = "Merci de bien renseigner l'ensemble des champs";
      return $erreuChamp;
      
    }
    else{
      
      // 
      $login = getDtbLog();
      $request = $login->query("INSERT INTO sonde(IDORIGINE, ANNEE, SEXE) VALUES (" . $_POST["origin"] . ", " . date("Y") . ", '" . $_POST["gender"] . "')");
      $idSonde = $login->lastInsertId();
      $_SESSION["id"] = $idSonde;
      header("Location: ./questionnaire.php");
    }
  } 
}

function messageInfo(){
  if (isset($erreuChamp)){
    echo "<div>";
    echo "<h1>";
    echo $erreuChamp;
    echo "</h1>";
    echo "</div>";
  }
}