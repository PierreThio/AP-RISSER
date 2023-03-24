<?php
session_start();
include("back-end/results.php");
$notice = getNotice();
$scoreslam = getscoreslam();
$scoreres = getscoreres();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="back-end/baton.js"></script>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/results.css">
    <link rel="icon" type="image/jpg" href="assets/picture/picture-icon.png">
    <title>Document</title>
</head>


<body>
    <div class="titre">
            <h1 class="titre1">Psycho<span class="titre2">Quizz</span></h1>
    </div>
    <div class="container">
        <div class="result">
                <h2>Résultat</h2>
            <form class="text_result">
                <?php
                    echo $notice["TITRE"]; 
                    ?>

                    <br><br>

                    <?php
                    echo $notice["PARAG1"];
                    ?>

                    <br><br>

                    <?php
                    echo $notice["PARAG2"];
                    ?>

                    <br><br>

                    <?php
                    echo $notice["PARAG3"];
                    ?>

            </form>
        </div>


            <canvas id="chart"></canvas>
    </div>
    <button onclick="document.location.href= 'index.php'" class="button">Accueil</button>     
            <script>
                chart(<?php echo $scoreslam["scoreslam"] ?>,<?php echo $scoreres["scoreres"]?>);
            </script>


</body>

</html>