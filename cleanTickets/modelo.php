<?php


//incluye la clase Libro y CrudLibro
require_once('control.php');
require_once('datos.php');

$control = new Control();
$datos = new Datos();


	function insertarImagenCajero(){
				$datos->setImagen("imagen.jpg");
		

		if($crud->insertar($datos)){
		echo "Si";

		}else{
			echo "no";
		}
		
	}