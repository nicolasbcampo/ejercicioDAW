<?php
namespace Modelo;

class Usuario{
    public $nombre;
    public $contrasenha;

    public function __construct($nombre,$contrasenha) {
        $this->nombre = $nombre;
        $this->contrasenha = $contrasenha;
    }

    public function altabd(){
        $con = new Conexion();
        $query = "INSERT INTO usuarios (nombre, contrasenha) VALUES ('$this->nombre','$this->contrasenha')";
        try{
            return $con->con->query($query);
        }catch (\Exception $e){
            return false;
        }
    }

    public function login(){
        $con = new Conexion();
        $query = "SELECT * FROM usuarios WHERE nombre='".$this->nombre."'";
        $usuarios = $con->con->query($query);
        if($usuarios->num_rows == 0){
            return 'wrong_user';
        }
        while($usuario = mysqli_fetch_assoc($usuarios)){
            if($usuario['contrasenha'] == $this->contrasenha){
                return 'correct';
            } else {
                return 'wrong_pass';
            }
        }
    }
}

?>