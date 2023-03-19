<?php
require_once('back-end/sonde.php');
if ($_POST['origin'] == '' OR $_POST['gender'] == '') {
    echo "Merci de bien renseigner l'ensemble des champs";
    echo "<br />";
    echo "<a href='sonde.php'>Retour</a>";
}
else{
  createSonde();
}
?>