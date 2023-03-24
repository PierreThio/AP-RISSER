<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
  
  
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/sondeverif.css">
    <title>Verification</title>
    <link rel="icon" type="image/jpg" href="assets/picture/picture-icon.png">

</head>

<?php
require_once('back-end/sonde.php');
if ($_POST['origin'] == '' OR $_POST['gender'] == '') {
    echo "<div>";
    echo "<label class = 'text'>";
    echo "Merci de bien renseigner l'ensemble des champs";
    echo "<br />";
    echo "<a href='sonde.php' class='button'>Retour</a>";
    echo "</label>";
    echo "</div>";
}
else{
  createSonde();
}
?>