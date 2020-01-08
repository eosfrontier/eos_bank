<?php

define("HOME","location: //www.eosfrontier.space/eos_bank");


    //error_reporting(E_ALL);
    ini_set('display_errors', 0);


function __autoload($classname) {
    include("classes/class.$classname.php");
}

function loggedIn(){
    if(empty($_SESSION)){
        header(HOME);
    }
}

session_start();
?>
