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
    <title>Document</title>
</head>
<h1>Psychoquizz</h1>
<h2>Résultat</h2>

<body>
    <?php
    echo "$notice";
    ?>


    <canvas id="myChart" width="400" height="400"></canvas>

    <?php
    $donnees = array($scoreslam, $scoreres);
    $labels = array("SLAM", "SISR");
    ?>

</body>

</html>