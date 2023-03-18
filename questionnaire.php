<?php
session_start();
$_SESSION["id"] = 2;
include("back-end/questionnaire.php");
$questions = getQuestions();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/questionnaire.css">
    <link rel="icon" type="image/jpg" href="assets/picture/picture-icon.png">
    <title>Questionnaire</title>
</head>

<body>
    <div class="titre">
        <h1 class="titre1">Psycho<span class="titre2">Quizz</span></h1>
    </div>
    <form class="form" action="<?php createResults(); ?>" method="POST">
        <?php
        foreach ($questions as $question) {
            if ($question->IDTYPEQUESTION == 1) {
                echo "<div>";
                echo "<label class = 'text'>";
                echo $question->LIBELLE;
                echo "</label>";
                echo "<br>";
                echo "<br>";
                echo "<div> <label class = 'radio'>";
                echo "Oui ";
                echo "<input type='radio' value='1' name='" . $question->IDQUESTION . "' required>";
                echo "<span></span>";
                echo "</label>";
                echo "<label class = 'radio'>";
                echo "<input type='radio' value='2' name='" . $question->IDQUESTION . "' required>";
                echo " Non";
                echo "<span></span>";
                echo "</label>";
                echo "</div>";
                echo "</div>";
            }
            if ($question->IDTYPEQUESTION == 2) {
                echo "<div>";
                echo "<label class ='text'>";
                echo $question->LIBELLE;
                echo "</label>";
                echo "<br>";
                echo "<br>";
                echo "De 5 à 1";
                echo "<div> <label class = 'radio'>";
                echo "<input type='radio' value='5' name='" . $question->IDQUESTION . "' required>";
                echo "<span></span>";
                echo "</label>";
                echo "<label class = 'radio'>";
                echo "<input type='radio' value='4' name='" . $question->IDQUESTION . "' required>";
                echo "<span></span>";
                echo "</label>";
                echo "<label class = 'radio'>";
                echo "<input type='radio' value='3' name='" . $question->IDQUESTION . "' required>";
                echo "<span></span>";
                echo "</label>";
                echo "<label class = 'radio'>";
                echo "<input type='radio' value='2' name='" . $question->IDQUESTION . "' required>";
                echo "<span></span>";
                echo "</label>";
                echo "<label class = 'radio'>";
                echo "<input type='radio' value='1' name='" . $question->IDQUESTION . "' required>";
                echo "<span></span>";
                echo "</label>";
                echo "</div>";
                echo "</div>";
            }
            echo "<br>";
        }
        ?>
        <button class ="button" type="submit" name="submit">Résultats</button>
    </form>
</body>

</html>