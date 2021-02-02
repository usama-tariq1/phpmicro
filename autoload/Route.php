<?php

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});



require_once('./vendor/autoload.php');
// require_once('./Controller/Controller.php');
// use Controller;
// use Home;



class Route
{
    public static $validRoutes = array();

    public static function klein($route , $callback){
        
        

        $klein = new \Klein\Klein();


        $klein->respond($route , function ($request) {
                
            // require_once("./Controller/Home.php");
            return Controller\Home::index();
        });




        $klein->dispatch();
    }

    public static function set($route, $function)
    {
        self::$validRoutes[] = $route;


        if (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == $route) {
            $funar = explode('@', $function);
            if (isset($funar[1])) {
                $realf = $funar[0] . "::" . $funar['1'];
            } else {
                $realf = $funar[0] . "::index";
            }
            // $realf = $funar[0] . "::" . $funar['1'];
            return $realf();
        }
        // echo $route;

    }
    public static function res($route, $function)
    {
        self::$validRoutes[] = $route;
        $requrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if ($requrl == $route . "") {

            $realf = $function . "::index";
            return $realf();
        }
        if ($requrl == $route . "/new") {

            $realf = $function . "::new";
            return $realf();
        }
        if ($requrl == $route . "/create") {

            $realf = $function . "::create";
            return $realf();
        }
        if ($requrl == $route . "/update") {

            $realf = $function . "::update";
            return $realf();
        }
        if ($requrl == $route . "/delete") {

            $realf = $function . "::delete";
            return $realf();
        }
        if ($requrl == $route . "/readall") {

            $realf = $function . "::readall";
            return $realf();
        }
        if ($requrl == $route . "/read") {

            $realf = $function . "::read";
            return $realf();
        }
    }
    public static function setfunc($route, $function)
    {
        self::$validRoutes[] = $route;


        if (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == $route) {
            $function->__invoke();
        }
    }
}
