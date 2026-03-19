<?php
try
{
  // vytvoření PDO připojení k SQLite
  $pdo = new PDO("sqlite:bylinky.db");

  // zapnutí výjimek pro chyby
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // (volitelné) zapnutí podpory cizích klíčů
  $pdo->exec("PRAGMA foreign_keys = ON");
}
catch (PDOException $e)
{
  die("Chyba připojení: " . $e->getMessage());
}
?>
