<?php
namespace Controlador;
use Modelo\Usuario;
class C_Usuario {


    public function alta(){

        $usuario = new Usuario($_POST['nombre'],$_POST['contrasenha']);

        if($usuario->altabd()){
            require 'Vista/navbar_no_logueado.php';
            require 'Vista/home.php';
            require 'Vista/registro_correcto.php';
        } else {
            require 'Vista/navbar_no_logueado.php';
            require 'Vista/home.php';
            require 'Vista/registro_incorrecto.php';
        }

    }

    public function comprobar(){       

        $usuario = new Usuario($_POST['nombre'],$_POST['contrasenha']);

        $log_result = $usuario->login();
        if($log_result == 'correct'){
            $_SESSION['usuario_logueado'] = $_POST['nombre'];
            require 'Vista/navbar_logueado.php';
            require 'Vista/home.php';
            require 'Vista/login_correcto.php';
        } else if ($log_result == 'wrong_user'){
            require 'Vista/navbar_no_logueado.php';
            require 'Vista/home.php';
            require 'Vista/login_incorrecto_user.php';
        } else if ($log_result == 'wrong_pass'){
            require 'Vista/navbar_no_logueado.php';
            require 'Vista/home.php';
            require 'Vista/login_incorrecto_pass.php';
        }
    }

    public function logout(){
        session_destroy();
        require 'Vista/navbar_no_logueado.php';
        require 'Vista/home.php';
    }

}

?>