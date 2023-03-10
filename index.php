<?php
session_start();
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="site">
    <link rel="stylesheet" href="assets\css\form.css">
    <script src="javascript.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2edda3aa9c.js" crossorigin="anonymous"></script>
    <title>Page d'accueil</title>
</head>

<body>

    <!-- BODY -->
    <img class="picture1" src="assets/picture/picture-link.png" alt="Image déco">
    <img class="picture2" src="assets/picture/picture-icon.png" alt="Image déco">


    <!-- SECTION -->
    <div class="section-1">


        <h1 id="main-title">
            <span class="title-part1">Psycho</span><span class="title-part2">Quizz</span>
        </h1>
        <p id="phrase-accroche">Ce quizz a été crée dans le but de déterminer quelle options, SLAM ou SISR, du BTS SIO vous convient le plus.<br> <span class="spacer"></span> Dans le cas ou vous avez déjà fait votre choix, ce quizz vous permettra de confirmer votre choix</p>
        <button onclick="document.location.href= 'sonde.php'" class="button-start">Commencer</button>
    </div>
    <!-- SECTION END -->

    <!-- BODY END-->






</body>


</html>