<?php
include("back-end/suppression-question.php");


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
    <title>Suppression question</title>
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


    <div class="box-ajout-question">
        <form method="post" action=<?php suppressionQuestion(); ?>>
            <label for="idsaisi ">ID de la question a supprimé : </label>
            <br>
            <input type="text" name="idsaisi" class="pick-id"> 
            <br>
            <p>Etes vous sure de voulait supprimer cette question ?</p>
            <input class ="little-button-supprimer" type="submit" name="submit" value="Supprimer la question">
            </div>
        </form>


    </div>
    <br>
    <button onclick="document.location.href= 'editeur.php'" class="button-retour">Retour</button>