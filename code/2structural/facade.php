<?php
// Subsystem 1
class CPU {
    public function freeze() { echo "CPU wird eingefroren...\n"; }
    public function jump($position) { echo "Springe zu Adresse $position...\n"; }
    public function execute() { echo "Programm wird ausgeführt...\n"; }
}

// Subsystem 2
class Memory {
    public function load($position, $data) {
        echo "Lade Daten '$data' in Speicheradresse $position...\n";
    }
}

// Subsystem 3
class HardDrive {
    public function read($lba, $size) {
        echo "Lese $size Byte ab Adresse $lba von der Festplatte...\n";
        return "BOOT_SEKTOR_CODE";
    }
}

// Facade
class ComputerFacade {
    private $cpu;
    private $memory;
    private $hardDrive;

    public function __construct() {
        $this->cpu = new CPU();
        $this->memory = new Memory();
        $this->hardDrive = new HardDrive();
    }

    public function start() {
        echo "=== Computer wird gestartet ===\n";
        $this->cpu->freeze();
        $data = $this->hardDrive->read(0, 512);
        $this->memory->load(0, $data);
        $this->cpu->jump(0);
        $this->cpu->execute();
        echo "=== Computer läuft ===\n";
    }
}

// Client-Code
$computer = new ComputerFacade();
$computer->start();
