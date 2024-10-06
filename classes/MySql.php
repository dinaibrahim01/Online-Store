<?php

class MySql {

    private $host = "localhost" , $userName = "root" , $password= "", $db_name = "onlineshop";

    protected $conn ;

    public function __construct(){
        $this->conn= mysqli_connect($this->host, $this ->userName , $this -> password , $this -> db_name );
    }
}