<?php
// ConcreteComponent – Basisobjekt
class SimpleCoffee {
    public function getCost(): float {
        return 2.0;
    }

    public function getDescription(): string {
        return "Einfacher Kaffee";
    }
}

// ConcreteDecorator – Milch hinzufügen
class MilkDecorator {
     public function __construct($coffee) {
        $this->coffee = $coffee;
    }

    public function getCost() { 
        return $this->coffee->getCost() + 0.5;
    }

    public function getDescription() {
        return $this->coffee->getDescription() . " mit Milch";
    }
}

// Client-Code
$coffee = new SimpleCoffee();
echo $coffee->getDescription() . " kostet " . $coffee->getCost() . " €\n";

// Kaffee mit Milch dekorieren
$coffeeWithMilk = new MilkDecorator($coffee);
echo $coffeeWithMilk->getDescription() . " kostet " . $coffeeWithMilk->getCost() . "€\n";
