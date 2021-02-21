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

//survey route
$f3->route('GET /survey', function(){
    //echo "Survey 1 Page";
    $view = new Template();
    echo $view->render('views/survey.html');
});

//summary route
$f3->route('POST /summary', function() {

    //echo "<p>POST:<p>";
    //var_dump($_POST);           //post array only contains the most updated data

    //echo "<p>SESSION:<p>";
    //var_dump($_SESSION);        //session array most secure array for data

    if(isset($_POST['name'])){
        $_SESSION['name'] = $_POST['name'];
    }


    //add data from form 2 to session array
    if(isset($_POST['survey'])){
        $_SESSION['survey'] = implode(", ", $_POST['survey']);
    }

    //echo "Summary Route";
    $view = new Template();
    echo $view->render('views/survey-summary.html');

});


//Run fat free
$f3->run();