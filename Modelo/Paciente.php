<?php
namespace Modelo;

class Paciente{
    public $id;
    public $nombre;
    public $edad;

    public function __construct($nombre,$edad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    public function altabd(){
        $con = new Conexion();
        $query = "INSERT INTO pacientes (nombre, edad) VALUES ('$this->nombre','$this->edad')";
        try{
            return $con->con->query($query);
        }catch (\Exception $e){
            return false;
        }
    }

    public static function verbd(){
        $con = new Conexion();
        $query = "SELECT * FROM pacientes";
        return $con->con->query($query);
    }

    public function modificarbd(){
        $con = new Conexion();
        $query = "UPDATE pacientes SET nombre = '$this->nombre', edad = '$this->edad' WHERE id = '$this->id'";
        return $con->con->query($query);
    }

    public function eliminarbd(){
        $con = new Conexion();
        $query = "DELETE FROM pacientes WHERE id = '$this->id'";
        return $con->con->query($query);
    }

    public static function buscar_paciente_por_id($id_paciente){
        $con = new Conexion();
        $query = "SELECT * FROM pacientes WHERE id='$id_paciente'";
        $pacientes = $con->con->query($query);
        
        return mysqli_fetch_assoc($pacientes);
    }
}

?>