<?php
require 'db.php';

// Načtení článků z databáze
$sql = "SELECT * FROM clanky";
$stmt = $pdo->query($sql);
$clanky = $stmt->fetchAll(PDO::FETCH_ASSOC); 

include "head.inc.php";
?>

<h1>Bylinky</h1>
<p>Příroda léčí</p>
<hr>

<?php foreach ($clanky as $clanek): ?>
    <h2><?= $clanek['nadpis'] ?></h2>
    <img src="<?= $clanek['obrazek'] ?>" alt="<?= $clanek['nadpis'] ?>" title="<?= $clanek['nadpis'] ?>" width="300">
    <h3>Popis</h3>
    <div><?= $clanek['popis'] ?></div>
    <h3>Využití</h3>
    <div><?= $clanek['vyuziti'] ?></div>
    <hr>
<?php endforeach; ?>

<p>&copy; <?= date("Y"); ?> Bylinky</p>

</div>
</body>
</html>
