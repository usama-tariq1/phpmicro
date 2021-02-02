<?php

namespace DB;
// use Medoo\Medoo as pt;

class Category extends Database {

    protected $table_name = 'categories';
    protected $db ;

    public function __construct(){
       
       $this->db = Database::link();
       
    }

    


    // public function select(){
    //     return $this->db->select($this->table_name , '*');
    // }
    
    
}

