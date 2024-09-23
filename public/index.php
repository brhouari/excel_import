<?php
require_once '../vendor/autoload.php';

use src\Core\Router;
use src\Controllers\HomeController;


// Initialize the router
$router = new Router();

// Define routes
$router->add('', [new HomeController(), 'index']);
$router->add('home', [new HomeController(), 'index']);

// Dispatch the request
$url = trim($_SERVER['REQUEST_URI'], '/');
$router->dispatch($url);
