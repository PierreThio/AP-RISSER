<?php
session_start();
include("back-end/results.php");
$notice = getNotice();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if ($_GET["avis"] == 1) {
        echo "totaly dev";
    }
    if ($_GET["avis"] == 2) {
        echo "reseau";
    }
    if ($_GET["avis"] == 3) {
        echo "mi dev mi reseau";
    }
    ?>
</body>

</html>