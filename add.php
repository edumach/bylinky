<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $nadpis = $_POST['nadpis'];
  $obrazek = $_POST['obrazek'];
  $popis = $_POST['popis'];
  $vyuziti = $_POST['vyuziti'];

  $sql = "INSERT INTO clanky (nadpis, obrazek, popis, vyuziti) VALUES (?, ?, ?, ?)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$nadpis, $obrazek, $popis, $vyuziti]);

  header('Location: index.php');
  exit; //ukončí běh skriptu
}

include "head.inc.php";
?>

<h2>Přidat nový článek</h2>
<form method="POST">
    <label>Nadpis:</label><br>
    <input type="text" name="nadpis" required><br>
    <label>Obrázek (URL):</label><br>
    <input type="text" name="obrazek" required><br>
    <label>Popis:</label><br>
    <textarea name="popis" rows="10" cols="80" required></textarea><br>
    <label>Využití:</label><br>
    <textarea name="vyuziti" rows="10" cols="80" equired></textarea><br>
    <button type="submit">Přidat článek</button>
</form>

</div>
</body>
</html>
