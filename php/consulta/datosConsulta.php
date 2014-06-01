<?php

include_once ('consulta.php');

	$opcion=$_POST['opcion'];
	$consutla= new consulta();

	switch ($opcion) {
			case 'lista':
				
				$palabra= $_POST['palabra'];	
				$datos=$consutla->consulta1($palabra);
				echo json_encode($datos);
				break;
			


			case 'servicio':
				
				$id_servicio= $_POST['id_servicio'];	
				$datos=$consutla->getDatosServicioById($id_servicio);
				echo json_encode($datos);
				break;
			



			default:
				# code...
				break;
		}	


?>