<?php

function __autoload($class) {
    $dirs = array('/routes/', '/models/', '/helpers/');
    for($i = 0; $i < count($dirs); $i ++) {
        $f = ROOT . $dirs[$i] . $class . '.php';
        if(is_file($f)) include_once $f;
    }
}


