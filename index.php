<?php
// FRONT-CONTROLLER
// UNHIDE ERRORS AND EXCEPTIONS 
ini_set('display_errors',1);
error_reporting(E_ALL);
// USER INIT
session_start();
// FILES ATTACHMENTS
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/details/Loader.php');
// APP RUN
$router = new Router();
$router->run();
