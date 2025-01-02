<?php
require 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM clanky WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header('Location: index.php'); 
exit; //ukončuje aktuální běh PHP skriptu
?>
