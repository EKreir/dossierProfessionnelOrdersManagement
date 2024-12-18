<?php
class Router {
    private $routes = [];

    // Ajouter une route
    public function addRoute($url, $controller, $action) {
        $this->routes[$url] = ['controller' => $controller, 'action' => $action];
    }

    // Gérer la requête
    public function handleRequest() {
        $url = $_SERVER['REQUEST_URI'];
        $url = rtrim($url, '/'); // Enlever le slash final

        foreach ($this->routes as $route => $action) {
            if ($url === $route) {
                // Inclure le contrôleur et appeler l'action
                $controllerFile = __DIR__ . '/../controllers/' . $action['controller'] . '.php';
                if (file_exists($controllerFile)) {
                    require_once $controllerFile;
                    $controllerName = $action['controller'];
                    $controller = new $controllerName();
                    $controller->{$action['action']}();
                }
                return;
            }
        }

        echo "Page introuvable.";
    }
}
