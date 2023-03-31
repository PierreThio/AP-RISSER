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
    <div class ="section-1">
        <div class="titre">
            <h1 class="titre1">Psycho<span class="titre2">Quizz</span></h1>
            <?php messageInfo();?>
        </div>
        <form class= "form" method="POST" action=<?php createSonde(); ?>>
            <h2>Qu'elle est votre parcours scolaire ?</h2>
            <div class = select>
                <select name="origin">
                <option value="">Selctionner un parcours</option>
                <?php
                    foreach ($origins as $origin) {
                    echo "<option value='" . $origin->IDORIGINE . "'"."name='origine'".">" . $origin->NOM . "</option>";
                    }
                ?>
                </select>
            </div>
            <h2>Êtes vous une Femme ou un Homme ?</h2>
            <div class="radio-group">
                <label class="radio">
                    
                    <input class = "radio" type="radio" value="H"name="gender"> Homme
                    <span></span>
                </label>
                <label class="radio">
                    <input type="radio" value="F"name="gender"> Femme
                    <span></span>
                </label>
            </div><br>
            <button class ="button" type="submit" name="submit">Faire le quizz !</button>
        </form> 
    </div>
</body>
</html>