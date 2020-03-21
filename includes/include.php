<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define("HOME","location: //www.eosfrontier.space/eos_bank");


    //error_reporting(E_ALL);
    ini_set('display_errors', 1);


//function __autoload($classname) {
    //include("classes/class.$classname.php");
//}

spl_autoload_register(function($class) {
    include 'classes/class.' . $class . '.php';
});

function loggedIn(){
    if(empty($_SESSION)){
        header(HOME);
    }
}

session_start();
?>
