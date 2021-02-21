<?php

//This is my CONTROLLER

//Turn on error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);


//Require the autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base class
$f3 = Base::instance();
$f3->set('DEBUG', 3);

//Define a default route (home page)
$f3->route('GET /', function() {
    //echo "Survey Home"; //(home page, no index.php, go to directory)
    $view = new Template();
    echo $view->render('views/home.html');
});

//Run fat free
$f3->run();