<?php

// routes.php
use src\Core\Router;
$router = new Router();

// Define routes
$router->get('/', 'HomeController@index');$router->get('/home', 'HomeController@index');
$router->get('/user', 'UserController@index');
$router->get('/upload', 'FileController@index');
//$router->post('/upload', 'FileController@upload');

// Handle incoming request
$router->handleRequest();
