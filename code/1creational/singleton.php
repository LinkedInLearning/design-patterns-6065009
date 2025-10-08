<?php

class Database {
    // Die einzige Instanz der Klasse
    private static ?Database $instance = null;

    // Privater Konstruktor verhindert direkte Instanziierung
    private function __construct() {
        echo "Datenbankverbindung erstellt.\n";
    }

    // Statische Methode, um die Instanz zu erhalten
    public static function getInstance(): Database {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Beispielmethode
    public function query($sql) {
        echo "Führe SQL aus: $sql\n";
    }
}

// Client-Code
$db1 = Database::getInstance();
$db1->query("SELECT * FROM users");

$db2 = Database::getInstance();
$db2->query("SELECT * FROM products");

// Prüfen, ob beide Variablen auf dieselbe Instanz zeigen
if ($db1 === $db2) {
    echo "db1 und db2 sind dieselbe Instanz.\n";
}
