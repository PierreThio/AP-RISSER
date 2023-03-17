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