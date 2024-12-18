<?php
class Router {

    private $routes = [];

    // Ajouter une route
    public function addRoute($url, $controller, $action) {
        $this->routes[rtrim($url, '/')] = ['controller' => $controller, 'action' => $action];
    }

    // Gérer la requête
    public function handleRequest() {
        // Récupérer l'URL demandée
        $url = rtrim($_SERVER['REQUEST_URI'], '/');
        
        // Vérifier si la route existe
        foreach ($this->routes as $route => $controllerAction) {
            // Remplacer le paramètre dynamique {id} dans l'URL par un regex
            $routePattern = preg_replace('/\{[a-zA-Z0-9_]+\}/', '([a-zA-Z0-9_]+)', $route);
            
            // Si l'URL correspond au modèle
            if (preg_match('#^' . $routePattern . '$#', $url, $matches)) {
                // Extrait le contrôleur et l'action
                $controllerName = $controllerAction['controller'];
                $action = $controllerAction['action'];

                // Récupérer les paramètres dynamiques (par exemple {id})
                $params = array_slice($matches, 1);

                // Vérifier si le contrôleur existe
                if (class_exists($controllerName)) {
                    $controller = new $controllerName();
                    // Vérifier si l'action existe dans le contrôleur
                    if (method_exists($controller, $action)) {
                        // Appeler l'action avec les paramètres
                        call_user_func_array([$controller, $action], $params);
                    } else {
                        echo "L'action '$action' n'existe pas.";
                    }
                } else {
                    echo "Le contrôleur '$controllerName' n'existe pas.";
                }
                return;
            }
        }

        echo "La route n'existe pas.";
    }
}
