<?php

namespace src\Core;

class Router {
    protected $routes = [];

    // Add a GET route
    public function get($path, $controllerAction) {
        $this->addRoute('GET', $path, $controllerAction);
    }

    // Add a POST route
    public function post($path, $controllerAction) {
        $this->addRoute('POST', $path, $controllerAction);
    }

    // General method to add routes
    protected function addRoute($method, $path, $controllerAction) {
        $this->routes[] = [
            'method' => $method,
            'path' => $this->normalizePath($path),
            'controllerAction' => $controllerAction
        ];
    }

    // Handle the incoming request
    public function handleRequest() {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $this->normalizePath($_SERVER['REQUEST_URI']);

        foreach ($this->routes as $route) {
            if ($method === $route['method'] && $uri === $route['path']) {
                list($controller, $action) = explode('@', $route['controllerAction']);
                
                $controller = "src\\Controllers\\$controller";
                if (class_exists($controller)) {
                    $controllerInstance = new $controller();
                    if (method_exists($controllerInstance, $action)) {
                        return $controllerInstance->$action();
                    }
                }
                $this->handleNotFound();
                return;
            }
        }
        $this->handleNotFound();
    }

    // Normalize the path by trimming slashes
    protected function normalizePath($path) {
        return rtrim($path, '/');
    }

    // Handle 404 error
    protected function handleNotFound() {
        http_response_code(404);
        echo "404 Not Found";
    }
}




