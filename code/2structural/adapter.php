<?php
// Implementation für ein normales Buch
class PaperBook {
    public function open() {
        echo "Buch wird geöffnet.\n";
    }

    public function turnPage() {
        echo "Nächste Seite im Papierbuch.\n";
    }
}

// Adaptee – inkompatible Klasse
class EBookReader {
    public function unlock() {
        echo "E-Book wird entsperrt.\n";
    }

    public function pressNextButton() {
        echo "Nächste Seite im E-Book.\n";
    }
}

// Adapter – nutzt Vererbung
class EBookAdapter extends EBookReader {
    public function open() { // übersetzt open() auf unlock()
        $this->unlock();
    }

    public function turnPage() { // übersetzt turnPage() auf pressNextButton()
        $this->pressNextButton();
    }
}

// Client-Code
foreach (['PaperBook', 'EBookAdapter'] as $bookClass) {
    $book = new $bookClass();
    $book->open();
    $book->turnPage();
}

