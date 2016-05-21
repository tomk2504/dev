<?php
$is_script = false;
$arguments = null;
if(isset($argv)){
	$is_script = true;
	$arguments = $argv;
}
require 'config/database.php';
require 'config/constants.php';

ini_set('include_path', implode(PATH_SEPARATOR, array(
    __DIR__ . '/../cmp/',
    ini_get('include_path')
)));

function __autoload($className){
	$className = strtolower($className);
	require('system/'.$className.'.php');
}

$frontController = new FrontController($arguments);
$frontController->start();