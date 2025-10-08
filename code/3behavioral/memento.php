<?php
// Originator – das Objekt, dessen Zustand gespeichert wird
class Editor {
    private string $content = "";

    public function setContent(string $content) {
        $this->content = $content;
    }

    public function getContent(): string {
        return $this->content;
    }

    public function save(): Memento {
        return new Memento($this->content);
    }

    public function restore(Memento $memento) {
        $this->content = $memento->getState();
    }
}

// Memento – speichert den Zustand
class Memento {
    private string $state;

    public function __construct(string $state) {
        $this->state = $state;
    }

    public function getState(): string {
        return $this->state;
    }
}

// Caretaker – verwaltet die Mementos
class History {
    private array $states = [];

    public function push(Memento $memento) {
        $this->states[] = $memento;
    }

    public function pop(): ?Memento {
        return array_pop($this->states) ?: null;
    }
}

// Client-Code
$editor = new Editor();
$history = new History();

$editor->setContent("Version 1");
$history->push($editor->save());

$editor->setContent("Version 2");
$history->push($editor->save());

$editor->setContent("Version 3");
echo "Aktueller Inhalt: " . $editor->getContent() . "\n";

// Zustand zurücksetzen
$editor->restore($history->pop());
echo "Nach Undo: " . $editor->getContent() . "\n";

$editor->restore($history->pop());
echo "Nach weiterem Undo: " . $editor->getContent() . "\n";
