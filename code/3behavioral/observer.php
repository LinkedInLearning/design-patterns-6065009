<?php
// Concrete Subject
class NewsPublisher {
    private array $observers = [];

    public function attach($observer) {
        $this->observers[] = $observer;
    }

    public function notify($news) {
        foreach ($this->observers as $observer) {
            $observer->update($news);
        }
    }

    public function addNews(string $news) {
        $this->notify($news);
    }
}

// Concrete Observer
class Subscriber {
    private string $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function update($message) {
        echo "{$this->name} erhält Nachricht: {$message}\n";
    }
}

// Client-Code
$publisher = new NewsPublisher();

$alice = new Subscriber("Alice");
$bob = new Subscriber("Bob");

$publisher->attach($alice);
$publisher->attach($bob);

$publisher->addNews("Neues Design-Pattern Tutorial verfügbar!");
$publisher->addNews("PHP 8.3 bringt spannende Features!");
