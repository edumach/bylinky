<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bylinky</title>
</head>
<body>

<h1>Bylinky</h1>
<p>Příroda léčí</p>
<hr>

<?php
$byliny = [
    [
        "nazev" => "Heřmánek pravý",
        "obrazek" => "https://www.edumach.cz/img/hermanek.jpg",
        "popis" => "Heřmánek je jednoletá léčivá rostlina z čeledi hvězdnicovitých. Hojně se využívá v kosmetice a léčitelství, v aromaterapii i homeopatii. Je to jedna z nejoblíbenějších a velmi dlouho známých léčivých bylin.",
        "vyuziti" => "Sbírány jsou rozkvetlé úbory krátce po rozvití, které se suší a užívají ve formě čajů a odvarů, přidávají se do ozdravných koupelí a do polštářů pro lepší spánek. Jejich výpary lze též inhalovat. Zevně se užívá heřmánkový olej a nejrůznější masti."
    ],
    [
        "nazev" => "Máta peprná",
        "obrazek" => "https://www.edumach.cz/img/mata.jpg",
        "popis" => "Máta peprná je vytrvalá bylina z čeledi hluchavkovité. Kvete od července do září. Je to přirozený hybrid máty vodní a máty klasnaté. Pravděpodobně pochází ze západní Evropy, konkrétně z Anglie, ale dnes už se pěstuje v mírných pásech celého světa.",
        "vyuziti" => "Máta pomáhá odstraňovat křeče, povzbuzuje vylučování trávicích šťáv, působí protizánětlivě a proti nadýmání. Též podporuje funkci přídatných orgánů – jater, slinivky břišní a žlučníku. Inhalace máty pomáhá při zánětech dýchacích cest."
    ],
    [
        "nazev" => "Bez černý",
        "obrazek" => "https://www.edumach.cz/img/bez.jpg",
        "popis" => "Bez černý je listnatý keř, který má široké využití v léčitelství, farmacii i potravinářství. Všechny části rostliny mají léčivé účinky. Sbírá se květ, list, bobule a kůra, a to v červnu a červenci, bobule v říjnu a listopadu.",
        "vyuziti" => "Odvar ze sušených květů je močopudný, rozpouští hleny a podporuje pocení. Snižuje horečku a mírní kašel. Chlazený neslazený čaj z květů je výtečným lékem i při zažívacích potížích."
    ]
];

foreach ($byliny as $bylina) {
    echo "<h2>{$bylina['nazev']}</h2>";
    echo "<img src=\"{$bylina['obrazek']}\" alt=\"{$bylina['nazev']}\" title=\"{$bylina['nazev']}\" width=\"300\">";
    echo "<h3>Popis</h3>";
    echo "<p>{$bylina['popis']}</p>";
    echo "<h3>Využití</h3>";
    echo "<p>{$bylina['vyuziti']}</p>";
    echo "<hr>";
}
?>

<p>&copy; <?php date("Y"); ?> Bylinky</p>

</body>
</html>
