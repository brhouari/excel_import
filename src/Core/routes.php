<?php

// routes.php
use src\Core\Router;
$router = new Router();

// Define routes
$router->get('/', 'HomeController@index');
$router->get('/user', 'UserController@index');
$router->post('/upload', 'FileController@upload');

// Handle incoming request
$router->handleRequest();
