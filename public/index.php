<?php
session_start();

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));


require_once ROOT.DS.'lib_TEST'.DS.'init.php';

App::run($_SERVER['REQUEST_URI']);



?>