<?php
// Service, den wir injizieren wollen
class Logger {
    public function log(string $message) {
        echo "Log: $message\n";
    }
}

// Klasse, die Logger nutzt
class UserService {
    private Logger $logger;

    // Dependency Injection via Konstruktor
    public function __construct(Logger $logger) {
        $this->logger = $logger;
    }

    public function createUser(string $name) {
        echo "Benutzer '$name' wird erstellt.\n";
        $this->logger->log("Benutzer '$name' wurde erstellt.");
    }
}

// Client-Code
$logger = new Logger();          // Abhängigkeit erstellen
$userService = new UserService($logger);  // Abhängigkeit injizieren
$userService->createUser("Alice");
