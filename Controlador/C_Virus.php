<?php
namespace Controlador;
use Modelo\Virus;
class C_Virus{

    public function ver(){
 
        if(isset($_SESSION['usuario_logueado'])){
            require 'Vista/navbar_logueado.php';
            $logged = true;
        } else {
            require 'Vista/navbar_no_logueado.php';
            $logged = false;
        }
        
        $viruses = Virus::verbd();
        require 'Vista/ver_virus.php';

    }

    public function alta(){

        $virus = new Virus($_POST['tipo'],$_POST['incubacion']);

        $virus->altabd();
        $this->ver();
    
        require 'Vista/virus_anhadido.php';

    }

    public function modificar(){

        $virus = new Virus($_POST['tipo'],$_POST['incubacion']);
        $virus->id = $_POST['id'];

        $virus->modificarbd();
        $this->ver();

        require 'Vista/virus_modificado.php';

    }

    public function eliminar(){
        
        $virus = new Virus('','');
        $virus->id = $_POST['id'];

        $virus->eliminarbd();
        $this->ver();

        require 'Vista/virus_eliminado.php';
    }

    public function verpacientes($id_virus){
        $this->ver();
        require 'Vista/ver_pacientes_virus.php';
    }
}
?>