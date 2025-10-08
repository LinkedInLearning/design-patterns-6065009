<?php

// 1. Transport-Interface (gemeinsame Schnittstelle)
interface Transport {
    public function deliver(): void;
}

// 2. Konkrete Implementierungen
class Truck implements Transport {
    public function deliver(): void {
        echo "Lieferung per LKW durchgeführt.\n";
    }
}

class Train implements Transport {
    public function deliver(): void {
        echo "Lieferung per Zug durchgeführt.\n";
    }
}

// 3. Die Factory
class TransportFactory {
    public static function createTransport(string $type): Transport {
        switch (strtolower($type)) {
            case 'truck':
                return new Truck();
            case 'train':
                return new Train();
            default:
                throw new InvalidArgumentException("Unbekannter Transporttyp: $type");
        }
    }
}

// 4. Beispielhafte Nutzung
$transport1 = TransportFactory::createTransport('truck');
$transport1->deliver(); // Ausgabe: Lieferung per LKW durchgeführt.

$transport2 = TransportFactory::createTransport('train');
$transport2->deliver(); // Ausgabe: Lieferung per Zug durchgeführt.

