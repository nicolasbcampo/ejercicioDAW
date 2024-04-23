<?php
namespace Modelo;

class Conexion{
    public $con;

    public function __construct()
    {
        $this->con = new \mysqli('localhost','root','','bd_1');
    }
}


?>