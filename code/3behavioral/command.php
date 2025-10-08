<?php
// Receiver – das Objekt, das die eigentliche Arbeit macht
class Light {
    public function turnOn() {
        echo "Licht ist AN\n";
    }
    public function turnOff() {
        echo "Licht ist AUS\n";
    }
}

// ConcreteCommand – kapselt die Aktion
class TurnOnCommand {
    private Light $light;
    public function __construct(Light $light) {
        $this->light = $light;
    }
    public function execute() {
        $this->light->turnOn();
    }
}

class TurnOffCommand {
    private Light $light;
    public function __construct(Light $light) {
        $this->light = $light;
    }
    public function execute() {
        $this->light->turnOff();
    }
}

// Invoker – löst den Befehl aus
class RemoteControl {
    private array $commands = [];
    public function setCommand($command, $button) {
        $this->commands[$button] = $command;
    }
    public function pressButton(string $button) {
        $this->commands[$button]->execute();
       
    }
}

// Client-Code
$light = new Light();

$turnOn = new TurnOnCommand($light);
$turnOff = new TurnOffCommand($light);

$remote = new RemoteControl();
$remote->setCommand($turnOn, "ON");
$remote->setCommand($turnOff, "OFF");

$remote->pressButton("ON");
$remote->pressButton("OFF");
