CREATE TABLE clanky
(
  "id" INTEGER PRIMARY KEY AUTOINCREMENT,
  "nadpis" TEXT,
  "obrazek" TEXT,
  "popis" TEXT,
  "vyuziti" TEXT
);


INSERT INTO clanky 
(nadpis, obrazek, popis, vyuziti)
VALUES
(
  'Heřmánek pravý',	

  'https://www.edumach.cz/img/hermanek.jpg',
  
  '<p>Je to jedna z nejoblíbenějších a velmi dlouho známých léčivých bylin.</p>',	
  
  '<p>Sušené květy se užívají ve formě čajů. Přidávají se do ozdravných koupelí nebo polštářů
  pro lepší spánek. Zevně se užívá heřmánkový olej a nejrůznější masti.</p>'
);
