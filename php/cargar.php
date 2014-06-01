<?php 


include_once 'bases/Config.php';
include_once 'bases/ConectarBD.php';

class cargar{



	function servicio($nombre)
    {
        $sql="INSERT INTO servicio
 				(nombre)
 				VALUES ('{$nombre}')";

 				
                  
    
      $conexion = new ConectarBD(SERVIDOR, USUARIO, PASS, BD);
		    $conexion->consultaSQL($sql);
	    	
	      if($conexion->Error!="")
	      		{
	      			

	      			return -1;
	      		}
	      else{

	      	return $conexion->_ultimoID; }         
                
        
    }




     function entidad($id, $descripcion, $tipourl, $url, $entidad, $id_servicio)
    {
        $sql="INSERT INTO entidad 
 			(id, descripcion, tipourl, url, entidad, id_servicio)
 			VALUES 
 			('$id','$descripcion',  '$tipourl', '$url', '$entidad', $id_servicio)";
                  
    
      $conexion = new ConectarBD(SERVIDOR, USUARIO, PASS, BD);
		    $conexion->consultaSQL($sql);
	    	
	       
	              
                
        
    }


    function miEntidad()
    {
        $sql="SELECT * 
         FROM entidad";

 				
        $conexion = new ConectarBD(SERVIDOR, USUARIO, PASS, BD);
       $conexion->consultaSQL($sql);       
         return $conexion->_datosRegistros;       
    
       
    }



     function actualizaEntidad($id,$descripcion, $tipourl)
    {
        $sql="UPDATE entidad
			SET descripcion='$descripcion'
				, tipourl='$tipourl'
			WHERE 
				id='$id'";

 				
        $conexion = new ConectarBD(SERVIDOR, USUARIO, PASS, BD);
       $conexion->consultaSQL($sql);       
        return $conexion->_datosRegistros;       
    
       
    }




}


?>