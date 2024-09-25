<?php
require_once '../vendor/autoload.php';

use src\Core\Router;
use src\Controllers\HomeController;
use src\Controllers\UserController;

// Initialize the router
$router = new Router();

// Define routes
$router->add('', [new HomeController(), 'index']);
$router->add('home', [new HomeController(), 'index']);
$router->add('user', [new UserController(), 'index']);

// Dispatch the request
$url = trim($_SERVER['REQUEST_URI'], '/');
$router->dispatch($url);
