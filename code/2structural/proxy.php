<?php
// RealSubject – das eigentliche Objekt
class RealImage {
    private $filename;

    public function __construct($filename) {
        $this->filename = $filename;
        echo "Lade die Datei ... ";
        sleep(3); // Simuliere langsames Laden
    }


    public function display() {
        echo "Anzeige Bild: '{$this->filename}'\n";
    }
}

// Proxy – kontrolliert den Zugriff auf das RealSubject
class ProxyImage {
    private $realImage;
    private $filename;

    public function __construct($filename) {
        $this->filename = $filename;
    }

    public function display() {
        // RealImage wird erst bei Bedarf geladen (Lazy Loading)
        if ($this->realImage === null) {
            $this->realImage = new RealImage($this->filename);
        }
        $this->realImage->display();
    }
}

// Client-Code
$image1 = new ProxyImage("foto1.jpg");
$image2 = new ProxyImage("foto2.jpg");

$image1->display(); // Bild wird geladen und angezeigt
$image1->display(); // Bild wird nicht erneut geladen, nur angezeigt

$image2->display(); // Bild wird geladen und angezeigt
