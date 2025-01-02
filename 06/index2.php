<?php if (!empty($_SESSION['prihlasen'])): ?>
    <a href="add.php">Přidat článek</a> | <a href="logout.php">Odhlásit</a>
<?php else: ?>
    <a href="login.php">Přihlásit</a>
<?php endif; ?>
