<?php

// routes.php
use src\Core\Router;
$router = new Router();

// Define routes
$router->get('/', 'HomeController@index');$router->get('/home', 'HomeController@index');
$router->get('/user', 'UserController@index');
$router->get('/upload', 'FileController@index');
$router->post('/upload_excel', 'FileController@upload');
// Route for login page (GET and POST requests)
$router->get('/login', 'AuthController@login');
$router->post('/login', 'AuthController@login');

// Route for logout
$router->get('/logout', 'AuthController@logout');

// Handle incoming request
$router->handleRequest();
