<?php
namespace Controlador;
class C_frontal{
    public $clase = 'inicio';
    public $accion = null;

    public $id = null;

    public function capturar_opcion(){
        if($_GET){
            if(array_key_exists('accion',$_GET)){
                $this->accion=$_GET['accion'];;
            }
            if (array_key_exists('clase',$_GET)){
                $this->clase=$_GET['clase'];
            }
            if (array_key_exists('id',$_GET)){
                $this->id=$_GET['id'];
            }
        }      
    }
}
?>