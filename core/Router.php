<?php
class Router {
    private $routes = [];

    // Ajouter une route
    public function addRoute($url, $controller, $action) {
        $this->routes[rtrim($url, '/')] = ['controller' => $controller, 'action' => $action];
    }

    // Gérer la requête
    public function handleRequest() {
        // Récupérer l'URL demandée et enlever les slashes à la fin
        $url = rtrim($_SERVER['REQUEST_URI'], '/');

        // Vérifier si la route existe
        if (isset($this->routes[$url])) {
            $route = $this->routes[$url];
            $controllerName = $route['controller'];
            $action = $route['action'];

            // Vérifier si le contrôleur existe
            if (class_exists($controllerName)) {
                $controller = new $controllerName();
                // Vérifier si l'action existe dans le contrôleur
                if (method_exists($controller, $action)) {
                    $controller->$action(); // Appeler l'action du contrôleur
                } else {
                    echo "L'action '$action' n'existe pas.";
                }
            } else {
                echo "Le contrôleur '$controllerName' n'existe pas.";
            }
        } else {
            echo "La route n'existe pas.";
        }
    }
}
