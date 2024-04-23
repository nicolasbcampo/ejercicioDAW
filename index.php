<?php
    @session_start();
    require_once('Autoload.php');

use Controlador\C_Contagio;
use Controlador\C_frontal;
    use Controlador\C_Usuario;
    use Controlador\C_Paciente;
    use Controlador\C_Virus;
       

    $c_frontal = new C_frontal();
    $c_frontal->capturar_opcion();

    if($c_frontal->clase == 'inicio'){
        if(isset($_SESSION['usuario_logueado'])){
            require 'Vista/navbar_logueado.php';
        } else {
            require 'Vista/navbar_no_logueado.php';
        }
        require 'Vista/home.php';
    } else if ($c_frontal->clase == 'contacto'){
        
        require 'Vista/navbar_logueado.php';
        require 'Vista/contacto.php';

    } else if ($c_frontal->clase == 'usuario'){

        $user = new C_Usuario();

        switch($c_frontal->accion){
            case 'alta':
                $user->alta();
                break;
            case 'comprobar':
                $user->comprobar();
                break;
            case 'logout':
                $user->logout();
                break;
        }

    } else if ($c_frontal->clase == 'paciente') {

        $paciente = new C_Paciente();

        switch($c_frontal->accion){
            case 'alta':
                $paciente->alta();
                break;
            case 'ver':
                $paciente->ver();
                break;
            case 'eliminar':
                $paciente->eliminar();
                break;
            case 'modificar':
                $paciente->modificar();
                break;
            case 'ver_virus':
                $paciente->vervirus($c_frontal->id);
        }
    
    } else if ($c_frontal->clase == 'virus') {

        $virus = new C_Virus();

        switch($c_frontal->accion){
            case 'alta':
                $virus->alta();
                break;
            case 'ver':
                $virus->ver();
                break;
            case 'eliminar':
                $virus->eliminar();
                break;
            case 'modificar':
                $virus->modificar();
                break;
            case 'ver_pacientes':
                $virus->verpacientes($c_frontal->id);
                break;
        }
    
    } else if ($c_frontal->clase == 'contagio') {

        $contagio = new C_Contagio();

        switch($c_frontal->accion){
            case 'alta':
                $contagio->alta();
                break;
            case 'ver':
                $contagio->ver();
                break;
            case 'eliminar':
                $contagio->eliminar();
                break;
            case 'modificar':
                $contagio->modificar();
                break;
        }
    
    }

?>