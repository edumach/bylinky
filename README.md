
# Webový projekt "Bylinky"


# (1) Úvod
Živá ukázka: 🌐 [https://bylinky.edumach.cz/](https://bylinky.edumach.cz/)

Web se skládá ze **tří** hlavních částí:

1. Hlavička
2. Tělo s několika články ve stejné struktuře (viz níže)
3. Zápatí

Data o bylinkách zobrazených v těle budou v databázové tabulce v této struktuře:
- Nadpis
- Obrázek
- Popis
- Využití

Další funkcionality:

1. Pomocí tlačítek půjdou data přidat, upravit nebo smazat.
2. Z důvodu jednoduchosti nebude ostylovaný pomocí CSS. To si necháme na konec.
3. Administrace obsahu bude pod loginem (jméno + heslo).
4. Pohodlné psaní článků bude zajišťovat CKEditor.
5. Web bude tvořit 9 dílčích souborů.


#  (2) Založení projektu, databáze

## Instalace

Knovonámi repozitáře z GitHubu

```
$ cd /var/www/html
$ sudo git clone https://github.com/edumach/bylinky
$ cd bylinky 
```

## Soubor `head.inc.php`

Tento soubor obsahuje hlavičku HTML stránky (bez koncových značek `</body>` a `</html>` - ty budou až v souboru `index.php`). Do ostatních souborů se vkládá PHP příkazem [include](https://www.w3schools.com/php/php_includes.asp). Výhodou je, že **jeden společný blok kódu znamená snadnou úpravu nebo rozšíření**. Toto je v PHP velmi častý koncept. Ppouze pro odlišení má v názvu `inc`.

## Databáze bylinky

```sql
> CREATE DATABASE bylinky;
> USE bylinky;
```

## Databázová tabulka `clanky`

Nejprve je nutné vytvořit databázovou tabulku a pro začátek do ní přidat alespoň jeden článek. Další přidáme později.

⬆️ Importujte SQL dotaz `bylinky.sql`


## Soubor `head.inc.php`

Obsahuje inormace k připojení k databázi.


## Soubor `db.php`
PHP skript bude do databáze přistupovat naším jménem a heslem. Volá se při **každém požadavku přístupu do databáze** – při každém načtení stránky. Z pohledu návštěvníka to není poznat.

**Vysvětlení**: Tento blok kódu má **dvě části**:

1. Definici proměnných (v PHP každá proměnná začíná symbolem `$`)

2. Připojení k databázi pomocí PDO (*PHP Data Objects je konzistentní rozhraní pro přístup k různým databázím (MySQL, PostgreSQL, SQLite atd.) z PHP aplikací. PDO vytváří abstraktní vrstvu, díky které můžeme psát kód, který bude fungovat s různými databázemi bez nutnosti přepisovat velké části kódu.*)

- `try` a `catch`: Tyto bloky kódu slouží k zachycení případných chyb při připojení. Pokud dojde k nějaké chybě, spustí se kód uvnitř bloku `catch`.

- `new PDO()`: Tímto příkazem vytvoříme nové připojení k databázi pomocí PHP Data Objects (PDO).
- `mysql:host=$host;dbname=$dbname;charset=utf8`: Řetězec definující typ databáze (MySQL), adresu serveru, název databáze a kódovou stránku (UTF-8).
- `$user`: Uživatelské jméno.
- `$password`: Heslo.
- `$pdo->setAttribute()`: Tímto příkazem nastavíme atribut připojení `PDO::ATTR_ERRMODE` na hodnotu `PDO::ERRMODE_EXCEPTION`. To znamená, že pokud dojde k chybě při provádění SQL příkazů, bude vyvolána výjimka (exception), kterou můžeme zachytit v bloku `catch`.
- `die("Chyba připojení: " . $e->getMessage())`: Pokud dojde k výjimce, tento řádek ukončí provádění skriptu a vypíše chybovou zprávu obsahující detailní popis chyby.

Jinými slovy, kód se pokusí připojit k databázi MariaDB a vytvoří objekt `$pdo`, který bude použit pro další interakci s databází (např. pro provádění SQL dotazů). Pokud se připojení nezdaří, program se zastaví a vypíše chybovou zprávu.

## Operátory `.`, `::` a `->`

- PHP operátor `.` slouží ke konkatenaci (spojení, zřetězení) řetězců. Umožňuje spojit více řetězců nebo proměnných obsahujících řetězce do jednoho.

- PHP operátor `->` slouží k přístupu k vlastnostem a metodám objektu. Používá se tehdy, když pracujeme s objekty vytvořenými na základě tříd.
- PHP operátor `::` se používá na úrovni tříd pro statické prvky, konstanty a odkazování na rodiče. Konstanty třídy jsou přístupné pomocí `::` bez `$`.

## Soubor `index.php`

Soubor `index.php` je hlavním souborem, který webový server po zadání adresy posílá klientovi.

V PHP ostrůvku se nejprve includuje připojení k databázi (`require 'db.php';`). Require funguje stejně jako `include`, jen je striktnější – v případě chyby **okamžitě zastaví běh skriptu**.

Další kód vytáhne z databázové tabulky všechny články a uloží je do asociativního pole.

Cyklus foreach vypíše všechny články – vygeneruje HTML kód.

## Kontrola
Web bude dostupný na URL:
```
http://192.168.21.xxx/bylinky
```

## Přidání druhého článku

⬆️ SQL doataz je v souboru `mata.sql`. 

## Kontrolní otázky
1. Co je charakteristickým znakem názvu PHP proměnné?
2. Jakým způsobem se integruje PHP kód do HTML kódu?
3. Jaký je rozdíl mezi příkazy `include` a `require` v PHP?
4. Proč je důležité používat samostatného uživatele databáze místo účtu root?
5. Co znamená, že sloupec `id` má vlastnost "Auto Increment"?
6. Jaký je hlavní účel nástroje Adminer?
7. Jak v PHP přistupujeme k hodnotám uloženým v asociativním poli?

## 🎯 Cílový stav

Web Bylinky se zobrazuje se dvěma články.

---

# (3) Formuláře
Přidávat články přímo v databázovém systému si možné je, ale příliš komfortní to není. A nejen to.

Také si uvědomte, že autor webu nemusí být (a často není) jeho uživatelem. Nelze očekávat, že každý uživatel bude zároveň odborníkem na databázové systémy.

Proto si do naší webové aplikace přidáme možnost přidávat články pomocí HTML formulářových elementů. Tato oblast je složitější, proto si ji rozdělíme na tři části:

- HTML formuláře.
- Způsob odesílání dat na server.
- Převzetí dat na serveru.

## HTML formuláře
Vyplňování formulářů je nedílnou součástí našich digitálních životů, ať už jde např. o hledání na webu, přihlašování na e-mail, nebo vyplňování registrace na e-shopu.

<img src="https://php.edumach.cz/img/form-type.png" width="600">

Základem všech formulářových elementů je značka
```html
<form>

</form>
```

Do ní se všechny vkládají. Jejich společnou vlastností je, že jsou řádkové.

Asi nejpoužívanějším elementem je `<input type="">`. Značka není párová. Různých typů je přes 20: textové pole, zaškrtávací pole, přepínač, pole pro zadání hesla, tlačítko atd. atd. Specifikace HTML5 přidala další užitečné typy: pole pro e-mail, URL, číslo, datum...

Některé z nich v prohlížeči aktivují **validátor zadaných hodnot** ještě před odesláním.

Na mobilních zařízeních vyvolají příslušný typ klávesnice pro pohodlné zadávání hodnot (např. `email`, `url`, `number`, `date`).

<img src="https://php.edumach.cz/img/klavesnice.png" width="500">

<img src="https://php.edumach.cz/img/hodinky.jpg" width="500">


Kompletní výčet [https://www.w3schools.com/tags/att_input_type.asp](https://www.w3schools.com/tags/att_input_type.asp).

Testovací web formulářových polí a atributů [https://inputtypes.com](https://inputtypes.com).


## Způsob odesílání dat na server
V modelu klient-server se musí data z formulářů od klienta nejprve "dopravit" na server. Teprve tam je možné je zpracovat. Dalším faktorem je, že **HTML nezná proměnné**.

PHP skriptu lze předat vstup pomocí dvou metod – `GET` nebo `POST`. Liší se "cestou", kudy data na server "tečou":

Metoda `GET`:
- otevřeně v URL
- omezená délka (cca 4000 znaků)
- nejdou tudy odeslat soubory
- nevhodné pro odesílání citlivých dat jako např. hesel
- URL jde i s parametry uložit nebo sdílet (a to i provozovatelem serveru)

Metoda `POST`:
- "skrytě" HTTP protokolem
- povinné pro soubory nebo citlivá data
- tlačítko Zpět si vyžádá znovu odeslání formuláře

Zadané údaje do formulářů se musí mezi sebou nějak odlišit. K tomu se používá atribut `name=""`. Hodnota atributu je libovolná, pro každý formulářový prvek pochopitelně jiná a nesmí obsahovat diakritiku a mezery. S jistou mírou nepřesnosti je to název proměnné.

Hodnotou této "proměnné" je ten zadaný údaj. U zaškrtávacích políček, přepínačů a rozbalovací nabídky je hodnotou údaj uvedený v atributu value="":
```html
<form>
  <input type="text" name="jmeno">
  <input type="checkbox" name="souhlas" value="ano">
  <input type="submit" value="Odeslat">
</form>
```
Značku `<input>` jde nahradit i značkou `<button>`, jen konstrukce značky je trochu jiná:
```html
<button type="submit">Odeslat</button>
```
Na server by pomocí metody `GET` odešlo toto:
```
...?jmeno=Pepa&souhlas=ano
```
Metodou `POST` to samé, jen "odděleně".

## Odesílání dat
Jakou metodou se data z formuláře odešlou určuje atribut `method=""` ve značce `<form>`:
```html
<form method="POST">

</form>
```
Výchozí metoda je `GET`, proto se nemusí uvádět. Metoda POST naopak ano.

## Logování
V metodách `GET` a `POST` je ještě jeden podstatný rozdíl: Ukládání dat do logovacího souboru `/var/log/access.log`. Typický záznam v `access.log` pro požadavek `GET` vypadá například takto:
```
192.168.23.nnn - - [20/Jun/2020:14:00:00 +0100] "GET /index.php?jmeno=Pepa&souhlas=ano HTTP/1.1" 200 1234
```
Tento záznam obsahuje kompletní URL včetně dotazovacích parametrů (`jmeno=Pepa&souhlas=ano`).

**Bezpečnostní poznámky:**
- Dotazovací parametry u metody `GET` se mohou dostat do logů a mohou obsahovat citlivé informace. Vyhněte se odesílání citlivých dat (např. hesel) metodou `GET`.
- URL s parametry může být také uložena v historii prohlížeče, cache nebo předána třetím stranám. Pokud je potřeba větší zabezpečení, používejte metodu `POST`.

Data odeslaná metodou `POST` se standardně v logu `/var/log/access.log` nezobrazují. Důvodem je, že HTTP protokol odděluje hlavičky (které se zapisují do logu) od těla požadavku, kde se nacházejí data odeslaná metodou `POST`. Apache standardně loguje pouze hlavičky požadavku, nikoli jeho tělo.

**Shrnutí:**
- `GET`: Data jsou v URL a automaticky se logují.
- `POST`: Data jsou v těle požadavku a standardně se nelogují.

## Převzetí dat na serveru
Pokud je formulář i skript, který data převezme ve stejném souboru, nemusí se jeho název uvádět. Toto je případ našeho skriptu v souboru `add.php` níže. V opačném případě se název skriptu, popř. i cesta uvádějí v atributu `action=""`:

```html
<form method="POST" action="nazev_skriptu.php">

</form>
```

Způsob převzetí dat na serveru se liší podle metody odeslání. K tomu slouží tzv. [superglobální proměnné](https://www.w3schools.com/php/php_superglobals.asp):
- `$_GET['']`
- `$_POST['']`
Do apostrofů `''` se uvede hodnota atributu `name=""`.  Příklad:

Formulář:
```html
<form>
  <input type="text" name="jmeno">
  <input type="checkbox" name="souhlas" value="ano">
  <input type="submit" value="Odeslat">
</form>
```
V URL:
```
...?jmeno=Pepa&souhlas=ano
```
Převzetí dat na serveru:

```php
<?php
$prom1 = $_GET['jmeno'];
$prom2 = $_GET['souhlas'];
?>
```
Hodnoty PHP proměnných budou:
- `$prom1` bude `Pepa`
- `$prom1` bude `ano`

📒 Ukázka formuláře k prostudování: [www.w3schools.com](https://www.w3schools.com/html/tryit.asp?filename=tryhtml_form_submit).

## Soubor `add.php`

V kódu se přistupuje do databáze, proto je na začátku příkaz `require 'db.php'`.

V kódu je také formulářová značka `<textarea>`, která vytvoří větší textové pole vhodné pro zadání delších textů:
```html
<textarea name="popis" rows="10" cols="80" required></textarea>
```
Atributy `rows` a `cols` nastavují počet řádků a sloupců (ve znacích).

Atribut `required` způsobí, že formulář nepůjde odeslat, pokud není vyplněný. Toto určitě znáte z jiných formulářů, kde se u takto povinných prvků typicky zobrazuje hvězdička.

Podmínka `if()` slouží k tomu, aby se kód v těle vykonal pouze, pokud "je něco v POST" - `$_SERVER['REQUEST_METHOD'] == 'POST'`.


## Úprava `index.php`

Aby jej bylo možné volat, musí být na něj někde na stránce `index.php` odkaz. Přidáme ho do zápatí stránky:
```php
<p>
  &copy; <?= date("Y"); ?> Bylinky
  |
  <a href="add.php">Přidat článek</a>
</p>
```

## Kontrolní otázky
1. Jaké jsou rozdíly PHP metod `GET` a `POST`? Uveďte alespoň dva.
2. Co určuje atribut `name=""` u vstupních prvků formuláře?
3. Proč není vhodné odesílat hesla metodou GET?
4. Jakým způsobem lze v PHP získat hodnotu odeslanou formulářem metodou `POST`?

## 🎯 Cílový stav

Na URL se zobrazuje web Bylinky se dvěma články. V zápatí je odkaz, kterým jde přidat článek pomocí HTML formuláře.

---

#  (4) Editace a smazání článku

## Soubor `edit.php`

###  Odkaz na soubor `edit.php`

Do souboru `index.php` **mezi řádky**
```php
<div><?= $clanek['vyuziti'] ?></div>
<hr>
```
přidejte odkaz

```php
<p>
   <button onclick="location.href='edit.php?id=<?= $clanek['id'] ?>'">Upravit článek</button>
</p>
```

## Soubor: `delete.php`

### Odkaz na soubor `delete.php`

Do souboru `index.php` ke kódu pro editaci článku přidejte tlačítko s odkazem na soubor `delete.php`. Součástí je i potvrzovací dialog, aby ke smazání nedošlo nedopatřením. Ten se spustí pouze, pokud `confirm()` vrátí `True`:

```php
<p>
  <button onclick="if (confirm('Opravdu chcete článek smazat?')) location.href='delete.php?id=<?= $clanek['id'] ?>';">Smazat článek</button>
</p>
```

## 🎯 Cílový stav

Na URL `https://tux.panska.cz/~10XPrijmeniJ/bylinky` se zobrazuje web Bylinky se dvěma články. V zápatí je odkaz, kterým jde přidat článek pomocí HTML formuláře. Články jsou přidávat a mazat.

---


#  (5) CKEditor

CKeditor je open source WYSIWYG textový editor, který lze použít na webových stránkách. Zaměřuje se na nízkou náročnost a okamžitou použitelnost.

<img src="https://php.edumach.cz/img/image-20210327000859480.png">

## Skript

Do souboru `head.inc.php` do hlavičky `head` přidejte odkaz na skript:

```
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
```
## Integrace CKEditoru

**Úprava značky `<textarea>`**: Každá značka `<textarea>` musí obsahovat atribut `id` s unikátní hodnotou, aby ji mohl editor správně identifikovat. Například:

```html
<textarea name="popis" id="p1" rows="10" cols="80" required>

</textarea>
```
Zde je `id` nastaveno na `p1`.

**Propojení se skriptem**: Pod každou značku `<textarea>` vložte následující skript s odpovídajícím `id`:

```js
<script>
  ClassicEditor
    .create(document.querySelector('#p1'))
    .catch(error => {
      console.error(error);
    });
</script>
```
Zde musí `document.querySelector('#p1')` odpovídat hodnotě `id` u příslušné značky `<textarea>`.

Každá textarea musí mít unikátní `id` (např. `p1`, `p2`, `p3`), aby skript fungoval správně a neovlivňoval jiné instance editoru na stránce.

## 🎯 Cílový stav

U všech textarea bude integrovaný CKEditor.

---

# (6) Přihlašování a odhlašování

**Přihlašování**: Uživatel zadá jméno a heslo v `login.php`. Pokud jsou údaje správné, uloží se do proměnné `$_SESSION['prihlasen']`.

**Zobrazení odkazů**:  Na stránce `index.php` kontrolujeme, zda je uživatel přihlášen (`isset($_SESSION['prihlasen'])`). Pokud ano, zobrazí se odkazy na editaci, přidání a smazání článků.

**Odhlášení**:  Uživatel se může odhlásit kliknutím na odkaz "Odhlásit", kterým zruší jeho relaci.

## Soubory `login.php` a `logout.php`

### Úprava souboru `index.php`

```php
    <h3>Využití</h3>
    <div><?= $clanek['vyuziti'] ?></div>
    <?php if (!empty($_SESSION['prihlasen'])): ?>
        <p>
            <a href="edit.php?id=<?= $clanek['id'] ?>">Upravit článek</a> |
            <a href="delete.php?id=<?= $clanek['id'] ?>" onclick="return confirm('Opravdu chcete článek smazat?')">Smazat článek</a>
        </p>
    <?php endif; ?>
    <hr>
<?php endforeach; ?>

<p>&copy; <?= date("Y"); ?> Bylinky |
<?php if (!empty($_SESSION['prihlasen'])): ?>
    <a href="add.php">Přidat článek</a> | <a href="logout.php">Odhlásit</a>
<?php else: ?>
    <a href="login.php">Přihlásit</a>
<?php endif; ?>
</p>

</body>
</html>
```

## 🎯 Cílový stav

- Editace obsahu je podmíněna přihlášením. 
- Po přihlášení se pod každým článkem zobrazí odkazy na úpravu a mazání článku.
- Po ukončení editace se lze odhlásit - odkazy na úpravu a mazání článku se nezobrazují. 

---


