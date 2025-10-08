<?php
// Teures Objekt
class BigData {
    public function __construct() {
        echo "BigData wird geladen (teure Operation)...\n";
        sleep(3); 
    }

    public function process() {
        echo "BigData wird verarbeitet.\n";
    }
}

// Proxy / Lazy Loader
class LazyBigData {
    private  $bigData = null;

    public function process() {
        if ($this->bigData === null) {
            // BigData wird erst bei Bedarf erzeugt
            $this->bigData = new BigData();
        }
        $this->bigData->process();
    }
}

// Client-Code
$lazyData = new LazyBigData();
$lazyData->process();  // Erst hier wird BigData geladen
