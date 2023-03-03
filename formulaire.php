<?php
session_start();
include("back-end/formulaire.php");
$origins = getOrigins();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="body">
    <h1>Psycho<span class="body__title">Quizz</span></h1>
    <form class="body__form" action="<?php createSonde(); ?>" method="POST">
        <select name="origin">
            <option>Quelles études avez-vous fait?</option>
            <?php
            foreach ($origins as $origin) {
                echo "<option value='" . $origin["IDORIGINE"] . "'>" . $origin["NOM"] . "</option>";
            }
            ?>
        </select>
        <br>
        <label for="sexe">Étes-vous un homme ou une femme?</label>
        <br>
        <p>Homme</p>
        <input type="radio" value="M" name="sexe">
        <input type="radio" value="F" name="sexe">
        <p>Femme</p>
        <button type="submit" name="submit">Faire le quizz</button>
    </form>
</body>

</html>