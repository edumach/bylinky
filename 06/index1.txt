<?php if (!empty($_SESSION['prihlasen'])): ?>
  <p>
    <a href="edit.php?id=<?= $clanek['id'] ?>">Upravit článek</a> |
    <a href="delete.php?id=<?= $clanek['id'] ?>" onclick="return confirm('Opravdu chcete článek smazat?')">Smazat článek</a>
  </p>
<?php endif; ?>
