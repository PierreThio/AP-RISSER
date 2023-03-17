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
  <link rel="stylesheet" type="text/css" href="assets/css/sonde.css"/>
  <title>sonde</title>
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
      <div><h3>Homme</h3></div><div><h3>Femme</h3></div>
      <input type="radio" value="H"name="genre"><a>
      <input type="radio" value="F"name="genre"><br>
      <button type="submit" name="submit" >Commencer</button>
    </form> 
  </body>
</html>