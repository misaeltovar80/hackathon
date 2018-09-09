	<?php
	class Libro{
		private $imagen;
 
		function __construct(){}
 
		public function getImagen(){
		return $this->imagen;
		}
 
		public function setImagen($imagen){
			$this->imagen = $imagen;
		}
 
	

	}
?>