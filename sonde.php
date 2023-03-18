<?php
session_start();
include ("back-end/sonde.php");
$origins = getOrigins();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
  
  
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/sonde.css">
    <title>Sondage</title>
    <link rel="icon" type="image/jpg" href="assets/picture/picture-icon.png">

</head>
<body>
    <div class="titre">
        <h1 class="titre1">Psycho<span class="titre2">Quizz</span></h1>
    </div>
    <form class= "form" method="post" action="<?php createSonde(); ?>">
        <h2>Qu'elle est votre parcours scolaire ?</h2>
        <select name="origin">
        <option value="">Selctionner un parcours</option>
        <?php
            foreach ($origins as $origin) {
            echo "<option value='" . $origin->IDORIGINE . "'>" . $origin->NOM . "</option>";
            }
        ?>
        </select>
        <h2>Êtes vous une Femme ou un Homme ?</h2>
        <div class="radio-group">
            <label class="radio">
                
                <input class = "radio" type="radio" value="homme"name="gender"> Homme
                <span></span>
            </label>
            <label class="radio">
                <input type="radio" value="femme"name="gender"> Femme
                <span></span>
            </label>
        </div><br>
        <button class ="button" type="submit" name="submit">Faire le quizz !</button>
    </form> 
</body>
</html>