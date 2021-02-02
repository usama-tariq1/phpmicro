<?php


// session_start();
//home





use Controller\Home ;




spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});


require_once('./vendor/autoload.php');


$klein = new \Klein\Klein();


$klein->respond('/', function ($request) {
        
    // require_once("./Controller/Home.php");
    
    return Home::index();
});




$klein->dispatch();