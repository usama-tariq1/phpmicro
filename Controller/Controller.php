<?php

namespace Controller;

// require 'db/Database.php';
use DB\Database;
require 'vendor/autoload.php';
// require 'Home.php';
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});


// use Latte\Latte as latte;

// namespace Controller;

class Controller extends Database
{

    
    public function __construct()
    {
        spl_autoload_register(function ($class_name) {
            include $class_name . '.php';
        });
    }

    private static function renderer()
    {
        // $loader = new \Twig\Loader\FilesystemLoader('views');


        // $twig = new \Twig\Environment($loader);

        // // $lexer = new Twig\Lexer($twig, array(
        // //     'tag_block'    => array('{', '}'),
        // //     'tag_variable' => array('{{', '}}')


        // // ));

        // // $twig->setLexer($lexer);
        // return $twig;



        $loader = new \Latte\Loaders\FileLoader('views');
        $latte = new \Latte\Engine();
        $latte->setLoader($loader);

        // $latte->setTempDirectory('views');

        return $latte;
    }


    public static function View($viewname, $data)
    {

        echo self::renderer()->render($viewname . ".html", compact('data'));
    }
}
