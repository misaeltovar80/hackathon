<?php


class CControl extends CI_Controller{
    
    
    
    function __construct(){
        parent::__Construct();
        $this->load->model('mModelo');
    }
    
    
    function insertarImagenTouch(){
        $imagen =array("imagen"=>$_POST["imagen"]);
        $tabla =  "imagenTouch";
        
        $this->mModelo->insertar($tabla,$imagen);
        
        echo "Se insertó";
    }
    
     function insertarImagenCajero(){
        $imagen =array("imagen"=>$_POST["imagen"]);
        $tabla =  "imagenCajero";
        
        $this->mModelo->insertar($tabla,$imagen);
        
        echo "Se insertó";
    }
    
    
    function obtenerImagenes(){
        $rs = $this->mModelo->obtenerAmbasImagenes($_POST["image"]);
        
        foreach($rs->result() as $get){
            $ret = array("ic"=>$get->ic,
                       "it"=>$get->it);
        }
        echo json_encode($ret);
    }
    
    
}