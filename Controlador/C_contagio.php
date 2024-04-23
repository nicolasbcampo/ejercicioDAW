<?php
namespace Controlador;
use Modelo\Contagio;
class C_Contagio{

    public function ver(){
        
        $contagios = Contagio::verbd();
        require 'Vista/navbar_logueado.php';
        require 'Vista/ver_contagios.php';

    }

    public function alta(){

        $contagio = new Contagio($_POST['fecha_detec'],$_POST['fecha_fin'],$_POST['id_paciente'],$_POST['id_virus']);

        $contagio->altabd();
        $this->ver();
    
        require 'Vista/contagio_anhadido.php';

    }

    public function modificar(){

        $contagio = new Contagio($_POST['fecha_detec'],$_POST['fecha_fin'],$_POST['id_paciente'],$_POST['id_virus']);
        $contagio->id = $_POST['id'];

        $contagio->modificarbd();
        $this->ver();

        require 'Vista/contagio_modificado.php';

    }

    public function eliminar(){
        
        $contagio = new Contagio('','','','');
        $contagio->id = $_POST['id'];

        $contagio->eliminarbd();
        $this->ver();

        require 'Vista/contagio_eliminado.php';
    }

    
}
?>