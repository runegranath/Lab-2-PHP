# Min Bucketlist – Lab 2 (Objektorienterad PHP & MySQL)

En dynamisk webbapplikation byggd med objektorienterad PHP, MySQL/MariaDB och Milligram CSS som en del av kursen i webbutveckling vid Mittuniversitetet. Besökare kan lägga till, visa och radera punkter i en personlig bucketlist med prioriteringsgrad och tidsstämpel.

## Publicerad webbplats
* **Live-demo:** [https://studenter.miun.se/~rugr2500/Lab2PHP/](https://studenter.miun.se/~rugr2500/Lab2PHP/)

---

## Funktioner & Tekniker
* **Objektorienterad PHP:** All databashantering och validering är inkapslad i klassen `BucketList` med privata egenskaper, setters och publika CRUD-metoder (`getItems()`, `addItem()`, `deleteItem()`).
* **Säkerhet:** Använder *prepared statements* (`prepare`, `bind_param`, `execute`) för att skydda mot SQL-injektioner samt `htmlspecialchars()` vid utskrift för att motverka XSS.
* **Autoloader & Templating:** Gemensam `header.php`, `footer.php` och automatisk klassladdning via `spl_autoload_register` i `includes/config.php`.
* **Design:** Responsivt och minimalistiskt gränssnitt byggt med Milligram CSS och kompletterande egen CSS.

---

## Filstruktur

```text
lab2PHP/
├── index.php                  # Startsida med uppgiftsbeskrivning och reflektioner
├── bucketlist.php             # Huvudsida för att hantera och visa bucketlist-poster
├── ai.php                     # Redovisning av AI-användning i projektet
├── css/
│   └── style.css              # Kompletterande stilmall
├── includes/
│   ├── config.php             # Konfiguration och autoloader
│   ├── header.php             # Gemensam sidhuvud- och menystruktur
│   ├── footer.php             # Gemensam sidfot
│   └── classes/
│       └── bucketlist.class.php # PHP-klass för databaskoppling och validering
├── database/
│   └── bucketlist_db.sql      # SQL-export för att återskapa databastabellen
├── diagrams/
│   ├── uml-diagram.png        # UML-klassdiagram för BucketList
│   └── er-diagram.png         # ER-diagram för tabellen bucketlist
└── README.md

Installation lokalt (XAMPP / MAMP)
Klona eller ladda ner repot till din lokala webbservermapp (t.ex. C:\xampp\htdocs\lab2PHP\).

Starta Apache och MySQL i XAMPP Control Panel.

Öppna phpMyAdmin (http://localhost/phpmyadmin/), skapa en ny databas med namnet bucketlist_db och importera SQL-filen från mappen database/.

Kontrollera att databasuppgifterna i includes/classes/bucketlist.class.php matchar din lokala miljö (localhost, root, "", bucketlist_db).

Öppna http://localhost/lab2PHP/ i webbläsaren.

Diagram
UML-klassdiagram (BucketList)
Code snippet
classDiagram
    class BucketList {
        -mysqli db
        -string name
        -string description
        -int priority
        +__construct()
        +setName(string name) bool
        +setDescription(string description) bool
        +setPriority(int priority) bool
        +getItems() array
        +addItem(string name, string description, int priority) bool
        +deleteItem(int id) bool
    }
ER-diagram (bucketlist)
Code snippet
erDiagram
    BUCKETLIST {
        int id PK "AUTO_INCREMENT"
        varchar(255) name "NOT NULL"
        text description "NOT NULL"
        int priority "NOT NULL"
        timestamp created_at "DEFAULT CURRENT_TIMESTAMP"
    }