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
    <title>Document</title>
</head>
<h1>Psychoquizz</h1>
<h2>Résultat</h2>

<body>

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
    
    <canvas id="chart"></canvas>

    



    <script>
        chart(<?php echo $scoreslam["scoreslam"] ?>,<?php echo $scoreres["scoreres"]?>);
    </script>

</body>

</html>