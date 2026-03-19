<?php
$host = 'localhost'; //ve vztahu k Apache je lokální
$dbname = ''; //název databáze
$user = '';   //uživatel
$password = ''; //heslo
//název samotné tabulky se sem nezadává - ta bude až součástí SQL dotazů v PHP skriptech.

// Připojení k databázi
try
{
  // Vytvoření nového PDO objektu pro připojení k MySQL databázi.
  // Parametry: hostitel, název databáze, znaková sada, uživatelské jméno a heslo.
  $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);

  // Nastavení režimu zpracování chyb na vyvolávání výjimek (Exceptions).
  // Díky tomu se při chybě v komunikaci s databází vrátí podrobné informace o problému.
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e)
{
  // Zpracování výjimky v případě chyby při připojení k databázi.
  // Skript se ukončí a zobrazí chybovou zprávu.
  die("Chyba připojení: " . $e->getMessage());
}
?>
