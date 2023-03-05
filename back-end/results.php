<?php

function getDatabaseConnexion()
{
    require("utilisateur-bdd.php");
    try {
        $db = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        return $db;
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage() . '</br/>';
        die();
    }
}

function getNotice()
{
    $conn = getDatabaseConnexion();
    $request = "SELECT avis.TITRE, avis.PARAG1, avis.PARAG2, avis.PARAG3 FROM avis WHERE avis.IDAVIS = " . $_GET["avis"];
    $statement = $conn->query($request);
    $notice = $statement->fetch(PDO::FETCH_ASSOC);
    return $notice;
}


function getscoreslam()
{
    $conn = getDatabaseConnexion();
    $request = "SELECT SUM(reponseassociee.VALEURDEV) AS scoreslam FROM reponseassociee WHERE reponseassociee.IDSONDE = " . $_GET["IDSONDE"];
    $statement = $conn->query($request);
    $scoreslam = $statement->fetch(PDO::FETCH_ASSOC);
    return $scoreslam;
}

function getscoreres()
{
    $conn = getDatabaseConnexion();
    $request = "SELECT SUM(reponseassociee.VALEURRES) AS scoreres FROM reponseassociee WHERE reponseassociee.IDSONDE = " . $_GET["IDSONDE"];
    $statement = $conn->query($request);
    $scoreres = $statement->fetch(PDO::FETCH_ASSOC);
    return $scoreres;
}

?>

<script type="text/javascript">
    var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($labels); ?>,
        datasets: [{
            label: 'Resultat score',
            data: <?php echo json_encode($donnees); ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>