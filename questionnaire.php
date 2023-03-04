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
    <link rel="stylesheet" href="assets/css/questionnaire.css">
    <title>PsychoQuizz</title>
</head>

<body>
    <h1>Psycho<span class="body__title">Quizz</span></h1>
    <form action="<?php createResults(); ?>" method="POST">
        <?php
        foreach ($questions as $question) {
            if ($question->IDTYPEQUESTION == 1) {
                echo "<div>";
                echo "<label>";
                echo $question->IDQUESTION;
                echo "<br>";
                echo $question->LIBELLE;
                echo "</label>";
                echo "<br>";
                echo "Oui";
                echo "<input type='radio' value='1' name='" . $question->IDQUESTION . "' required>";
                echo "<input type='radio' value='2' name='" . $question->IDQUESTION . "' required>";
                echo "Non";
                echo "</div>";
            }
            if ($question->IDTYPEQUESTION == 2) {
                echo "<div>";
                echo "<label>";
                echo $question->IDQUESTION;
                echo "<br>";
                echo $question->LIBELLE;
                echo "</label>";
                echo "<br>";
                echo "Oui";
                echo "<input type='radio' value='5' name='" . $question->IDQUESTION . "' required>";
                echo "<input type='radio' value='4' name='" . $question->IDQUESTION . "' required>";
                echo "<input type='radio' value='3' name='" . $question->IDQUESTION . "' required>";
                echo "<input type='radio' value='2' name='" . $question->IDQUESTION . "' required>";
                echo "<input type='radio' value='1' name='" . $question->IDQUESTION . "' required>";
                echo "Non";
                echo "</div>";
            }
            echo "<br>";
        }
        ?>
        <button type="submit" name="submit">Résultats</button>
    </form>
</body>

</html>