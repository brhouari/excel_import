<?php

namespace src\Controllers;

class Controller {
    public function view($view, $data = []) {
        require_once '../src/Views/' . $view . '.php';
    }

    public function model($model) {
        require_once '../src/Models/' . $model . '.php';
        return new $model();
    }
}
