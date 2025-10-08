<?php
// Konkreter Prototype
class Car {
    public $brand;
    public $color;

    public function __construct($brand, $color) {
        $this->brand = $brand;
        $this->color = $color;
        sleep(3); // Simuliert einen aufwändigen Erstellungsprozess
    }

    public function describe() {
        echo "Auto: {$this->brand}, Farbe: {$this->color}\n";
    }
}

// Client-Code
echo "Original-Objekt\n";
$car1 = new Car("Van", "Schwarz");
$car1->describe();

echo "Klon\n";
$car2 = clone $car1;
$car2->color = "Rot";
$car2->describe();
