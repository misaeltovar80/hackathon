<?php

require 'conexion.php';


/**
 * 
 */
class control
{
	
	function __construct()
	{
		# code...
	}

			public function insertar($imagen){
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO imagenCajero values(:imagen)');
			$insert->bindValue('imagen',$imagen->getImagen());
			$insert->execute();
 
		}
}