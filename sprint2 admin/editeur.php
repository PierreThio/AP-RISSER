<?php
include("back-end/editeur.php");
$questions = getQuestions();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/2edda3aa9c.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/editeur.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editeur</title>
</head>


<body>

    <h1 class="title">
        <span>Psycho</span><span class="title-part2">Quizz</span>
    </h1>

    <h2 class="label-stats">Editeur de question
    </h2>

    <article class="stats-item">
        <p class="stats-item1">Statistiques des étudiants</p>
        <p class="stats-item2">Statistiques des questions</p>
    </article>


    <div class="question-box">
        <div class="scroll-bar">
            <?php
            foreach ($questions as $question) {
                echo '<div class="question-list">';
                echo '<div class="question-id">';
                echo $question -> IDQUESTION; echo '</div>';
                echo '<div class="question-label">';
                echo $question -> LIBELLE;
                echo '</div>';
                echo '<div class="question-icon">';
                echo '<button class="fa-solid fa-trash-can fa" data-question-id="'.$question->IDQUESTION.'" data-question-label="'.$question->LIBELLE.'"></button>';
                echo '</div>';
                echo '</div>';
                echo "<br>";
                echo "<br>";
            }
            ?>
        </div>
    </div>

    

    <!-- POPUP SUPPRESSION -->
    <div id="popup1" class="popup" data-question-id="">
    <div class="popup-content">
        <span class="close1">&times;</span>
        <section class="">
            <div class="accept-delete">
                <p class="bold">Etes vous sûr de vouloir supprimer cette question?</p>
                <br>
                <p class="question-label"></p>
                <br>
                <p>Cette action ne pourra pas être annuler</p>
                <button class="button-delete bold">Supprimer</button>
            </div>
        </section>
    </div>
</div>


    <!-- UTILISATION FICHIER JS -->
    <script src="popup_suppression.js"></script>
    
    
</body>
<footer class="footer-add-question">
    <button onclick="document.location.href= 'ajout-question.php'" class="add-question">Ajouter une question</button>
    <button onclick="document.location.href= 'modif-question.php'" class="button-modif-question">Modifier une question</button>
</footer>
</html>