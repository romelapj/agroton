<?php 

	include_once '../bases/Config.php';
	include_once '../bases/ConectarBD.php';

	class consulta{


	function consulta1($dato)
	{
	        $sql="SELECT e.id id_entidad
					, e.id_servicio
					,e.entidad
					,s.nombre
			    
			FROM
			    entidad e,
			    servicio s
			WHERE
			    e.id_servicio = s.id
			        and (e.entidad like '%$dato%' 
						OR 
						s.nombre like '%$dato%')";

	 				
	        $conexion = new ConectarBD(SERVIDOR, USUARIO, PASS, BD);
	       $conexion->consultaSQL($sql);       
	         return $conexion->_datosRegistros;       
	    
	       
	    }


	function getDatosServicioById($id)
	{
	        $sql="SELECT * FROM servicio
				WHERE id='$id'";

	 				
	       $conexion = new ConectarBD(SERVIDOR, USUARIO, PASS, BD);
	       $conexion->consultaSQL($sql);       
	         return $conexion->_datosRegistros;       
	    
	       
	    }





}


?>