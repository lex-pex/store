<?php

class Router {

    private $routes;

    function __construct() {
        $routesFile = ROOT.'/cfg/routes.php';
        $this->routes = include($routesFile);
    }

    public function run() {

        $request = $this->getURI();

        foreach ($this->routes as $pattern => $path) {
//echo "pattern = $pattern -> path = $path <br/>";
            if (preg_match("|$pattern|", $request)) {

                $route = preg_replace("|$pattern|", $path, $request);
//echo "route = $route <br/>";
                $params = explode('/', $route);
//print_r($params);echo '<br/>';
                $control = ucfirst(array_shift($params).'Controller');
//echo "control = $control <br/>";
                $action = 'action'.ucfirst(array_shift($params));
//echo "action = $action   <br/>";
                $file = ROOT.'/control/'.$control.'.php';

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
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

}










