<?php
namespace src\Controllers;

use src\Controllers\Controller; 

class HomeController extends Controller{

     public function index() {
        $this->view('home', ['title' => 'Home Page']);
    }
}

