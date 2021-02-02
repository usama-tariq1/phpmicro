<?php
// session_start();

namespace Controller;

use DB\Category;
// use DB\Category;
include './vendor/autoload.php';
// include 'Controller.php';
// use Db;


use Unirest\Request;

class Home extends Controller 
{

    public function index()
    {
        $cat = new Category();
        $cats =  $cat->select();
        // echo(json_encode($cats));
        self::View('home', '');
    }

    public function search(){

        
    }
}
