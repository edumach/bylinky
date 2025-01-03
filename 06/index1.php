<?php if (!empty($_SESSION['prihlasen'])): ?>
  <p>
    <button onclick="location.href='edit.php?id=<?= $clanek['id'] ?>'">Upravit článek</button>
    <button onclick="if (confirm('Opravdu chcete článek smazat?')) location.href='delete.php?id=<?= $clanek['id'] ?>';">Smazat článek</button>
  </p>
<?php endif; ?>
