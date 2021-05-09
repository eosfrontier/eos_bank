<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define("HOME","location: //www.eosfrontier.space/eos_bank");

if( $_SERVER['HTTP_HOST'] === "site.test" ){
	$location = 'localhost/orthanc/';
}
else{
	$location = "//api.eosfrontier.space/orthanc/";
}

global $location;

    //error_reporting(E_ALL);
    ini_set('display_errors', 1);


//function __autoload($classname) {
    //include("classes/class.$classname.php");
//}

//spl_autoload_register(function($class) {
      include 'classes/class.bank.php';
//});

function loggedIn(){
    if(empty($_SESSION)){
        header(HOME);
    }
}

session_start();
?>
