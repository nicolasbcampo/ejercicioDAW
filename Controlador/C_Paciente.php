<?php
namespace Controlador;
use Modelo\Paciente;
use Modelo\Virus;

class C_Paciente{

    public function ver(){
 
        if(isset($_SESSION['usuario_logueado'])){
            require 'Vista/navbar_logueado.php';
            $logged = true;
        } else {
            require 'Vista/navbar_no_logueado.php';
            $logged = false;
        }
        
        $pacientes = Paciente::verbd();
        require 'Vista/ver_pacientes.php';

    }

    public function alta(){

        $paciente = new Paciente($_POST['nombre'],$_POST['edad']);

        $paciente->altabd();
        $this->ver();
    
        require 'Vista/paciente_anhadido.php';

    }

    public function modificar(){

        $paciente = new Paciente($_POST['nombre'],$_POST['edad']);
        $paciente->id = $_POST['id'];

        $paciente->modificarbd();
        $this->ver();

        require 'Vista/paciente_modificado.php';

    }

    public function eliminar(){
        
        $paciente = new Paciente('','');
        $paciente->id = $_POST['id'];

        $paciente->eliminarbd();
        $this->ver();

        require 'Vista/paciente_eliminado.php';
    }

    public function vervirus($id_paciente){
        $this->ver();
        require 'Vista/ver_virus_paciente.php';
    }
}
?>