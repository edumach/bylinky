<?php
$host = 'localhost'; //ve vztahu k Apache je lokální
$dbname = 'bylinky';
$user = 'user';
$password = '12345';

// Připojení k databázi
try
{
  $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e)
{
  die("Chyba připojení: " . $e->getMessage());
}
?>
