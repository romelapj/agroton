var palabra="A";
var mi_URL="";
var mi_idTransaccion=26;
var mi_id='01582754-BE9B-4D29-8D5E-A8BC2E7E9FCA';

//
//eventos anlazados
//
//

$(document).ready(function($) {

	$("#lista").on( "pageshow", function( event ) { 
	cargarLista();
	$("#lista_busqueda").val(palabra);

	} );


	$("#busqueda_palabra").change(function(){

		palabra= $("#busqueda_palabra").val();

	});


	$("#lista_busqueda").change(function(event) {
		/* Act on the event */
		palabra = $("#lista_busqueda").val();
		cargarLista();
	});



	$("#servicio").on( "pageshow", function( event ) { 
		cargarServicios();
	} );
	
});


function cargarLista(){


	 $.ajax({
                    url:mi_URL+'php/consulta/datosConsulta.php'
                    ,type:'POST'
                    ,dataType:'json' 
                    ,data:{ 
                    	opcion: 'lista'
                    	,palabra:palabra }
                    ,beforeSend:function(jqXHR,settings){
                    
                    }    
                    ,error: function(XMLHttpRequest, textStatus, errorThrown) { 
                     
                    }                                        
                    ,success: function(midata,textStatus,jqXHR){
                    	console.log(midata);

                    	$("#contenedor_lista1").html(generarHtmlOpcionesLista(midata));
                    	$("#contenedor_lista1").listview( "refresh" );

           }
       });
}



function generarHtmlOpcionesLista(lista){
	var html="";

	if(lista)
	{		for(var i=0; i<lista.length ; i++)
				{
				var fila=lista[i];
				 html+=" <li><a href='#' onclick=\"elegirTransaccion('"+fila.id_servicio+"','"+fila.id_entidad+"')\">"+fila.entidad+" ->"+fila.nombre+"</a></li>";

				}
	}
	return html;
}




function elegirTransaccion(id_trans,miid){

	mi_idTransaccion= id_trans;
	mi_id = miid;

	$.mobile.changePage( "#servicio", {
		transition: "flip",
		reverse: false,
		changeHash: false
	});

return false;
}



function cargarServicios(){



	

	$.ajax({
            url:mi_URL+'php/consulta/datosConsulta.php'
            ,type:'POST'
            ,dataType:'json' 
            ,data:{ 
            	opcion: 'servicio'
            	,id_servicio:mi_idTransaccion }
            ,beforeSend:function(jqXHR,settings){
            
            }    
            ,error: function(XMLHttpRequest, textStatus, errorThrown) { 
             
            }                                        
            ,success: function(midata,textStatus,jqXHR){
            	console.log(midata[0]);

            	if(midata  && midata.length)
            	{
            		var fila=midata[0];
	            	console.info(fila);
	            	$("#descripcion_1").html(fila.descripcion==null?"":fila.descripcion);
					$("#documentacion_1").html(fila.documentacion==null?"":fila.documentacion);
					$("#nombre_1").html(fila.nombre==null?"":fila.nombre);					
					$("#pasos_1").html(fila.pasos==null?"":fila.pasos);					
					$("#requisitos_1").html(fila.requirimiento==null?"":fila.requirimiento);
					$("#pagos_1").html(fila.pagos==null?"":fila.pagos);
					$("#ubicacion_1").html(fila.ubicacion==null?"":fila.ubicacion);
            		
            	}

            

           }
       });



}