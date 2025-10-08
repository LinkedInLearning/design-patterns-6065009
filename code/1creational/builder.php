<?php

class User {
    private string $name;
    private string $email;
    private ?string $phone;

    // Der Konstruktor ist privat, damit nur der Builder User-Objekte erstellen kann
    private function __construct(string $name, string $email, ?string $phone) {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
    }

    // Zugriff auf Felder (Getter)
    public function getName(): string {
        return $this->name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPhone(): ?string {
        return $this->phone;
    }

    // Statischer Einstiegspunkt zum Builder
    public static function builder(): UserBuilder {
        return new UserBuilder();
    }

    // Der Builder ist eine eigene Klasse
    public static function create(string $name, string $email, ?string $phone): self {
        return new self($name, $email, $phone);
    }
}

// Der Builder
class UserBuilder {
    private string $name = 'Unnamed';
    private string $email = 'no-email@example.com';
    private ?string $phone = null;

    public function setName(string $name): self {
        $this->name = $name;
        return $this;
    }

    public function setEmail(string $email): self {
        $this->email = $email;
        return $this;
    }

    public function setPhone(string $phone): self {
        $this->phone = $phone;
        return $this;
    }

    public function build(): User {
        return User::create($this->name, $this->email, $this->phone);
    }
}

// Nutzung des Builders
//$user = new User("John Doe", "mail@doe.com", null);
$user = User::builder()
    ->setEmail("max@example.com")
    ->setName("Max Mustermann")
    ->setPhone("0123456789")
    ->build();

// Ausgabe zur Kontrolle
echo "Name: " . $user->getName() . PHP_EOL;
echo "E-Mail: " . $user->getEmail() . PHP_EOL;
echo "Telefon: " . $user->getPhone() . PHP_EOL;
