<?php 

 include_once('cargar.php');


	$id = $_POST['id'];
	$descripcion = $_POST['descripcion'];
	$entidad = $_POST['entidad'];
	$servicio = $_POST['servicio'];
	$tipourl = $_POST['tipourl'];
	$url = $_POST['url'];

	$cargar= new cargar();

	$id_servicio=$cargar->servicio($servicio);
	
	$cargar->entidad($id, $descripcion, $tipourl, $url, $entidad, $id_servicio);	

/*

	$cargar= new cargar();
	$datos=$cargar->miEntidad();

	for($i=0 ; $i<count($datos) ; $i++)
	{

		$fila=$datos[$i];
		$cargar->actualizaEntidad(utf8_decode(($fila['id'])),
			utf8_decode(($fila['descripcion'])), 
			utf8_decode(($fila['tipourl'])));

	}
*/

?>