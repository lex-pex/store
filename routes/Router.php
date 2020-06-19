<?php

/**
 * Class Router
 * handles routes by assigning controllers and actions
 */
class Router {

    private $routes;

    function __construct() {
        $routesFile = ROOT.'/routes/routes.php';
        $this->routes = include($routesFile);
    }

    /**
     * Call the corresponding controllers action
     */
    public function run() {
        $request = $this->getURI();
        foreach ($this->routes as $pattern => $path) {
            if (preg_match("|$pattern|", $request)) {
                $route = preg_replace("|$pattern|", $path, $request);
                $params = explode('/', $route);
                $control = ucfirst(array_shift($params).'Controller');
                $action = 'action'.ucfirst(array_shift($params));
                $file = ROOT.'/controllers/'.$control.'.php';
                if (file_exists($file)) {
                    include_once ($file);
                    $obj = new $control();
                    call_user_func_array(array($obj, $action), $params);
                }
                break;
            }
        }
    }

    private function getURI() {
        if (!empty($_SERVER['REQUEST_URI']))
            return trim($_SERVER['REQUEST_URI'], '/');
        return null;
    }
}










