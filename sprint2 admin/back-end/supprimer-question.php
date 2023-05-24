<?php

require 'back-end/editeur.php';

$id = $_GET['id'];

$sql = "DELETE FROM questions WHERE id = ?"; 
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header("Location:...");
exit;