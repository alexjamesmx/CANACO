$( document ).ready(function() {
	
	getpersent();


	getnumbers();
});

function getpersent(){
	$.ajax({
		url: base_url()+'Validaciones/validacionGrande',
		success: function(data) {          
			// alert(data.message);
			porcentajePerfil  = parseInt(data.message);               
			$('#porcentaje').html('<p class="lead text-center text-danger">'+porcentajePerfil+'%</p>');
		}
	});
}
  
function getnumbers(){
	$.ajax({
		url: base_url()+'app/myaccount/misnumeros',
		success: function(data) {   
			console.log(data);
	
		}
	});
}


function aplicar(cliente_id, opnegocio_id, controls, estatus, contacto, modal){
	
	$.ajax({
		url : base_url() + "app/user/aplicar",
		data: {id_cliente:cliente_id, opnegocio_id:opnegocio_id},
		type : "post",
		success: function(response){
			$(estatus).html('	<h5 class="text-center"><i class="fas fa-clock"></i><br>Aplicado, pendiente de respuesta</h5>');
			//$(controls).html('<div class="btn-group"> <button  class="btn btn-primary default btn-default">	<i class="fas fa-comment"></i>	<br> Contactar </button><button onclick="cancelar('+cliente_id+','+opnegocio_id+','+controls.id+','+estatus.id+')" class="btn btn-danger default btn-default"><i class="fas fa-times"></i>	<br>Cancelar solicitud</button></div>');
			$(controls).html('<div class="btn-group"> <button  class="btn btn-primary default btn-default" onclick="contactmodal('+contacto.id+')">	<i class="fas fa-comment"></i>	<br> Contactar </button><button onclick="modalcancelar('+modal.id+')" class="btn btn-danger default btn-default"><i class="fas fa-times"></i>	<br>Cancelar solicitud</button></div>');
			
			toastr['success']('Se ha envido un correo al comercio notificando que te intersa el requerimiento!');	
		}
	});	
}

function cancelar(cliente_id, opnegocio_id,  controls, estatus, cancelar){
	

	let queja='';
	queja=$( cancelar ).val();

	$( cancelar ).val('');
	//alert(queja);


	$.ajax({
		url : base_url() + "app/user/cancelar",
		data: {id_cliente:cliente_id, opnegocio_id:opnegocio_id, queja:queja},
		type : "post",
		success: function(response){
			
			
			$(controls).html('<h5 class="text-center"><br>Oportunidad rechazada</h5>');
			$(estatus).html('<h5 class="text-center"><i class="fas fa-times"></i><br>Oportunidad rechazada</h5>');
			toastr['error']('Se ha cancelado la solicitud para encargarte del requerimiento');	
			


		
		}
	});	

	

}

function rechazar(cliente_id, opnegocio_id,  controls, estatus, rechaza){
	

	let queja='';
	queja=$( rechaza ).val();
	$( rechaza ).val('');

	
	//alert(queja);


	$.ajax({
		url : base_url() + "app/user/rechazar",
		data: {id_cliente:cliente_id, opnegocio_id:opnegocio_id, queja:queja},
		type : "post",
		success: function(response){
			
			
			$(controls).html('<h5 class="text-center"><br>Oportunidad rechazada</h5>');
			$(estatus).html('<h5 class="text-center"><i class="fas fa-times"></i><br>Oportunidad rechazada</h5>');
			toastr['error']('Se ha rechazado la solicitud para encargarte del requerimiento');	
			


		
		}
	});	

	

}


function modalcancelar(modal){
	var myModal = new bootstrap.Modal(document.getElementById(modal.id));
	myModal.show();
}

function modalrechazar(modal){
	var myModal = new bootstrap.Modal(document.getElementById(modal.id));
	myModal.show();
}




function contactmodal(modal){
	
	var myModal = new bootstrap.Modal(document.getElementById(modal.id));
			myModal.show();


}


function send_whats(telefono, text, opnegocio_id){

	mensaje=$('#'+text ).val();
 	let whats='https://wa.me/+521'+telefono+'?text='+mensaje;
	window.open(whats, '_blank');
	$.ajax({
		url : base_url() + "app/user/mensaje_whats",
		data: {opnegocio_id:opnegocio_id, mensaje:mensaje},
		type : "post",
		success: function(response){
			
		
		}
	});	
	
}



function send_email(clientemail, text, opnegocio_id){
	let mymail;

	$.ajax({
		url : base_url() + 'app/myaccount/sendDataMail',
		type : "post",
		success: function(response){
			mymail=response.slice(1, -1)
		
			mensaje=$('#'+text ).val();
		
			$.ajax({
				url : base_url() + "app/user/mensaje_correo",
				data: {opnegocio_id:opnegocio_id, mensaje:mensaje, clientemail:clientemail, mymail:mymail },
				type : "post",
				success: function(response){
					toastr['success']('Se ha envido mail a la persona que publicó el requerimiento');
				
				}
			});
			
		}
	})


	
}

function detalles(req_id){
	$("#detalles").show();
}
	
