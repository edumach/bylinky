<?php
session_start();
session_destroy(); // Zruší všechny session
header('Location: index.php'); // Přesměrování na hlavní stránku
exit;
?>
