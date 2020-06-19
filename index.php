<?php
// Front-Controller
// show errors and exception
ini_set('display_errors',1);
// warning "_autoload() php7.2 deprecated" is suppressed
// error_reporting(E_ALL);
// User Init
session_start();
// Files Attachments
define('ROOT', dirname(__FILE__));
require_once(ROOT . '/helpers/Loader.php');
// Launch the app
$router = new Router();
$router->run();
