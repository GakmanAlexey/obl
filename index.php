<?php

define("MYPOS" , __DIR__);
define("SLASH" ,"\\");

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

spl_autoload_register(function ($class_name) {   
    $class_name = str_replace('\\','/',$class_name);
    $class_name = strtolower($class_name);
    if(file_exists(MYPOS."/".$class_name . '.php')){include_once MYPOS."/".$class_name . '.php';}
    
});
session_start();
$usernr = new \Mod\UserNR\User;
$user_id = $usernr->cheack();
define("USI" ,$user_id);
//var_dump($user_id);
$router = new \Mod\Router\Router;
?>