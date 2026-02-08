<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uzivatel = 'admin'; // Uživatelské jméno
    $heslo = 'heslo123'; // Heslo (změňte!!!!)

    if ($_POST['jmeno'] === $uzivatel && $_POST['heslo'] === $heslo) {
        $_SESSION['prihlasen'] = true;
        header('Location: index.php'); // Přesměrování na hlavní stránku
        exit;
    } else {
        $chyba = 'Nesprávné uživatelské jméno nebo heslo.';
    }
}

include "head.inc.php";
?>

<h2>Přihlášení</h2>

<?php if (isset($chyba)): ?>
  <p style="color:red;"><?= $chyba ?></p>
<?php endif; ?>

<form method="post">
  <label for="jmeno">Jméno:</label>
  <input type="text" id="jmeno" name="jmeno" required>
  <br>
  <label for="heslo">Heslo:</label>
  <input type="password" id="heslo" name="heslo" required>
  <br>
  <button type="submit">Přihlásit</button>
</form>

</body>
</html>
