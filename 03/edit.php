<?php
require 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM clanky WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$clanek = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nadpis = $_POST['nadpis'];
    $obrazek = $_POST['obrazek'];
    $popis = $_POST['popis'];
    $vyuziti = $_POST['vyuziti'];

    $sql = "UPDATE clanky SET nadpis = ?, obrazek = ?, popis = ?, vyuziti = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nadpis, $obrazek, $popis, $vyuziti, $id]);

    header('Location: index.php');
    exit; //ukončuje aktuální běh PHP skriptu

}

include "head.inc.php";
?>

<h1>Upravit článek</h1>
<form method="POST">
    <label>Nadpis:</label><br>
    <input type="text" name="nadpis" value="<?= $clanek['nadpis'] ?>" required><br>

    <label>Obrázek (URL):</label><br>
    <input type="text" name="obrazek" value="<?= $clanek['obrazek'] ?>" required><br>

    <label>Popis:</label><br>
    <textarea name="popis" rows="10" cols="80" required><?= $clanek['popis'] ?></textarea><br>

    <label>Využití:</label><br>
    <textarea name="vyuziti" rows="10" cols="80" required><?= $clanek['vyuziti'] ?></textarea><br>

    <button type="submit">Uložit změny</button>
</form>

</body>
</html>
