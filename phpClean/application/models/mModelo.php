<?php

class MModelo extends CI_Model
    
{
    
    function __construct(){
        parent::__construct();
        $this->load->database();
    }
   
    function insertar($tabla,$imagen){
        $this->db->insert($tabla,$imagen);
    }
    
    function obtenerAmbasImagenes($image){
    $query = $this->db->query("select imagenCajero.imagen as ic, imagenTouch.imagen as it from imagenCajero join imagenTouch on imagenCajero.id = imagenTouch.id where imagenTouch.imagen = '$image'");
        
        if($query->num_rows>0){
            return $query;
        }else return $query;
        
        
    }
}


?>
