<?php


namespace DB;
require_once "vendor/autoload.php";

use Medoo\Medoo as con;
// require 'link.php';

class Database
{
    // private con = new con();

    // protected $table_name;

    protected $db ;
    protected $table_name;

    // public function __construct()
    // {
        
    //     $db = new con([
    //         'database_type' => 'mysql',
    //         'database_name' => 'altra_hd',
    //         'server' => 'localhost',
    //         'username' => 'root',
    //         'password' => ''
    //     ]);
    //     return $db;
    // }

    





    public static function link()
    {
 
        $db = new con([
            'database_type' => 'mysql',
            'database_name' => 'altra_hd',
            'server' => 'localhost',
            'username' => 'root',
            'password' => ''
        ]);
        return $db;
    }


    public function select(){
        return $this->db->select($this->table_name , '*');
    }

    //remote

    // public static function link()
    // {

    //     $db = new con([
    //         'database_type' => 'mysql',
    //         'database_name' => 'freegmgj_exchangeapp',
    //         'server' => 'localhost',
    //         'username' => 'freegmgj_projects',
    //         'password' => '4wotcBunny.'
    //     ]);
    //     return $db;
    // }




    // public function has($st)
    // {
    //     $ft = $this->table_name;
    // }

    // public function all()
    // {
    //     return self::link()->select($this->table_name, '*');
    // }
    // public function find(array $where)
    // {
    //     return self::link()->select($this->table_name, '*', $where);
    // }
    // public function add(array $data)
    // {
    //     return self::link()->insert($this->table_name, $data);
    // }

}
