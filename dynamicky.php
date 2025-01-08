<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Bylinky</title>
</head>
<body>

<h1>Bylinky</h1>
<p>Příroda léčí</p>
<hr>

<?php
// Deklarace pole $byliny obsahující informace o bylinkách
$byliny = [
    [
        "nazev" => "Heřmánek pravý", // Název bylinky
        "obrazek" => "https://www.edumach.cz/img/hermanek.jpg", // URL obrázku bylinky
        "popis" => "Heřmánek je jednoletá léčivá rostlina z čeledi hvězdnicovitých. Hojně se využívá v kosmetice a léčitelství, v aromaterapii i homeopatii. Je to jedna z nejoblíbenějších a velmi dlouho známých léčivých bylin.", // Popis bylinky
        "vyuziti" => "Sbírány jsou rozkvetlé úbory krátce po rozvití, které se suší a užívají ve formě čajů a odvarů, přidávají se do ozdravných koupelí a do polštářů pro lepší spánek. Jejich výpary lze též inhalovat. Zevně se užívá heřmánkový olej a nejrůznější masti." // Využití bylinky
    ],
    [
        "nazev" => "Máta peprná", // Název bylinky
        "obrazek" => "https://www.edumach.cz/img/mata.jpg", // URL obrázku bylinky
        "popis" => "Máta peprná je vytrvalá bylina z čeledi hluchavkovité. Kvete od července do září. Je to přirozený hybrid máty vodní a máty klasnaté. Pravděpodobně pochází ze západní Evropy, konkrétně z Anglie, ale dnes už se pěstuje v mírných pásech celého světa.", // Popis bylinky
        "vyuziti" => "Máta pomáhá odstraňovat křeče, povzbuzuje vylučování trávicích šťáv, působí protizánětlivě a proti nadýmání. Též podporuje funkci přídatných orgánů – jater, slinivky břišní a žlučníku. Inhalace máty pomáhá při zánětech dýchacích cest." // Využití bylinky
    ],
    [
        "nazev" => "Bez černý", // Název bylinky
        "obrazek" => "https://www.edumach.cz/img/bez.jpg", // URL obrázku bylinky
        "popis" => "Bez černý je listnatý keř, který má široké využití v léčitelství, farmacii i potravinářství. Všechny části rostliny mají léčivé účinky. Sbírá se květ, list, bobule a kůra, a to v červnu a červenci, bobule v říjnu a listopadu.", // Popis bylinky
        "vyuziti" => "Odvar ze sušených květů je močopudný, rozpouští hleny a podporuje pocení. Snižuje horečku a mírní kašel. Chlazený neslazený čaj z květů je výtečným lékem i při zažívacích potížích." // Využití bylinky
    ]
];

// Iterace přes každou bylinku v poli $byliny
foreach ($byliny as $bylina) {
    // Vykreslení názvu bylinky jako nadpisu druhé úrovně
    echo "<h2>{$bylina['nazev']}</h2>";

    // Zobrazení obrázku bylinky s alt textem a titulkem
    echo "<img src=\"{$bylina['obrazek']}\" alt=\"{$bylina['nazev']}\" title=\"{$bylina['nazev']}\" width=\"300\">";

    // Zobrazení sekce s popisem bylinky
    echo "<h3>Popis</h3>";
    echo "<p>{$bylina['popis']}</p>";

    // Zobrazení sekce s využitím bylinky
    echo "<h3>Využití</h3>";
    echo "<p>{$bylina['vyuziti']}</p>";

    // Oddělení jednotlivých bylinek vodorovnou čárou
    echo "<hr>";
}
?>

<!-- Zobrazení aktuálního roku v copyrightu -->
<p>&copy; <?php echo date("Y"); ?> Bylinky</p>

</body>
</html>
