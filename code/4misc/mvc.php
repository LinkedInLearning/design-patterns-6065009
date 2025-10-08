<?php

// Model – die Daten
class UserModel {
    private string $name = "";

    public function setName(string $name) {
        $this->name = $name;
    }

    public function getName(): string {
        return $this->name;
    }
}

// View – Darstellung
class UserView {
    public function display(string $name) {
        echo "Benutzername: $name\n";
    }
}

// Controller – steuert die Logik
class UserController {
    private UserModel $model;
    private UserView $view;

    public function __construct(UserModel $model, UserView $view) {
        $this->model = $model;
        $this->view = $view;
    }

    public function setUserName(string $name) {
        $this->model->setName($name);
    }

    public function updateView() {
        $this->view->display($this->model->getName());
    }
}

// Client-Code
$model = new UserModel();
$view = new UserView();
$controller = new UserController($model, $view);

$controller->setUserName("Alice");
$controller->updateView();

$controller->setUserName("Bob");
$controller->updateView();
