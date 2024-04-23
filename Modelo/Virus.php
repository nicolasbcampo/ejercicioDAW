<?php
namespace Modelo;

class Virus{
    public $id;
    public $tipo;
    public $incubacion;

    public function __construct($tipo,$incubacion) {
        $this->tipo = $tipo;
        $this->incubacion = $incubacion;
    }

    public function altabd(){
        $con = new Conexion();
        $query = "INSERT INTO virus (tipo, incubacion) VALUES ('$this->tipo','$this->incubacion')";
        try{
            return $con->con->query($query);
        }catch (\Exception $e){
            return false;
        }
    }

    public static function verbd(){
        $con = new Conexion();
        $query = "SELECT * FROM virus";
        return $con->con->query($query);
    }

    public function modificarbd(){
        $con = new Conexion();
        $query = "UPDATE virus SET tipo = '$this->tipo', incubacion = '$this->incubacion' WHERE id = '$this->id'";
        return $con->con->query($query);
    }

    public function eliminarbd(){
        $con = new Conexion();
        $query = "DELETE FROM virus WHERE id = '$this->id'";
        return $con->con->query($query);
    }

    public static function buscar_virus_por_id($id_virus){
        $con = new Conexion();
        $query = "SELECT * FROM virus WHERE id='$id_virus'";
        $viruses = $con->con->query($query);
        return mysqli_fetch_assoc($viruses);
    }

}

?>