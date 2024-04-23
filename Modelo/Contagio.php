<?php
namespace Modelo;

class Contagio{
    public $id;
    public $fecha_detec;
    public $fecha_fin;
    public $id_paciente;
    public $id_virus;

    public function __construct($fecha_detec,$fecha_fin,$id_paciente,$id_virus) {
        $this->fecha_detec = $fecha_detec;
        $this->fecha_fin = $fecha_fin; 
        $this->id_paciente = $id_paciente;
        $this->id_virus = $id_virus;
    }

    public function altabd(){
        $con = new Conexion();
        $query = "INSERT INTO contagios (fecha_detec, fecha_fin, id_paciente, id_virus) VALUES ('$this->fecha_detec','$this->fecha_fin','$this->id_paciente','$this->id_virus')";
        try{
            return $con->con->query($query);
        }catch (\Exception $e){
            return false;
        }
    }

    public static function verbd(){
        $con = new Conexion();
        $query = "SELECT * FROM contagios";
        return $con->con->query($query);
    }

    public function modificarbd(){
        $con = new Conexion();
        $query = "UPDATE contagios SET fecha_detec = '$this->fecha_detec', fecha_fin = '$this->fecha_fin', id_paciente = '$this->id_paciente', id_virus = '$this->id_virus' WHERE id = '$this->id'";
        return $con->con->query($query);
    }

    public function eliminarbd(){
        $con = new Conexion();
        $query = "DELETE FROM contagios WHERE id = '$this->id'";
        return $con->con->query($query);
    }

    public static function buscar_contagios_por_id_paciente($id_paciente){
        $con = new Conexion();
        $query = "SELECT * FROM contagios WHERE id_paciente = '$id_paciente'";
        $contagios = $con->con->query($query);
        return $contagios;
    }

    public static function buscar_contagios_por_id_virus($id_virus){
        $con = new Conexion();
        $query = "SELECT * FROM contagios WHERE id_virus = '$id_virus'";
        $contagios = $con->con->query($query);
        return $contagios;
    }

    
    
}

?>