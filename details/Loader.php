<?php

function __autoload($class) {

    $paths = array(
        '/model/',
        '/details/'
    );

    foreach ($paths as $p)  {
        $p = ROOT . $p . $class . '.php';
        if (is_file($p)) {
            include_once $p;
        }
    }
}


